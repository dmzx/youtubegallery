<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2020 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\core;

use phpbb\config\config;
use phpbb\request\request_interface;
use phpbb\template\template;
use phpbb\user;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\extension\manager;
use phpbb\controller\helper;

class functions
{
	/** @var config */
	protected $config;

	/** @var request_interface */
	protected $request;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var db_interface */
	protected $db;

	/** @var manager */
	protected $extension_manager;

	/** @var helper */
	protected $helper;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;

	protected $video_cmnts_table;

	/**
	 * Constructor
	 *
	 * @param config				$config
	 * @param request_interface		$request
	 * @param template				$template
	 * @param user					$user
	 * @param db_interface			$db
	 * @param manager				$extension_manager
	 * @param helper				$helper
	 * @param string				$root_path
	 * @param string				$php_ext
	 * @param string 				$video_table
	 * @param string 				$video_cat_table
	 * @param string 				$video_cmnts_table
	 */
	public function __construct(
		config $config,
		request_interface $request,
		template $template,
		user $user,
		db_interface $db,
		manager $extension_manager,
		helper $helper,
		$root_path,
		$php_ext,
		$video_table,
		$video_cat_table,
		$video_cmnts_table
	)
	{
		$this->config 				= $config;
		$this->request 				= $request;
		$this->template 			= $template;
		$this->user 				= $user;
		$this->db 					= $db;
		$this->extension_manager	= $extension_manager;
		$this->helper 				= $helper;
		$this->root_path 			= $root_path;
		$this->php_ext 				= $php_ext;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
		$this->video_cmnts_table 	= $video_cmnts_table;
	}

	// assign_authors
	public function assign_authors()
	{
		$md_manager = $this->extension_manager->create_extension_metadata_manager('dmzx/youtubegallery', $this->template);
		$meta = $md_manager->get_metadata();
		$author_names = [];
		$author_homepages = [];

		foreach ($meta['authors'] as $author)
		{
			$author_names[] = $author['name'];
			$author_homepages[] = sprintf('<a href="%1$s" title="%2$s">%2$s</a>', $author['homepage'], $author['name']);
		}
		$this->template->assign_vars([
			'VIDEO_DISPLAY_NAME'		=> $meta['extra']['display-name'],
			'VIDEO_AUTHOR_NAMES'		=> implode(' &amp; ', $author_names),
			'VIDEO_AUTHOR_HOMEPAGES'	=> implode(' &amp; ', $author_homepages),
		]);

		return;
	}

	// youtube_analytics
	public function youtube_analytics($params)
	{
		if ($this->curl_required() && $this->config['enable_video_youtube_stats'])
		{
			$videoid = $params['id'];

			$option = [
				'part' 	=> 'snippet,statistics,contentDetails',
				'id' 	=> $videoid,
				'key' 	=> $this->config['google_api_key'],
			];
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?".http_build_query($option, 'a', '&'));
			curl_setopt($curl_handle, CURLOPT_HTTPHEADER,['Content-Type: application/json']);
			curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
			$json_response = curl_exec($curl_handle);
			curl_close($curl_handle);

			$jsonData = json_decode($json_response);

			if(isset($jsonData->items[0]))
			{
				$views 		= isset($jsonData->items[0]->statistics->viewCount) ? $jsonData->items[0]->statistics->viewCount : 0;
				$likes 		= isset($jsonData->items[0]->statistics->likeCount) ? $jsonData->items[0]->statistics->likeCount : 0;
				$dislikes 	= isset($jsonData->items[0]->statistics->dislikeCount) ? $jsonData->items[0]->statistics->dislikeCount : 0;
				$comments 	= isset($jsonData->items[0]->statistics->commentCount) ? $jsonData->items[0]->statistics->commentCount : 0;
				$video_description = $jsonData->items[0]->snippet->description;
				$time 		= $jsonData->items[0]->contentDetails->duration;
				$d_colon = str_ireplace(['PT', 'H', 'M', 'S'], ['',':',':',''], $time);

				//seconds
				if (substr_count($d_colon, ':') == 0)
				{
					$d_zeros = '00:00:'.$d_colon;
					$video_duration = '0:'.date("s", strtotime($d_zeros));
				}
				//minutes
				elseif (substr_count($d_colon, ':') == 1)
				{
					$d_zeros = "00:".$d_colon;
					$video_duration = date("i:s", strtotime($d_zeros));
				}
				//hours
				else
				{
					$video_duration = date("H:i:s", strtotime($d_colon));
				}

				return [
					"views" => number_format($views),
					"likes" => number_format($likes),
					"dislikes" => number_format($dislikes),
					"comments" => number_format($comments),
					"description" => $video_description,
					"video_duration" => $video_duration
				];
			}
		}
	}

	// video count user_id
	public function videorow_user_id($user_id)
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
	public function video_cat_id($video_cat_id)
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
	public function video_comment_count($video_id)
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
	public function total_videos()
	{
		$sql = 'SELECT COUNT(video_id) AS total_videos
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_videos = (int) $this->db->sql_fetchfield('total_videos');
		$this->db->sql_freeresult($result);

		return $total_videos;
	}

	// Count the videos categories ...
	public function total_categories()
	{
		$sql = 'SELECT COUNT(video_cat_id) AS total_categories
			FROM ' . $this->video_cat_table;
		$result = $this->db->sql_query($sql);
		$total_categories = (int) $this->db->sql_fetchfield('total_categories');
		$this->db->sql_freeresult($result);

		return $total_categories;
	}

	// Count the videos views ...
	public function total_views()
	{
		$sql = 'SELECT SUM(video_views) AS total_views
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_views = (int) $this->db->sql_fetchfield('total_views');
		$this->db->sql_freeresult($result);

		return $total_views;
	}

	// Count the videos comments ...
	public function total_comments()
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

		$message .= '<br><br>' . $this->user->lang($redirect_text, '<a href="' . $redirect . '">', '</a>');
		trigger_error($message);
	}

	// build template
	public function video_template()
	{
		$sql_start 			= $this->request->variable('start', 0);
		$sql_limit 			= $this->request->variable('limit', $this->config['videos_per_page']);

		$sql_ary = [
			'SELECT'	=> 'v.*,
			ct.video_cat_title,ct.video_cat_id,
			u.username,u.user_colour,u.user_id',
			'FROM'		=> [
				$this->video_table			=> 'v',
				$this->video_cat_table		=> 'ct',
				USERS_TABLE			=> 'u',
			],
			'WHERE'		=> 'ct.video_cat_id = v.video_cat_id
				AND u.user_id = v.user_id',
			'ORDER_BY'	=> 'v.video_id DESC',
		];

		$sql = $this->db->sql_build_query('SELECT', $sql_ary);
		$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$video_info = $this->youtube_analytics(["id" => censor_text($row['youtube_id'])]);

			$this->template->assign_block_vars('video', [
				'VIDEO_TITLE'					=> $row['video_title'],
				'VIDEO_CAT_ID'					=> $row['video_cat_id'],
				'VIDEO_CAT_TITLE'				=> $row['video_cat_title'],
				'VIDEO_VIEWS'					=> $row['video_views'],
				'VIDEO_DURATION'				=> $row['video_duration'],
				'VIDEO_VIEWS_YOUTUBE'			=> isset($video_info['views']) ? $video_info['views'] : '',
				'VIDEO_VIEWS_YOUTUBE_LIKE'		=> isset($video_info['likes']) ? $video_info['likes'] : '',
				'VIDEO_VIEWS_YOUTUBE_DISLIKE'	=> isset($video_info['dislikes']) ? $video_info['dislikes'] : '',
				'VIDEO_VIEWS_YOUTUBE_COMMENTS'	=> isset($video_info['comments']) ? $video_info['comments'] : '',
				'U_CAT'							=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'cat', 'id' => $row['video_cat_id']]),
				'VIDEO_TIME'					=> $this->user->format_date($row['create_time']),
				'VIDEO_SHORT_DESCRIPTION'		=> $row['video_short_description'],
				'VIDEO_ID'						=> censor_text($row['video_id']),
				'U_VIEW_VIDEO'					=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $row['video_id']]),
				'U_POSTER'						=> append_sid("{$this->root_path}memberlist.$this->php_ext", ['mode' => 'viewprofile', 'u' => $row['user_id']]),
				'USERNAME'						=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'YOUTUBE_ID'					=> censor_text($row['youtube_id']),
				'VIDEO_THUMBNAIL'				=> 'https://img.youtube.com/vi/' . censor_text($row['youtube_id']) . '/hqdefault.jpg'
			]);
		}
		$this->db->sql_freeresult($result);
	}

	/**
	* Get youtube video ID from URL
	* From: http://halgatewood.com/php-get-the-youtube-video-id-from-a-youtube-url/
	*/
	public function getYouTubeIdFromURL($url)
	{
		$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
		preg_match($pattern, $url, $matches);

		return isset($matches[1]) ? $matches[1] : false;
	}

	// check curl
	public function curl_required()
	{
		return (function_exists('curl_version')) ? true : false;
	}
}
