<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use dmzx\youtubegallery\core\functions;
use phpbb\config\config;
use phpbb\template\template;
use phpbb\controller\helper;
use phpbb\user;
use phpbb\auth\auth;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\collapsiblecategories\operator\operator as operator;

class listener implements EventSubscriberInterface
{
	/** @var functions */
	protected $functions;

	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var helper */
	protected $helper;

	/** @var user */
	protected $user;

	/** @var auth */
	protected $auth;

	/** @var db_interface */
	protected $db;

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

	/** @var operator */
	protected $operator;

	/**
	* Constructor
	*
	* @param functions			$functions
	* @param config				$config
	* @param template			$template
	* @param helper				$helper
	* @param user				$user
	* @param auth				$auth
	* @param db_interface		$db
	* @param string				$root_path
	* @param string				$php_ext
	* @param string 			$video_table
	* @param string 			$video_cat_table
	* @param string 			$video_cmnts_table
	* @param operator			$operator
	*
	*/
	public function __construct(
		functions $functions,
		config $config,
		helper $helper,
		template $template,
		user $user,
		auth $auth,
		db_interface $db,
		$root_path,
		$php_ext,
		$video_table,
		$video_cat_table,
		$video_cmnts_table,
		operator $operator = null
	)
	{
		$this->functions 			= $functions;
		$this->config 				= $config;
		$this->template 			= $template;
		$this->helper 				= $helper;
		$this->user 				= $user;
		$this->auth 				= $auth;
		$this->db 					= $db;
		$this->root_path 			= $root_path;
		$this->php_ext				= $php_ext;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
		$this->video_cmnts_table 	= $video_cmnts_table;
		$this->operator 			= $operator;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.viewonline_overwrite_location'	=> 'add_page_viewonline',
			'core.page_header'						=> 'add_page_header_link',
			'core.user_setup'						=> 'load_language_on_setup',
			'core.index_modify_page_title'			=> 'index_modify_page_title',
			'core.permissions'						=> 'permissions',
		];
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
		$this->template->assign_vars([
			'U_VIDEO' 					=> $this->helper->route('dmzx_youtubegallery_controller'),
			'VIDEO_ENABLE'				=> $this->config['enable_video_global'],
			'S_CAN_VIEW_GALLERY_LINK'	=> $this->auth->acl_get('u_video_view_full'),
		]);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'dmzx/youtubegallery',
			'lang_set' => 'common',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function index_modify_page_title($event)
	{
		$video_value = $this->config['video_on_index_value'];

		if ($this->operator !== null)
		{
			$fid = 'video'; // can be any unique string to identify your extension's collapsible element
			$this->template->assign_vars([
				'VIDEO_IS_COLLAPSIBLE'	=> true,
				'S_VIDEO_HIDDEN' 		=> in_array($fid, $this->operator->get_user_categories()),
				'U_VIDEO_COLLAPSE_URL' 	=> $this->helper->route('phpbb_collapsiblecategories_main_controller', [
					'forum_id' => $fid,
					'hash' => generate_link_hash("collapsible_$fid")])
			]);
		}

		if ($this->config['enable_video_statics_on_index'])
		{
			$this->template->assign_vars([
				'TOTAL_VIDEOS_INDEX'				=> $this->user->lang('TOTAL_VIDEO', $this->functions->total_videos()),
				'TOTAL_CATEGORIES'					=> $this->user->lang('TOTAL_CATEGORIES', $this->functions->total_categories()),
				'TOTAL_VIEWS'						=> $this->user->lang('TOTAL_VIEWS', $this->functions->total_views()),
				'TOTAL_COMMENTS'					=> $this->user->lang('TOTAL_COMMENTS', $this->functions->total_comments()),
			]);
		}

		$this->template->assign_vars([
			'S_ENABLE_VIDEO_STATICS_ON_INDEX'	=> $this->config['enable_video_statics_on_index'],
			'S_ENABLE_VIDEO_ON_INDEX'			=> $this->config['enable_video_on_index'],
			'S_ENABLE_VIDEO_ON_INDEX_LOCATION'	=> $this->config['enable_video_on_index_location'],
			'LAST_VIDEOS'						=> $this->config['video_on_index_value'],
			'NO_ENTRY'							=> $this->user->lang['NO_VIDEOS'],
			'S_CAN_VIEW_GALLERY'				=> $this->auth->acl_get('u_video_view'),
		]);

		if ($this->config['enable_video_on_index'])
		{
			$sql_ary = [
				'SELECT'	=> 'v.*,
				ct.video_cat_title,ct.video_cat_id,
				u.username,u.user_colour,u.user_id',
				'FROM'		=> [
					$this->video_table			=> 'v',
					$this->video_cat_table		=> 'ct',
					USERS_TABLE					=> 'u',
				],
				'WHERE'	=> 'ct.video_cat_id = v.video_cat_id
					AND u.user_id = v.user_id',
				'ORDER_BY'	=> 'v.video_id DESC',
			];
			$sql = $this->db->sql_build_query('SELECT', $sql_ary);
			$result = $this->db->sql_query_limit($sql, $video_value, 0);

			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->template->assign_block_vars('video', [
					'VIDEO_TITLE'		=> $row['video_title'],
					'VIDEO_CAT_ID'		=> $row['video_cat_id'],
					'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
					'VIDEO_VIEWS'		=> $row['video_views'],
					'VIDEO_DURATION'	=> $row['video_duration'],
					'U_CAT'				=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'cat', 'id' => $row['video_cat_id']]),
					'VIDEO_TIME'		=> $this->user->format_date($row['create_time']),
					'VIDEO_ID'			=> censor_text($row['video_id']),
					'U_VIEW_VIDEO'		=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $row['video_id']]),
					'U_POSTER'			=> append_sid("{$this->root_path}memberlist.$this->php_ext", ['mode' => 'viewprofile', 'u' => $row['user_id']]),
					'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
					'VIDEO_THUMBNAIL'	=> 'https://img.youtube.com/vi/' . censor_text($row['youtube_id']) . '/default.jpg'
				]);
			}
			$this->db->sql_freeresult($result);
		}
	}

	// Show permissions
	public function permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions += [
			'u_video_view_full'		=> [
				'lang'		=> 'ACL_U_VIDEO_VIEW_FULL',
				'cat'		=> 'videogallery'
			],
			'u_video_view'	=> [
				'lang'		=> 'ACL_U_VIDEO_VIEW',
				'cat'		=> 'videogallery'
			],
			'u_video_delete'	=> [
				'lang'		=> 'ACL_U_VIDEO_DELETE',
				'cat'		=> 'videogallery'
			],
			'u_video_post'	=> [
				'lang'		=> 'ACL_U_VIDEO_POST',
				'cat'		=> 'videogallery'
			],
			'u_video_comment'	=> [
				'lang'		=> 'ACL_U_VIDEO_COMMENT',
				'cat'		=> 'videogallery'
			],
			'u_video_comment_delete'	=> [
				'lang'		=> 'ACL_U_VIDEO_COMMENT_DELETE',
				'cat'		=> 'videogallery'
			],
		];
		$event['permissions'] = $permissions;
		$categories['videogallery'] = 'VIDEO_INDEX';
		$event['categories'] = array_merge($event['categories'], $categories);
	}
}
