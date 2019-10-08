<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2019 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\core;

use phpbb\config\config;
use phpbb\template\template;
use phpbb\user;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\extension\manager;

class functions
{
	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var db_interface */
	protected $db;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;

	protected $video_cmnts_table;

	/** @var manager */
	protected $extension_manager;

	/**
	 * Constructor
	 *
	 * @param config				$config
	 * @param template				$template
	 * @param user					$user
	 * @param db_interface			$db
	 * @param string 				$video_table
	 * @param string 				$video_cat_table
	 * @param string 				$video_cmnts_table
	 * @param manager				$extension_manager
	 */
	public function __construct(
		config $config,
		template $template,
		user $user,
		db_interface $db,
		$video_table,
		$video_cat_table,
		$video_cmnts_table,
		manager $extension_manager
	)
	{
		$this->config 				= $config;
		$this->template 			= $template;
		$this->user 				= $user;
		$this->db 					= $db;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
		$this->video_cmnts_table 	= $video_cmnts_table;
		$this->extension_manager	= $extension_manager;
	}

	// assign_authors
	function assign_authors()
	{
		$md_manager = $this->extension_manager->create_extension_metadata_manager('dmzx/youtubegallery', $this->template);
		$meta = $md_manager->get_metadata();
		$author_names = array();
		$author_homepages = array();

		foreach ($meta['authors'] as $author)
		{
			$author_names[] = $author['name'];
			$author_homepages[] = sprintf('<a href="%1$s" title="%2$s">%2$s</a>', $author['homepage'], $author['name']);
		}
		$this->template->assign_vars(array(
			'VIDEO_DISPLAY_NAME'		=> $meta['extra']['display-name'],
			'VIDEO_AUTHOR_NAMES'		=> implode(' &amp; ', $author_names),
			'VIDEO_AUTHOR_HOMEPAGES'	=> implode(' &amp; ', $author_homepages),
		));

		return;
	}

	// youtube_analytics
	function youtube_analytics($params)
	{
		$videoid = $params['id'];
		$json = @file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=" . $videoid . "&key=" . $this->config['google_api_key']);
		$jsonData = json_decode($json);
		$views = $jsonData->items[0]->statistics->viewCount;
		$likes = $jsonData->items[0]->statistics->likeCount;
		$dislikes = $jsonData->items[0]->statistics->dislikeCount;
		$comments = $jsonData->items[0]->statistics->commentCount;

		return array("views" => number_format($views), "likes" => number_format($likes), "dislikes" => number_format($dislikes), "comments" => number_format($comments));
	}

	// video count user_id
	function videorow_user_id($user_id)
	{
		$sql = 'SELECT COUNT(*) as video_count
			FROM '. $this->video_table .'
			WHERE user_id = ' . (int) $user_id;
		$result = $this->db->sql_query($sql);
		$videorow['video_count'] = $this->db->sql_fetchfield('video_count');
		$this->db->sql_freeresult($result);

		return $videorow['video_count'];
	}

	// video count video_id
	function video_cat_id($video_cat_id)
	{
		$sql = 'SELECT COUNT(*) as video_count
			FROM ' . $this->video_table .'
			WHERE video_cat_id = ' . (int) $video_cat_id;
		$result = $this->db->sql_query($sql);
		$videorow['video_count'] = $this->db->sql_fetchfield('video_count');
		$this->db->sql_freeresult($result);

		return $videorow['video_count'];
	}

	// video comment count user_id
	function video_comment_count($video_id)
	{
		$sql = 'SELECT COUNT(*) as comment_count
			FROM ' . $this->video_cmnts_table. '
			WHERE cmnt_video_id = ' . (int) $video_id;
		$result = $this->db->sql_query($sql);
		$videorow['comment_count'] = $this->db->sql_fetchfield('comment_count');
		$this->db->sql_freeresult($result);

		return $videorow['comment_count'];
	}

	// Count the videos ...
	function total_videos()
	{
		$sql = 'SELECT COUNT(video_id) AS total_videos
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_videos = (int) $this->db->sql_fetchfield('total_videos');
		$this->db->sql_freeresult($result);

		return $total_videos;
	}

	// Count the videos categories ...
	function total_categories()
	{
		$sql = 'SELECT COUNT(video_cat_id) AS total_categories
			FROM ' . $this->video_cat_table;
		$result = $this->db->sql_query($sql);
		$total_categories = (int) $this->db->sql_fetchfield('total_categories');
		$this->db->sql_freeresult($result);

		return $total_categories;
	}

	// Count the videos views ...
	function total_views()
	{
		$sql = 'SELECT SUM(video_views) AS total_views
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_views = (int) $this->db->sql_fetchfield('total_views');
		$this->db->sql_freeresult($result);

		return $total_views;
	}

	// Count the videos comments ...
	function total_comments()
	{
		$sql = 'SELECT COUNT(cmnt_id) AS total_comments
			FROM ' . $this->video_cmnts_table;
		$result = $this->db->sql_query($sql);
		$total_comments = (int) $this->db->sql_fetchfield('total_comments');
		$this->db->sql_freeresult($result);

		return $total_comments;
	}

	// response message
	public function response($message_lang, $json_data, $redirect_link, $redirect_text, $is_ajax = false)
	{
		$redirect = $redirect_link;
		meta_refresh(1, $redirect);
		$message = $message_lang;

		if ($is_ajax)
		{
			$json_response = new \phpbb\json_response();
			$json_response->send($json_data);
		}

		$message .= '<br /><br />' . $this->user->lang($redirect_text, '<a href="' . $redirect . '">', '</a>');
		trigger_error($message);
	}
}
