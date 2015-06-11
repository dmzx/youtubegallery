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

	protected $video_table;

	protected $video_cat_table;

	protected $video_cmnts_table;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	protected $phpbb_root_path;

	protected $phpEx;

	/** @var string */
	protected $table_prefix;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, $root_path, $phpEx, $table_prefix, $video_table, $video_cat_table, $video_cmnts_table)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->template = $template;
		$this->controller_helper = $controller_helper;
		$this->user = $user;
		$this->db = $db;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;
		$this->table_prefix = $table_prefix;
		$this->video_table = $video_table;
		$this->video_cat_table = $video_cat_table;
		$this->video_cmnts_table = $video_cmnts_table;

	}

	static public function getSubscribedEvents()
	{
		return array(
		'core.viewonline_overwrite_location'	=> 'add_page_viewonline',
		'core.user_setup'	=> 'load_language_on_setup',
		'core.page_header'	=> 'add_page_header_link',
		'core.index_modify_page_title'	=> 'index_modify_page_title',

		);
	}

	public function add_page_viewonline($event)
	{
		global $user, $phpbb_container, $phpEx;
		if (strrpos($event['row']['session_page'], 'app.' . $phpEx . '/video') === 0)
		{
		$event['location'] = $user->lang('VIDEO_INDEX');
		$event['location_url'] = $phpbb_container->get('controller.helper')->route('dmzx_youtubegallery_controller');
		}
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'U_VIDEO' => $this->controller_helper->route('dmzx_youtubegallery_controller'),
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

	// Count the videos ...
	$sql = 'SELECT COUNT(video_id) AS total_videos FROM ' . $this->video_table;
	$result = $this->db->sql_query($sql);
	$total_videos = (int) $this->db->sql_fetchfield('total_videos');
	$this->db->sql_freeresult($result);

	// Count the videos categories ...
	$sql = 'SELECT COUNT(video_cat_id) AS total_categories FROM ' . $this->video_cat_table . '';
	$result = $this->db->sql_query($sql);
	$total_categories = (int) $this->db->sql_fetchfield('total_categories');
	$this->db->sql_freeresult($result);

	// Count the videos views ...
	$sql = 'SELECT SUM(video_views) AS total_views FROM ' . $this->video_table;
	$result = $this->db->sql_query($sql);
	$total_views = (int) $this->db->sql_fetchfield('total_views');
	$this->db->sql_freeresult($result);$total_videos;

	// Count the videos comments ...
	$sql = 'SELECT COUNT(cmnt_id) AS total_comments FROM ' . $this->video_cmnts_table;
	$result = $this->db->sql_query($sql);
	$total_comments = (int) $this->db->sql_fetchfield('total_comments');
	$this->db->sql_freeresult($result);

	$l_total_video_s 	= ($total_videos == 0) ? 'TOTAL_VIDEO_ZERO' : 'TOTAL_VIDEOS_OTHER';
	$l_total_category_s = ($total_categories == 0) ? 'TOTAL_CATEGORY_ZERO' : 'TOTAL_CATEGORIES_OTHER';
	$l_total_view_s = ($total_views == 0) ? 'TOTAL_VIEW_ZERO' : 'TOTAL_VIEWS_OTHER';
	$l_total_comment_s = ($total_comments == 0) ? 'TOTAL_COMMENT_ZERO' : 'TOTAL_COMMENTS_OTHER';

	$this->template->assign_vars(array(
		'TOTAL_VIDEOS_INDEX'=> sprintf($this->user->lang[$l_total_video_s], $total_videos),
		'TOTAL_CATEGORIES'	=> sprintf($this->user->lang[$l_total_category_s], $total_categories),
		'TOTAL_VIEWS'		=> sprintf($this->user->lang[$l_total_view_s], $total_views),
		'TOTAL_COMMENTS'	=> sprintf($this->user->lang[$l_total_comment_s], $total_comments),
		'S_ENABLE_VIDEO_STATICS_ON_INDEX'	=> $this->config['enable_video_statics_on_index'],
	));

	}

}
