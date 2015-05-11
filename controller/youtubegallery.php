<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\controller;

class youtubegallery
{
	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;
	/**
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\cache\service */
	protected $cache;

	/** @var \phpbb\request\request */
	protected $request;

	protected $phpbb_root_path;
	protected $phpEx;
	protected $table_prefix;
	/** @var \phpbb\pagination */
	protected $pagination;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config				$config
	 * @param \phpbb\controller\helper			$helper
	 * @param \phpbb\template\template			$template
	 * @param \phpbb\user						$user
	 * @param \phpbb\auth\auth					$auth
	 * @param \phpbb\db\driver\driver_interface	$db
	 * @param \phpbb\cache\service				$cache
	 * @param \phpbb\request\request			$request
	 * @param									$phpbb_root_path
	 * @param									$phpEx
	 * @param									$table_prefix
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\log\log_interface $log, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\db\driver\driver_interface $db, \phpbb\cache\service $cache, \phpbb\request\request $request, \phpbb\pagination $pagination, $phpbb_root_path, $phpEx, $table_prefix, $video_table, $video_cat_table)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
		$this->auth = $auth;
		$this->db = $db;
		$this->cache = $cache;
		$this->request = $request;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->phpEx = $phpEx;
		$this->phpbb_log = $log;
		$this->table_prefix = $table_prefix;
		$this->pagination = $pagination;
		$this->video_table = $video_table;
		$this->video_cat_table = $video_cat_table;

		$this->ext_root_path = 'ext/dmzx/youtubegallery';
	}
public function handle_video()
	{
	/**
	 * Method to render the page data
	 *
	 * @var bool		Bool if the rendering is only for index
	 * @return array	Data for page rendering
	 */

		if (!$this->auth->acl_get('u_video_view_full'))
{
	trigger_error($this->user->lang['UNAUTHED']);
}

// Initial var setup
$video_id	= $this->request->variable('id', 0);
$video_url = $this->request->variable('video_url', '', true);
$video_title = $this->request->variable('video_title', '', true);
$video_cat_id = $this->request->variable('cid', 0);
$video_cat_ids = $this->request->variable('id', 0);
$username = $this->request->variable('username', '', true);
$user_id = $this->request->variable('user_id', 0);
$youtube_id = $this->request->variable('youtube_id', '', true);
$create_time = $this->request->variable('create_time', '');
$video_views = $this->request->variable('video_views', 0);

$sql_start = $this->request->variable('start', 0);
$sql_limit = $this->request->variable('limit', 10);

$mode = $this->request->variable('mode', '');
$submit = (isset($_POST['submit'])) ? true : false;

// Determine board url - we may need it later
$board_url = generate_board_url() . '/';
$web_path = (defined('PHPBB_USE_BOARD_URL_PATH') && PHPBB_USE_BOARD_URL_PATH) ? $board_url : $this->phpbb_root_path;

/**
 * Get youtube video ID from URL
 * From: http://halgatewood.com/php-get-the-youtube-video-id-from-a-youtube-url/
 */
function getYouTubeIdFromURL($url)
{
	$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
	preg_match($pattern, $url, $matches);

	return isset($matches[1]) ? $matches[1] : false;
}
$youtube_id = getYouTubeIdFromURL($video_url);
$jsonURL = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id={$youtube_id}&key=AIzaSyD-Zbq1gtL0GojKrBFTS117mdu8jsh8QHA&type=video&part=snippet");

$json = json_decode($jsonURL);
if(isset($json->items[0]->snippet)){
$video_title = $json->items[0]->snippet->title;
}

$sql_ary = array(
	'video_id'			=> $video_id,
	'video_url'			=> $video_url,
	'video_title'		=> $video_title,
	'video_cat_id'		=> $video_cat_id,
	'username'			=> $username,
	'user_id'			=> $user_id,
	'youtube_id'		=> $youtube_id,
	'create_time'		=> (int) time(),
	'video_views'		=> $video_views,
);

$error = $row = array();
$current_time = time();

$this->template->assign_vars(array(
	'S_NEW_VIDEO'	 		=> $this->auth->acl_get('u_video_post') ? true : false,
	'SCRIPT_NAME'			=> 'video',
	'U_VIDEO'				=> $this->helper->route('dmzx_youtubegallery_controller'),
));

$this->template->assign_block_vars('navlinks', array(
	'FORUM_NAME' 	=> ($this->user->lang['VIDEO_INDEX']),
	'U_VIEW_FORUM'	=> $this->helper->route('dmzx_youtubegallery_controller'),
));

switch ($mode)
{
	case 'submit':
		// User is a bot?!
		if ($this->user->data['is_bot'])
		{
			redirect(append_sid("{$this->phpbb_root_path}index.$this->phpEx"));
		}

		$redirect_url = $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'submit'));

		// Is a guest?!
		if ($this->user->data['user_id'] == ANONYMOUS)
		{
			login_box($redirect_url);
		}

		// Can post?!
		if (!$this->auth->acl_get('u_video_post'))
		{
			trigger_error($this->user->lang['UNAUTHED']);
		}

		$l_title = $this->user->lang['VIDEO_SUBMIT'];
		$template_html = 'video_editor.html';

		$s_action = $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'submit'));
		$s_hidden_fields = '';
		$form_enctype = '';
		add_form_key('postform');

		// List of categories
		$sql = 'SELECT * FROM ' . $this->video_cat_table . '
				ORDER BY video_cat_id DESC';
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
		$this->template->assign_block_vars('cat', array(
			'VIDEO_CAT_ID'		=> censor_text($row['video_cat_id']),
			'VIDEO_CAT_TITLE'	=> censor_text($row['video_cat_title']),
		));
		}

		// Start assigning vars for main posting page ...
		$this->template->assign_vars(array(
			'S_USER_ID'				=> $this->user->data['user_id'],
			'S_USERNAME'			=> $this->user->data['username'],
			'S_FORM_ENCTYPE'		=> $form_enctype,
			'S_POST_ACTION'			=> $s_action,
			'S_HIDDEN_FIELDS'		=> $s_hidden_fields,
			'ERROR'					=> (sizeof($error)) ? implode('<br />', $error) : '',
		));

		$this->template->assign_block_vars('navlinks', array(
			'FORUM_NAME' 	=> ($this->user->lang['VIDEO_SUBMIT']),
		));

		add_form_key('postform');
			if ($submit)
			{
				if (!check_form_key('postform'))
				{
					trigger_error('FORM_INVALID');
				}
			}

		switch ($submit)
		{
			case 'add':
				if ($video_url == '')
				{
					$meta_info = $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'submit'));
					$message = $this->user->lang['NEED_VIDEO_URL'];

					meta_refresh(3, $meta_info);
					$message .= '<br /><br />' . sprintf($this->user->lang['PAGE_RETURN'], '<a href="' . $meta_info . '">', '</a>');
					trigger_error($message);
				}
				else
				{
					$this->db->sql_query('INSERT INTO ' . $this->video_table .' ' . $this->db->sql_build_array('INSERT', $sql_ary));
					$u_action = $this->helper->route('dmzx_youtubegallery_controller');

					$meta_info = $this->helper->route('dmzx_youtubegallery_controller');
					$message = $this->user->lang['VIDEO_CREATED'];

					meta_refresh(3, $meta_info);
					$message .= '<br /><br />' . sprintf($this->user->lang['PAGE_RETURN'], '<a href="' . $meta_info . '">', '</a>');
					trigger_error($message);
				}
			break;
		}
	break;

	case 'delete':
		if (!$this->auth->acl_get('u_video_delete'))
		{
			trigger_error($this->user->lang['UNAUTHED']);
		}

		$l_title = ($this->user->lang['DELETE_VIDEO']);

		if (confirm_box(true))
		{
			$sql = 'DELETE FROM ' . $this->video_table . '
					WHERE video_id = '. $video_id;
			$this->db->sql_query($sql);

			$meta_info = $this->helper->route('dmzx_youtubegallery_controller');
			$message = $this->user->lang['VIDEO_DELETED'];

			meta_refresh(3, $meta_info);
			$message .= '<br /><br />' . sprintf($this->user->lang['PAGE_RETURN'], '<a href="' . $meta_info . '">', '</a>');
			trigger_error($message);
		}
		else
		{
			$s_hidden_fields = build_hidden_fields(array(
				'mode'		=> 'delete',
				'submit' 	=> true,
				'video_id' 	=> $video_id,
			));
			confirm_box(false, $this->user->lang['DELETE_VIDEO'], $s_hidden_fields);

			$meta_info = $this->helper->route('dmzx_youtubegallery_controller');
			$message = $this->user->lang['RETURN_TO_VIDEO_INDEX'];

			meta_refresh(3, $meta_info);
			$message .= '<br /><br />' . sprintf($this->user->lang['PAGE_RETURN'], '<a href="' . $meta_info . '">', '</a>');
			trigger_error($message);

		}
	break;

	case 'view':
	if (!$this->auth->acl_get('u_video_view'))
	{
		trigger_error($this->user->lang['VIDEO_UNAUTHED']);
	}

	// Update video view... but only for humans
	if (isset($this->user->data['session_page']) && !$this->user->data['is_bot'])
	{
		$sql = 'UPDATE ' . $this->video_table . '
			SET video_views = video_views + 1
			WHERE video_id = '.$video_id;
		$this->db->sql_query($sql);
	}

	$sql_ary = array(
		'SELECT'	=> 'v.*, u.*',
		'FROM'		=> array(
			$this->video_table			=> 'v',
			USERS_TABLE			=> 'u',
		),
		'WHERE'		=> 'v.video_id = '.(int) $video_id .' and u.user_id = v.user_id',
		'ORDER_BY'	=> 'v.video_id DESC',
	);

	$sql = $this->db->sql_build_query('SELECT', $sql_ary);
	$result = $this->db->sql_query($sql);

	while ($row = $this->db->sql_fetchrow($result))
	{
	$page_title 	= $row['video_title'];
	$user_id 		= $row['user_id'];
	$flash_status	= $this->config['allow_post_flash'] ? true : false;
	$delete_allowed = ($this->auth->acl_get('a_') or $this->auth->acl_get('m_') || ($this->user->data['is_registered'] && $this->user->data['user_id'] == $row['user_id'] && $this->auth->acl_get('u_video_delete')));

	$this->template->assign_block_vars('video',array(
		'VIDEO_ID'			=> censor_text($row['video_id']),
		'VIDEO_TITLE'		=> censor_text($row['video_title']),
		'VIDEO_VIEWS'		=> $row['video_views'],
		'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
		'YOUTUBE_ID'		=> censor_text($row['youtube_id']),
		'VIDEO_TIME'		=> $this->user->format_date($row['create_time']),
		'YOUTUBE_VIDEO'		=> 'http://www.youtube.com/watch?v='.$row['youtube_id'],
		'VIDEO_LINK' 		=> generate_board_url() . $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'view', 'id' => $row['video_id'])),
		'U_USER_VIDEOS' 	=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'user_videos' , 'user_id' => $this->user->data['user_id'])),
		'U_DELETE'			=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'delete', 'id' => $row['video_id'])),
		'DELETE_ALLOW'		=> $delete_allowed,
		'S_BBCODE_FLASH'	=> $flash_status,
		'FLASH_STATUS'		=> ($flash_status) ? $this->user->lang['FLASH_IS_ON'] : $this->user->lang['FLASH_IS_OFF'],
		'S_VIDEO_WIDTH'		=> $this->config['video_width'],
		'S_VIDEO_HEIGHT'	=> $this->config['video_height'],
	));
	}
	$this->db->sql_freeresult($result);

	// Count the videos user video ...
	$sql = 'SELECT COUNT(video_id) AS total_videos FROM ' . $this->video_table . ' WHERE user_id = '. (int) $user_id;
	$result = $this->db->sql_query($sql);
	$total_videos = (int) $this->db->sql_fetchfield('total_videos');
	$this->db->sql_freeresult($result);

	$this->template->assign_vars(array(
		'TOTAL_VIDEOS'		=> $total_videos,
	));

	$l_title = $page_title;
	$template_html = 'video_view.html';

	$this->template->assign_block_vars('navlinks', array(
		'FORUM_NAME' 	=> $page_title,
	));

	break;

	case 'cat';

	$sql_limit = ($sql_limit > 10) ? 10 : $sql_limit;
	$pagination_url = $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat', 'id' => $video_cat_ids));

	$sql_ary = array(
		'SELECT'	=> 'v.*,
		ct.video_cat_title,ct.video_cat_id,
		u.username,u.user_colour,u.user_id',
		'FROM'		=> array(
			$this->video_table			=> 'v',
			$this->video_cat_table		=> 'ct',
			USERS_TABLE			=> 'u',
		),
		'WHERE'		=> 'v.video_cat_id = '. $video_cat_ids .' AND ct.video_cat_id = '. $video_cat_ids .' AND v.user_id = u.user_id',
		'ORDER_BY'	=> 'v.video_id DESC',
	);

	$sql = $this->db->sql_build_query('SELECT', $sql_ary);
	$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

	while ($row = $this->db->sql_fetchrow($result))
	{
		$page_title	= $row['video_cat_title'];

		$this->template->assign_block_vars('video', array(
			'VIDEO_TITLE'	=> $row['video_title'],
			'VIDEO_CAT_ID'	=> $row['video_cat_id'],
			'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
			'VIDEO_VIEWS'	=> $row['video_views'],
			'U_CAT'			=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat' , 'id' => $row['video_cat_id'])),
			'VIDEO_TIME'	=> $this->user->format_date($row['create_time']),
			'VIDEO_ID'		=> censor_text($row['video_id']),
			'U_VIEW_VIDEO'	=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'view', 'id' => $row['video_id'])),
			'U_POSTER'		=> append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", array('mode' => 'viewprofile', 'u' => $row['user_id'])),
			'USERNAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
			'YOUTUBE_ID'	=> censor_text($row['youtube_id']),
		));
	}
	$this->db->sql_freeresult($result);

	// We need another query for the video count
	$sql = 'SELECT COUNT(*) as video_count FROM ' . $this->video_table .' WHERE video_cat_id = '. (int)$video_cat_ids;
	$result = $this->db->sql_query($sql);
	$videorow['video_count'] = $this->db->sql_fetchfield('video_count');
	$this->db->sql_freeresult($result);

	$start = $this->request->variable('start', 0);
	$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $videorow['video_count'], $sql_limit, $sql_start);

	$this->template->assign_vars(array(
		'TOTAL_VIDEOS'		=> ($videorow['video_count'] == 1) ? $this->user->lang['LIST_VIDEO'] : sprintf($this->user->lang['LIST_VIDEOS'], $videorow['video_count']),
		'CAT_NAME'			=> $page_title,
	));

	$l_title = $page_title;
	$template_html = 'video_cat.html';

	$this->template->assign_block_vars('navlinks', array(
		'FORUM_NAME' 	=> $page_title,
	));

	break;

	case 'user_videos';

	$this->template->assign_vars(array(
		'S_SEARCH_USER_VIDEO' 	=> true,
	));

	$sql_limit = ($sql_limit > 10) ? 10 : $sql_limit;
	$pagination_url = $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'user_videos', 'user_id' => $user_id));

	$sql_ary = array(
		'SELECT'	=> 'v.*,
		ct.video_cat_title,ct.video_cat_id,
		u.username,u.user_colour,u.user_id',
		'FROM'		=> array(
			$this->video_table			=> 'v',
			$this->video_cat_table		=> 'ct',
			USERS_TABLE			=> 'u',
		),
		'WHERE'		=> 'u.user_id = v.user_id AND ct.video_cat_id = v.video_cat_id AND u.user_id = '. $user_id,
		'ORDER_BY'	=> 'v.video_id DESC',
	);

	$sql = $this->db->sql_build_query('SELECT', $sql_ary);
	$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

	while ($row = $this->db->sql_fetchrow($result))
	{
		$page_title	= $row['username'];

		$this->template->assign_block_vars('video', array(
			'VIDEO_TITLE'	=> $row['video_title'],
			'VIDEO_CAT_ID'	=> $row['video_cat_id'],
			'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
			'VIDEO_VIEWS'	=> $row['video_views'],
			'U_CAT'			=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat' , 'id' => $row['video_cat_id'])),
			'VIDEO_TIME'	=> $this->user->format_date($row['create_time']),
			'VIDEO_ID'		=> censor_text($row['video_id']),
			'U_VIEW_VIDEO'	=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'view', 'id' => $row['video_id'])),
			'U_POSTER'		=> append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", array('mode' => 'viewprofile', 'u' => $row['user_id'])),
			'USERNAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
			'YOUTUBE_ID'	=> censor_text($row['youtube_id']),
		));
	}
	$this->db->sql_freeresult($result);

	// We need another query for the video count
	$sql = 'SELECT COUNT(*) as video_count FROM '. $this->video_table .' WHERE user_id = '. $user_id;
	$result = $this->db->sql_query($sql);
	$videorow['video_count'] = $this->db->sql_fetchfield('video_count');
	$this->db->sql_freeresult($result);

	$start = $this->request->variable('start', 0);
	$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $videorow['video_count'], $sql_limit, $sql_start);

	$this->template->assign_vars(array(
		'TOTAL_VIDEOS'		=> ($videorow['video_count'] == 1) ? $this->user->lang['LIST_VIDEO'] : sprintf($this->user->lang['LIST_VIDEOS'], $videorow['video_count']),
	));

	$l_title = ($this->user->lang['USER_VIDEOS'] . ' - ' . $page_title);
	$template_html = 'video_search.html';

	$this->template->assign_block_vars('navlinks', array(
		'FORUM_NAME' 	=> ($this->user->lang['USER_VIDEOS'] . ' - ' . $page_title),
	));
	break;

	default:
	//Listing categories
	$sql = 'SELECT * FROM ' . $this->video_cat_table . " ORDER BY video_cat_id";
	$res = $this->db->sql_query($sql);
	while($row = $this->db->sql_fetchrow($res))
	{
		$this->template->assign_block_vars('videocat', array(
			'VIDEO_CAT_ID'		=> $row['video_cat_id'],
			'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
			'U_CAT'				=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat' , 'id' => $row['video_cat_id'])),
		));
	}

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

	$l_title = ($this->user->lang['VIDEO_INDEX']);
	$template_html = 'video_body.html';

	$l_total_video_s 	= ($total_videos == 0) ? 'TOTAL_VIDEO_ZERO' : 'TOTAL_VIDEOS_OTHER';
	$l_total_category_s = ($total_categories == 0) ? 'TOTAL_CATEGORY_ZERO' : 'TOTAL_CATEGORIES_OTHER';

	$this->template->assign_vars(array(
		'U_VIDEO_SUBMIT' 	=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'submit')),
		'VIDEOSUBMIT'	 	=> $this->auth->acl_get('u_video_post'),
		'U_MY_VIDEOS'		=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'user_videos' , 'user_id' => $this->user->data['user_id'])),
		'BUTTON_VIDEO_NEW'	=> "{$web_path}styles/" .$this->user->lang_name .'/button_video_new.gif',
		'TOTAL_VIDEOS'		=> sprintf($this->user->lang[$l_total_video_s], $total_videos),
		'TOTAL_CATEGORIES'	=> sprintf($this->user->lang[$l_total_category_s], $total_categories),
	));

	$sql_limit = ($sql_limit > 10) ? 10 : $sql_limit;
	$pagination_url = $this->helper->route('dmzx_youtubegallery_controller');

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
	$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

	while ($row = $this->db->sql_fetchrow($result))
	{
		$this->template->assign_block_vars('video', array(
			'VIDEO_TITLE'	=> $row['video_title'],
			'VIDEO_CAT_ID'	=> $row['video_cat_id'],
			'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
			'VIDEO_VIEWS'	=> $row['video_views'],
			'U_CAT'			=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'cat', 'id' => $row['video_cat_id'])),
			'VIDEO_TIME'	=> $this->user->format_date($row['create_time']),
			'VIDEO_ID'		=> censor_text($row['video_id']),
			'U_VIEW_VIDEO'	=> $this->helper->route('dmzx_youtubegallery_controller', array('mode' => 'view', 'id' => $row['video_id'])),
			'U_POSTER'		=> append_sid("{$this->phpbb_root_path}memberlist.$this->phpEx", array('mode' => 'viewprofile', 'u' => $row['user_id'])),
			'USERNAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
			'YOUTUBE_ID'	=> censor_text($row['youtube_id']),
		));
	}
	$this->db->sql_freeresult($result);

	// We need another query for the video count
	$sql = 'SELECT COUNT(*) as video_count FROM ' . $this->video_table;
	$result = $this->db->sql_query($sql);
	$videorow['video_count'] = $this->db->sql_fetchfield('video_count');
	$this->db->sql_freeresult($result);

	$start = $this->request->variable('start', 0);
	$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $videorow['video_count'], $sql_limit, $sql_start);

	$this->template->assign_vars(array(
		'TOTAL_VIDEOS'		=> ($videorow['video_count'] == 1) ? $this->user->lang['LIST_VIDEO'] : sprintf($this->user->lang['LIST_VIDEOS'], $videorow['video_count']),
	));

	break;
}

if (!$row)
{
	$this->template->assign_vars(array(
		'NO_ENTRY'	=> ($this->user->lang['NO_VIDEOS']),
	));
}
// Output page
page_header($l_title, false);

$this->template->set_filenames(array(
	'body' => $template_html)
);

page_footer();

	}
}	