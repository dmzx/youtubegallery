<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $phpbb_root_path;

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

	/** @var \phpbb\collapsiblecategories\operator\operator */
	protected $operator;

	/**
	* Constructor
	*
	* @param \phpbb\config\config							$config
	* @param \phpbb\template\template						$template
	* @param \phpbb\controller\helper						$helper
	* @param \phpbb\user									$user
	* @param \phpbb\db\driver\driver_interface				$db
	* @param												$phpbb_root_path
	* @param string											$php_ext
	* @param string 										$video_table
	* @param string 										$video_cat_table
	* @param string 										$video_cmnts_table
	* @param \phpbb\collapsiblecategories\operator\operator	$operator
	*
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, $phpbb_root_path, $php_ext, $video_table, $video_cat_table, $video_cmnts_table, \phpbb\collapsiblecategories\operator\operator $operator = null)
	{
		$this->config 				= $config;
		$this->template 			= $template;
		$this->helper 				= $helper;
		$this->user 				= $user;
		$this->db 					= $db;
		$this->phpbb_root_path 		= $phpbb_root_path;
		$this->php_ext				= $php_ext;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
		$this->video_cmnts_table 	= $video_cmnts_table;
		$this->operator 			= $operator;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.viewonline_overwrite_location'	=> 'add_page_viewonline',
			'core.user_setup'						=> 'load_language_on_setup',
			'core.page_header'						=> 'add_page_header_link',
			'core.index_modify_page_title'			=> 'index_modify_page_title',
			'core.permissions'						=> 'permissions',
		);
	}

	public function add_page_viewonline($event)
	{
		if (strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/video') === 0)
		{
			$event['location'] = $this->user->lang('VIDEO_INDEX');
			$event['location_url'] = $this->helper->route('dmzx_youtubegallery_controller');
		}
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'U_VIDEO' => $this->helper->route('dmzx_youtubegallery_controller'),
		));
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'dmzx/youtubegallery',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function index_modify_page_title($event)
	{
		$video_value = $this->config['video_on_index_value'];

		if ($this->operator !== null)
		{
			$fid = 'video'; // can be any unique string to identify your extension's collapsible element
			$this->template->assign_vars(array(
				'S_VIDEO_HIDDEN' => in_array($fid, $this->operator->get_user_categories()),
				'U_VIDEO_COLLAPSE_URL' => $this->helper->route('phpbb_collapsiblecategories_main_controller', array(
					'forum_id' => $fid,
					'hash' => generate_link_hash("collapsible_$fid")))
			));
		}

		// Count the videos ...
		$sql = 'SELECT COUNT(video_id) AS total_videos
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_videos = (int) $this->db->sql_fetchfield('total_videos');
		$this->db->sql_freeresult($result);

		// Count the videos categories ...
		$sql = 'SELECT COUNT(video_cat_id) AS total_categories
			FROM ' . $this->video_cat_table . '';
		$result = $this->db->sql_query($sql);
		$total_categories = (int) $this->db->sql_fetchfield('total_categories');
		$this->db->sql_freeresult($result);

		// Count the videos views ...
		$sql = 'SELECT SUM(video_views) AS total_views
			FROM ' . $this->video_table;
		$result = $this->db->sql_query($sql);
		$total_views = (int) $this->db->sql_fetchfield('total_views');
		$this->db->sql_freeresult($result);

		// Count the videos comments ...
		$sql = 'SELECT COUNT(cmnt_id) AS total_comments
			FROM ' . $this->video_cmnts_table;
		$result = $this->db->sql_query($sql);
		$total_comments = (int) $this->db->sql_fetchfield('total_comments');
		$this->db->sql_freeresult($result);

		$l_total_video_s 	= ($total_videos == 0) ? 'TOTAL_VIDEO_ZERO' : 'TOTAL_VIDEOS_OTHER';
		$l_total_category_s = ($total_categories == 0) ? 'TOTAL_CATEGORY_ZERO' : 'TOTAL_CATEGORIES_OTHER';
		$l_total_view_s 	= ($total_views == 0) ? 'TOTAL_VIEW_ZERO' : 'TOTAL_VIEWS_OTHER';
		$l_total_comment_s 	= ($total_comments == 0) ? 'TOTAL_COMMENT_ZERO' : 'TOTAL_COMMENTS_OTHER';

		$this->template->assign_vars(array(
			'TOTAL_VIDEOS_INDEX'				=> sprintf($this->user->lang[$l_total_video_s], $total_videos),
			'TOTAL_CATEGORIES'					=> sprintf($this->user->lang[$l_total_category_s], $total_categories),
			'TOTAL_VIEWS'						=> sprintf($this->user->lang[$l_total_view_s], $total_views),
			'TOTAL_COMMENTS'					=> sprintf($this->user->lang[$l_total_comment_s], $total_comments),
			'S_ENABLE_VIDEO_STATICS_ON_INDEX'	=> $this->config['enable_video_statics_on_index'],
			'S_ENABLE_VIDEO_ON_INDEX'			=> $this->config['enable_video_on_index'],
			'S_ENABLE_VIDEO_ON_INDEX_LOCATION'	=> $this->config['enable_video_on_index_location'],
			'LAST_VIDEOS'						=> $this->config['video_on_index_value'],
			'NO_ENTRY'							=> $this->user->lang['NO_VIDEOS'],
		));

		$sql_ary = array(
			'SELECT'	=> 'v.*,
			ct.video_cat_title,ct.video_cat_id,
			u.username,u.user_colour,u.user_id',
			'FROM'		=> array(
				$this->video_table			=> 'v',
				$this->video_cat_table		=> 'ct',
				USERS_TABLE			=> 'u',
			),
			'WHERE'		=> 'ct.video_cat_id = v.video_cat_id AND u.user_id = v.user_id',
			'ORDER_BY'	=> 'v.video_id DESC',
		);

		$sql = $this->db->sql_build_query('SELECT', $sql_ary);
		$result = $this->db->sql_query_limit($sql, $video_value, 0);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->template->assign_block_vars('video', array(
				'VIDEO_TITLE'		=> $row['video_title'],
				'VIDEO_CAT_ID'		=> $row['video_cat_id'],
				'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
				'VIDEO_VIEWS'		=> $row['video_views'],
				'U_CAT'				=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat', 'id' => $row['video_cat_id'])),
				'VIDEO_TIME'		=> $this->user->format_date($row['create_time']),
				'VIDEO_ID'			=> censor_text($row['video_id']),
				'U_VIEW_VIDEO'		=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'view', 'id' => $row['video_id'])),
				'U_POSTER'			=> append_sid("{$this->phpbb_root_path}memberlist.$this->php_ext", array('mode' => 'viewprofile', 'u' => $row['user_id'])),
				'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'YOUTUBE_ID'		=> censor_text($row['youtube_id']),
			));
		}
		$this->db->sql_freeresult($result);
	}

	// Show permissions
	public function permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions += array(
			'u_video_view_full'		=> array(
				'lang'		=> 'ACL_U_VIDEO_VIEW_FULL',
				'cat'		=> 'videogallery'
			),
			'u_video_view'	=> array(
				'lang'		=> 'ACL_U_VIDEO_VIEW',
				'cat'		=> 'videogallery'
			),
			'u_video_delete'	=> array(
				'lang'		=> 'ACL_U_VIDEO_DELETE',
				'cat'		=> 'videogallery'
			),
			'u_video_post'	=> array(
				'lang'		=> 'ACL_U_VIDEO_POST',
				'cat'		=> 'videogallery'
			),
			'u_video_comment'	=> array(
				'lang'		=> 'ACL_U_VIDEO_COMMENT',
				'cat'		=> 'videogallery'
			),
			'u_video_comment_delete'	=> array(
				'lang'		=> 'ACL_U_VIDEO_COMMENT_DELETE',
				'cat'		=> 'videogallery'
			),
		);
		$event['permissions'] = $permissions;
		$categories['videogallery'] = 'VIDEO_INDEX';
		$event['categories'] = array_merge($event['categories'], $categories);
	}
}
