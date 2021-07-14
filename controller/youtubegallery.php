<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\controller;

use dmzx\youtubegallery\core\functions;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\template\template;
use phpbb\user;
use phpbb\auth\auth;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\request\request_interface;
use phpbb\pagination;
use Symfony\Component\DependencyInjection\Container;
use phpbb\textformatter\parser_interface;
use phpbb\textformatter\renderer_interface;
use phpbb\exception\http_exception;

class youtubegallery
{
	/** @var functions */
	protected $functions;

	/** @var config */
	protected $config;

	/** @var helper */
	protected $helper;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var auth */
	protected $auth;

	/** @var db_interface */
	protected $db;

	/** @var request_interface */
	protected $request;

	/** @var pagination */
	protected $pagination;

	/** @var Container */
	protected $phpbb_container;

	/** @var parser_interface */
	protected $parser;

	/** @var renderer_interface */
	protected $renderer;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/* @var string */
	protected $table_prefix;

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
	 * @param functions				$functions
	 * @param config				$config
	 * @param helper				$helper
	 * @param template				$template
	 * @param user					$user
	 * @param auth					$auth
	 * @param db_interface			$db
	 * @param request_interface		$request
	 * @param pagination			$pagination
	 * @param Container 			$phpbb_container
	 * @param parser_interface		$parser
	 * @param renderer_interface	$renderer
	 * @param string				$root_path
	 * @param string				$php_ext
	 * @param string				$table_prefix
	 * @param string 				$video_table
	 * @param string 				$video_cat_table
	 * @param string 				$video_cmnts_table
	 */
	public function __construct(
		functions $functions,
		config $config,
		helper $helper,
		template $template,
		user $user,
		auth $auth,
		db_interface $db,
		request_interface $request,
		pagination $pagination,
		Container $phpbb_container,
		parser_interface $parser,
		renderer_interface $renderer,
		$root_path,
		$php_ext,
		$table_prefix,
		$video_table,
		$video_cat_table,
		$video_cmnts_table
	)
	{
		$this->functions 			= $functions;
		$this->config 				= $config;
		$this->helper 				= $helper;
		$this->template 			= $template;
		$this->user 				= $user;
		$this->auth 				= $auth;
		$this->db 					= $db;
		$this->request 				= $request;
		$this->pagination 			= $pagination;
		$this->phpbb_container 		= $phpbb_container;
		$this->parser				= $parser;
		$this->renderer				= $renderer;
		$this->root_path 			= $root_path;
		$this->php_ext 				= $php_ext;
		$this->table_prefix 		= $table_prefix;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
		$this->video_cmnts_table 	= $video_cmnts_table;
	}

	public function handle_video()
	{
		if (!$this->auth->acl_get('u_video_view_full') || !$this->config['enable_video_global'])
		{
			throw new http_exception(403, 'NOT_AUTHORISED');
		}

		// Initial var setup
		$video_id			= $this->request->variable('id', 0);
		$video_url 			= $this->request->variable('video_url', '', true);
		$video_title 		= $this->request->variable('video_title', '', true);
		$time 				= $this->request->variable('time', '', true);
		$video_duration 	= $this->request->variable('video_duration', '', true);
		$video_description	= $this->request->variable('video_description', '', true);
		$video_description	= htmlspecialchars_decode($video_description, ENT_COMPAT);
		$video_viewcount	= $this->request->variable('video_viewcount', '', true);
		$video_cat_id 		= $this->request->variable('cid', 0);
		$video_cat_ids 		= $this->request->variable('id', 0);
		$username 			= $this->request->variable('username', '', true);
		$user_id 			= $this->request->variable('user_id', 0);
		$video_views 		= $this->request->variable('video_views', 0);
		$sql_start 			= $this->request->variable('start', 0);
		$sql_limit 			= $this->request->variable('limit', $this->config['videos_per_page']);
		$sql_limits 		= $this->request->variable('limit', $this->config['comments_per_page']);
		$cmnt_id 			= $this->request->variable('cmntid', 0);
		$mode 				= $this->request->variable('mode', '');
		$submit 			= $this->request->is_set_post('submit');

		if (!$this->config['google_api_key'])
		{
			if ($this->auth->acl_get('a_'))
			{
				throw new http_exception(401, 'NO_KEY_ADMIN');
			}
			else
			{
				throw new http_exception(401, 'NO_KEY_USER');
			}
		}

		if ($this->functions->curl_required() == false)
		{
			throw new http_exception(401, 'NO_CURL');
		}

		$youtube_id = $this->functions->getYouTubeIdFromURL($video_url);

		if ($this->functions->curl_required() && $submit)
		{
			$option = [
				'part' 	=> 'snippet,contentDetails',
				'id' 	=> $youtube_id,
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

			if (isset($jsonData->items[0]))
			{
				$video_title 		= $jsonData->items[0]->snippet->title;
				$video_description 	= $jsonData->items[0]->snippet->description;
				$time 				= $jsonData->items[0]->contentDetails->duration;

				$d_colon = str_ireplace(['PT', 'H', 'M', 'S'], ['',':',':',''], $time);

				//seconds
				if (substr_count($d_colon, ':') == 0)
				{
					$d_zeros = '00:00:'.$d_colon;
					$video_duration = '0:'.date("s", strtotime($d_zeros));
				}
				//minutes
				else if (substr_count($d_colon, ':') == 1)
				{
					$d_zeros = "00:".$d_colon;
					$video_duration = date("i:s", strtotime($d_zeros));
				}
				//hours
				else
				{
					$video_duration = date("H:i:s", strtotime($d_colon));
				}
			}
		}

		$sql_ary = [
			'video_id'			=> $video_id,
			'video_url'			=> $video_url,
			'video_title'		=> $video_title,
			'video_cat_id'		=> $video_cat_id,
			'username'			=> $username,
			'user_id'			=> $user_id,
			'youtube_id'		=> $youtube_id,
			'create_time'		=> (int) time(),
			'video_views'		=> $video_views,
			'video_duration'	=> $video_duration,
			'video_description'	=> $this->parser->parse($video_description),
		];

		$error = $row = [];

		$this->functions->assign_authors();

		$this->template->assign_vars([
			'S_NEW_VIDEO'		=> $this->auth->acl_get('u_video_post') ? true : false,
			'SCRIPT_NAME'		=> 'video',
			'U_VIDEO'			=> $this->helper->route('dmzx_youtubegallery_controller'),
			'VIDEO_FOOTER_VIEW'	=> true,
			'VIDEO_VERSION'		=> $this->config['youtubegallery_version'],
		]);

		$this->template->assign_block_vars('navlinks', [
			'FORUM_NAME' 		=> ($this->user->lang['VIDEO_INDEX']),
			'U_VIEW_FORUM'		=> $this->helper->route('dmzx_youtubegallery_controller'),
		]);

		$is_ajax = $this->request->is_ajax();

		switch ($mode)
		{
			case 'submit':
				// User is a bot?!
				if ($this->user->data['is_bot'])
				{
					redirect(append_sid("{$this->root_path}index.$this->php_ext"));
				}

				$redirect_url = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'submit']);

				// Is a guest?!
				if ($this->user->data['user_id'] == ANONYMOUS)
				{
					login_box($redirect_url);
				}

				// Can post?!
				if (!$this->auth->acl_get('u_video_post'))
				{
					throw new http_exception(403, 'NOT_AUTHORISED');
				}

				$l_title = $this->user->lang['VIDEO_SUBMIT'];
				$template_html = 'video_editor.html';

				$s_action = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'submit']);
				$s_hidden_fields = '';
				$form_enctype = '';

				// List of categories
				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . '
					ORDER BY video_cat_id DESC';
				$result = $this->db->sql_query($sql);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$this->template->assign_block_vars('cat', [
						'VIDEO_CAT_ID'		=> censor_text($row['video_cat_id']),
						'VIDEO_CAT_TITLE'	=> censor_text($row['video_cat_title']),
					]);
				}
				$this->db->sql_freeresult($result);

				// Start assigning vars for main posting page ...
				$this->template->assign_vars([
					'S_USER_ID'				=> $this->user->data['user_id'],
					'S_USERNAME'			=> $this->user->data['username'],
					'S_FORM_ENCTYPE'		=> $form_enctype,
					'S_POST_ACTION'			=> $s_action,
					'S_HIDDEN_FIELDS'		=> $s_hidden_fields,
					'ERROR'					=> (sizeof($error)) ? implode('<br />', $error) : '',
				]);

				$this->template->assign_block_vars('navlinks', [
					'FORUM_NAME' 			=> ($this->user->lang['VIDEO_SUBMIT']),
				]);

				add_form_key('postform');

				if ($submit)
				{
					if (!check_form_key('postform'))
					{
						throw new http_exception(400, 'FORM_INVALID');
					}
				}

				switch ($submit)
				{
					case 'add':

						if ($video_url == '')
						{
							$message = $this->user->lang('NEED_VIDEO_URL');

							$json_data = [
								'error_msg' => $message,
							];

							$redirect = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'submit']);
							$redirect_text = 'PAGE_RETURN';
							$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
						}
						else
						{
							$this->db->sql_query('INSERT INTO ' . $this->video_table .' ' . $this->db->sql_build_array('INSERT', $sql_ary));

							if ($this->phpbb_container->has('dmzx.mchat.settings') && $this->config['enable_video_chat'])
							{
								$enable_bbcode = $enable_urls = $enable_smilies = true;

								$sql_ary = [
									'SELECT'	=> 'v.*,
									ct.video_cat_title,ct.video_cat_id,
									u.username,u.user_colour,u.user_id',
									'FROM'		=> [
										$this->video_table			=> 'v',
										$this->video_cat_table		=> 'ct',
										USERS_TABLE			=> 'u',
									],
									'WHERE'		=> 'u.user_id = v.user_id
										AND ct.video_cat_id = v.video_cat_id
										AND u.user_id = ' . (int) $user_id,
									'ORDER_BY'	=> 'v.video_id DESC',
								];
								$sql = $this->db->sql_build_query('SELECT', $sql_ary);
								$result = $this->db->sql_query($sql);
								$row = $this->db->sql_fetchrow($result);
								$this->db->sql_freeresult($result);

								$meta_info = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => (int) $row['video_id']]);

								$sql_arys = [
									'user_id'			=> (int) $user_id,
									'user_ip'			=> $this->user->ip,
									'message'			=> $this->user->lang('VIDEO_ADD_CHAT', $video_title, $meta_info, censor_text($row['video_cat_title'])),
									'bbcode_bitfield'	=> '',
									'bbcode_uid'		=> '',
									'message_time'		=> time()
								];

								$options = 0;
								generate_text_for_storage($sql_arys['message'], $sql_arys['bbcode_uid'], $sql_arys['bbcode_bitfield'], $options, $enable_bbcode, $enable_urls, $enable_smilies);

								$this->db->sql_query('INSERT INTO ' . $this->table_prefix . 'mchat'	. ' ' . $this->db->sql_build_array('INSERT', $sql_arys));
							}

							$message = $this->user->lang('VIDEO_CREATED');

							$json_data = [
								'error_msg' => $message,
							];

							$redirect = $this->helper->route('dmzx_youtubegallery_controller');
							$redirect_text = 'PAGE_RETURN';
							$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);

						}
					break;
				}
			break;

			case 'comment':

				$l_title = $this->user->lang['VIDEO_CMNT_SUBMIT'];
				$template_html = '@dmzx_youtubegallery/video_cmnt_editor.html';

				if (!$this->config['enable_comments'])
				{
					throw new http_exception(401, 'COMMENTS_DISABLED');
				}

				// User is a bot?!
				if ($this->user->data['is_bot'])
				{
					redirect(append_sid("{$this->root_path}index.$this->php_ext"));
				}

				// Can post?!
				if (!$this->auth->acl_get('u_video_comment'))
				{
					throw new http_exception(403, 'NOT_AUTHORISED');
				}

				$redirect_url = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'comment', 'v' => (int) $video_id]);

				// Is a guest?!
				if ($this->user->data['user_id'] == ANONYMOUS)
				{
					login_box($redirect_url);
				}

				if (!function_exists('generate_smilies'))
				{
					include($this->root_path . 'includes/functions_posting.' . $this->php_ext);
				}

				if (!function_exists('display_custom_bbcodes'))
				{
					include($this->root_path . 'includes/functions_display.' . $this->php_ext);
				}

				//Settings for comments
				$this->user->setup('posting');
				display_custom_bbcodes();
				generate_smilies('inline', 0);

				$bbcode_status		= ($this->config['allow_bbcode']) ? true : false;
				$smilies_status		= ($this->config['allow_smilies']) ? true : false;
				$img_status			= ($bbcode_status) ? true : false;
				$url_status			= ($this->config['allow_post_links']) ? true : false;
				$flash_status		= ($bbcode_status && $this->config['allow_post_flash']) ? true : false;
				$quote_status		= true;
				$video_id			= $this->request->variable('v', 0);
				$uid = $bitfield = $options = '';
				$allow_bbcode = $allow_urls = $allow_smilies = true;
				$s_action 			= $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'comment', 'v' => (int) $video_id]);
				$s_hidden_fields 	= '';
				$form_enctype 		= '';

				add_form_key('postform');

				// Start assigning vars for main posting page ...
				$this->template->assign_vars([
					'VIDEO_ID'				=> (int) $video_id,
					'S_FORM_ENCTYPE'		=> $form_enctype,
					'S_POST_ACTION'			=> $s_action,
					'S_HIDDEN_FIELDS'		=> $s_hidden_fields,
					'ERROR'					=> (sizeof($error)) ? implode('<br />', $error) : '',
					'S_BBCODE_ALLOWED'		=> ($bbcode_status) ? 1 : 0,
					'S_SMILIES_ALLOWED'		=> $smilies_status,
					'S_BBCODE_IMG'			=> $img_status,
					'S_BBCODE_URL'			=> $url_status,
					'S_LINKS_ALLOWED'		=> $url_status,
					'S_BBCODE_QUOTE'		=> $quote_status,
					'BBCODE_STATUS'			=> ($bbcode_status) ? $this->user->lang('BBCODE_IS_ON', '<a href="' . append_sid("{$this->root_path}faq.$this->php_ext", 'mode=bbcode') . '">', '</a>') : $this->user->lang('BBCODE_IS_OFF', '<a href="' . append_sid("{$this->root_path}faq.$this->php_ext", 'mode=bbcode') . '">', '</a>'),
					'IMG_STATUS'			=> ($img_status) ? $this->user->lang['IMAGES_ARE_ON'] : $this->user->lang['IMAGES_ARE_OFF'],
					'FLASH_STATUS'			=> ($flash_status) ? $this->user->lang['FLASH_IS_ON'] : $this->user->lang['FLASH_IS_OFF'],
					'SMILIES_STATUS'		=> ($smilies_status) ? $this->user->lang['SMILIES_ARE_ON'] : $this->user->lang['SMILIES_ARE_OFF'],
					'URL_STATUS'			=> ($bbcode_status && $url_status) ? $this->user->lang['URL_IS_ON'] : $this->user->lang['URL_IS_OFF'],
				]);

				if ($this->request->is_set_post('submit'))
				{
					if (!check_form_key('postform'))
					{
						throw new http_exception(400, 'FORM_INVALID');
					}

					$video_id = $this->request->variable('v', 0); // Get video to redirect :D
					$message = $this->request->variable('cmnt_text', '', true);
					generate_text_for_storage($message, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);

					$data = [
						'cmnt_video_id'		=> $this->request->variable('cmnt_video_id', 0),
						'cmnt_poster_id'	=> $this->user->data['user_id'],
						'cmnt_text'			=> $message,
						'create_time'		=> time(),
						'bbcode_uid'		=> $uid,
						'bbcode_bitfield'	=> $bitfield,
						'bbcode_options'	=> $options,
					];

					if ($message == '')
					{
						$message = $this->user->lang('NEED_VIDEO_MESSAGE');

						$json_data = [
							'error_msg' => $message,
						];

						$redirect = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'comment', 'v' => (int) $video_id]);
						$redirect_text = 'PAGE_RETURN';
						$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
					}
					else
					{
						$this->db->sql_query('INSERT INTO ' . $this->video_cmnts_table . ' ' . $this->db->sql_build_array('INSERT', $data));

						$meta_info = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => (int) $video_id]);

						if ($this->phpbb_container->has('dmzx.mchat.settings') && $this->config['enable_video_chat_comment'])
						{
							$enable_bbcode = $enable_urls = $enable_smilies = true;

							$sql = 'SELECT video_id, video_title
								FROM ' . $this->video_table . '
								WHERE video_id = ' . (int) $video_id;
							$result = $this->db->sql_query($sql);
							while ($row = $this->db->sql_fetchrow($result))
							{
								$video_title = $row['video_title'];
							}
							$this->db->sql_freeresult($result);

							$sql_arys = [
								'user_id'			=> $this->user->data['user_id'],
								'user_ip'			=> $this->user->ip,
								'message'			=> $this->user->lang('VIDEO_COMMENT_CHAT', $video_title, $meta_info),
								'bbcode_bitfield'	=> '',
								'bbcode_uid'		=> '',
								'message_time'		=> time()
							];

							$options = 0;
							generate_text_for_storage($sql_arys['message'], $sql_arys['bbcode_uid'], $sql_arys['bbcode_bitfield'], $options, $enable_bbcode, $enable_urls, $enable_smilies);

							$this->db->sql_query('INSERT INTO ' . $this->table_prefix . 'mchat'	. ' ' . $this->db->sql_build_array('INSERT', $sql_arys));
						}

						$message = $this->user->lang('COMMENT_CREATED');

						$json_data = [
							'error_msg' => $message,
						];

						$redirect = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => (int) $video_id]);
						$redirect_text = 'PAGE_RETURN';
						$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
					}
				}

				$this->template->assign_block_vars('navlinks', [
					'FORUM_NAME' 	=> ($this->user->lang['VIDEO_CMNT_SUBMIT']),
				]);
			break;

			case 'delcmnt':

				if (!$this->auth->acl_get('u_video_comment_delete'))
				{
					throw new http_exception(403, 'NOT_AUTHORISED');
				}

				$video_id = $this->request->variable('v', 0); // Get video to redirect :D

				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_cmnts_table . '
						WHERE cmnt_id = ' . (int) $cmnt_id;
					$this->db->sql_query($sql);

					$message = $this->user->lang('COMMENT_DELETED_SUCCESS');

					$json_data = [
						'error_msg' => $message,
					];

					$redirect = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => (int) $video_id]);
					$redirect_text = 'PAGE_RETURN';
					$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
				}
				else
				{
					$s_hidden_fields = build_hidden_fields([
						'id'	 	=> $cmnt_id,
						'mode'		=> 'delcmnt',
						]
					);
					confirm_box(false, $this->user->lang['DELETE_COMMENT_CONFIRM'], $s_hidden_fields);

					$message = $this->user->lang('DELETE_COMMENT_NOT');

					$json_data = [
						'error_msg' => $message,
					];

					$redirect = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => (int) $video_id]);
					$redirect_text = 'PAGE_RETURN';
					$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
				}
			break;

			case 'delete':

				if (!$this->auth->acl_get('u_video_delete'))
				{
					throw new http_exception(403, 'NOT_AUTHORISED');
				}

				$l_title = ($this->user->lang['DELETE_VIDEO']);

				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_table . '
						WHERE video_id = ' . (int) $video_id;
					$this->db->sql_query($sql);

					$sql = 'DELETE FROM ' . $this->video_cmnts_table . '
						WHERE cmnt_video_id = ' . (int) $video_id;
					$this->db->sql_query($sql);

					$message = $this->user->lang('VIDEO_DELETED');

					$json_data = [
						'error_msg' => $message,
					];

					$redirect = $this->helper->route('dmzx_youtubegallery_controller');
					$redirect_text = 'PAGE_RETURN';
					$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
				}
				else
				{
					$s_hidden_fields = build_hidden_fields([
						'mode'		=> 'delete',
						'submit' 	=> true,
						'video_id' 	=> $video_id,
					]);
					confirm_box(false, $this->user->lang['DELETE_VIDEO'], $s_hidden_fields);

					$message = $this->user->lang('RETURN_TO_VIDEO_INDEX');

					$json_data = [
						'error_msg' => $message,
					];

					$redirect = $this->helper->route('dmzx_youtubegallery_controller');
					$redirect_text = 'PAGE_RETURN';
					$this->functions->response($message, $json_data, $redirect, $redirect_text, $is_ajax);
				}
			break;

			case 'view':

				if (!$this->auth->acl_get('u_video_view'))
				{
					throw new http_exception(401, 'VIDEO_UNAUTHED');
				}

				// Update video view... but only for humans
				if (isset($this->user->data['session_page']) && !$this->user->data['is_bot'])
				{
					$sql = 'UPDATE ' . $this->video_table . '
						SET video_views = video_views + 1
						WHERE video_id = ' . (int) $video_id;
					$this->db->sql_query($sql);
				}

				$sql_ary = [
					'SELECT'	=> 'v.*, u.*',
					'FROM'		=> [
						$this->video_table	=> 'v',
						USERS_TABLE			=> 'u',
					],
					'WHERE'		=> 'v.video_id = ' . (int) $video_id . '
						AND u.user_id = v.user_id',
					'ORDER_BY'	=> 'v.video_id DESC',
				];

				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				$page_title 	= $row['video_title'];
				$user_id 		= $row['user_id'];
				$flash_status	= $this->config['allow_post_flash'] ? true : false;
				$delete_allowed = ($this->auth->acl_get('a_') || $this->auth->acl_get('m_') || ($this->user->data['is_registered'] && $this->user->data['user_id'] == $row['user_id'] && $this->auth->acl_get('u_video_delete')));
				$board_url 		= generate_board_url();

				$this->template->assign_vars([
					'VIDEO_ID'			=> censor_text($row['video_id']),
					'VIDEO_TITLE'		=> censor_text($row['video_title']),
					'VIDEO_VIEWS'		=> $row['video_views'],
					'VIDEO_DURATION'	=> $row['video_duration'],
					'VIDEO_DESCRIPTION'	=> $this->renderer->render($row['video_description']),
					'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
					'YOUTUBE_ID'		=> censor_text($row['youtube_id']),
					'VIDEO_TIME'		=> $this->user->format_date($row['create_time']),
					'YOUTUBE_VIDEO'		=> 'https://www.youtube.com/watch?v='.$row['youtube_id'],
					'VIDEO_LINK' 		=> append_sid("{$board_url}/video", 'mode=view&id=' . $row['video_id']),
					'VIDEO_LINK_FLASH'	=> 'https://www.youtube.com/v/' . $row['youtube_id'],
					'U_USER_VIDEOS' 	=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'user_videos', 'user_id' => $row['user_id'], 'usernamesearch' => $row['username']]),
					'U_DELETE'			=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'delete', 'id' => $row['video_id']]),
					'DELETE_ALLOW'		=> $delete_allowed,
					'S_BBCODE_FLASH'	=> $flash_status,
					'FLASH_STATUS'		=> ($flash_status) ? $this->user->lang['FLASH_IS_ON'] : $this->user->lang['FLASH_IS_OFF'],
					'U_POST_COMMENT'	=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'comment', 'v' => $row['video_id']]),
					'S_ENABLE_COMMENTS'	=> $this->config['enable_comments'],
					'S_POST_COMMENT'	=> $this->auth->acl_get('u_video_comment'),
				]);

				// Comments
				$pagination_url = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $video_id]);

				$sql_ary = [
					'SELECT'	=> 'v.*, cmnt.*, u.username,u.user_colour,u.user_id',
					'FROM'		=> [
						$this->video_table			=> 'v',
						$this->video_cmnts_table	=> 'cmnt',
						USERS_TABLE					=> 'u',
					],
						'WHERE'		=> 'v.video_id = ' . (int) $video_id . '
							AND cmnt.cmnt_video_id = v.video_id
							AND u.user_id = cmnt.cmnt_poster_id',
						'ORDER_BY'	=> 'cmnt.cmnt_id DESC',
				];
				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query_limit($sql, $sql_limits, $sql_start);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$delete_cmnt_allowed = ($this->auth->acl_get('a_') || $this->auth->acl_get('m_') || ($this->user->data['is_registered'] && $this->user->data['user_id'] == $row['user_id'] && $this->auth->acl_get('u_video_comment_delete')));
					$text = generate_text_for_display($row['cmnt_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $row['bbcode_options']);

					$this->template->assign_block_vars('commentrow', [
						'COMMENT_ID'		=> $row['cmnt_id'],
						'COMMENT_TEXT'		=> $text,
						'COMMENT_TIME'		=> $this->user->format_date($row['create_time']),
						'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'S_DELETE_ALLOWED'	=> $delete_cmnt_allowed,
						'U_DELETE'			=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'delcmnt', 'cmntid' => (int) $row['cmnt_id'], 'v' => (int) $row['cmnt_video_id']]),
					]);
				}
				$this->db->sql_freeresult($result);

				//Start pagination
				$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $this->functions->video_comment_count($video_id), $sql_limits, $sql_start);

				$this->template->assign_vars([
					'TOTAL_COMMENTS'	=> $this->user->lang('LIST_COMMENT', (int) $this->functions->video_comment_count($video_id)),
					'TOTAL_VIDEOS'		=> $this->functions->videorow_user_id($user_id),
				]);
				//End pagination

				$l_title = $page_title;
				$template_html = 'video_view.html';

				$this->template->assign_block_vars('navlinks', [
					'FORUM_NAME' 	=> $page_title,
				]);

			break;

			case 'cat';

				$pagination_url = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'cat', 'id' => $video_cat_ids]);

				$sql_ary = [
					'SELECT'	=> 'v.*,
					ct.video_cat_title,ct.video_cat_id,
					u.username,u.user_colour,u.user_id',
					'FROM'		=> [
						$this->video_table			=> 'v',
						$this->video_cat_table		=> 'ct',
						USERS_TABLE			=> 'u',
					],
					'WHERE'	=> 'v.video_cat_id = ' . (int) $video_cat_ids . '
						AND ct.video_cat_id = ' . (int) $video_cat_ids . '
						AND v.user_id = u.user_id',
					'ORDER_BY'	=> 'v.video_id DESC',
				];
				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$video_info = $this->functions->youtube_analytics(["id" => censor_text($row['youtube_id'])]);

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
						'VIDEO_ID'						=> censor_text($row['video_id']),
						'U_VIEW_VIDEO'					=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $row['video_id']]),
						'U_POSTER'						=> append_sid("{$this->root_path}memberlist.$this->php_ext", ['mode' => 'viewprofile', 'u' => $row['user_id']]),
						'USERNAME'						=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'VIDEO_THUMBNAIL'				=> 'https://img.youtube.com/vi/' . censor_text($row['youtube_id']) . '/hqdefault.jpg'
					]);
				}
				$this->db->sql_freeresult($result);

				$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $this->functions->video_cat_id($video_cat_ids), $sql_limit, $sql_start);

				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . '
					WHERE video_cat_id = ' . (int) $video_cat_ids;
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				$this->template->assign_vars([
					'CAT_NAME'								=> $row['video_cat_title'],
					'TOTAL_VIDEOS'							=> $this->user->lang('LIST_VIDEO', (int) $this->functions->video_cat_id($video_cat_ids)),
					'ENABLE_VIDEO_YOUTUBE_STATS'			=> $this->config['enable_video_youtube_stats'],
				]);

				$l_title = $row['video_cat_title'];
				$template_html = 'video_cat.html';

				$this->template->assign_block_vars('navlinks', [
					'FORUM_NAME' 	=> $row['video_cat_title'],
				]);

			break;

			case 'user_videos';

				$this->template->assign_vars([
					'S_SEARCH_USER_VIDEO' 	=> true,
				]);

				$pagination_url = $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'user_videos', 'user_id' => $user_id]);

				$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $this->functions->videorow_user_id($user_id), $sql_limit, $sql_start);

				$this->template->assign_vars([
					'TOTAL_VIDEOS'		=> $this->user->lang('LIST_VIDEO', (int) $this->functions->videorow_user_id($user_id)),
				]);

				$sql_ary = [
					'SELECT'	=> 'v.*,
					ct.video_cat_title,ct.video_cat_id,
					u.username,u.user_colour,u.user_id',
					'FROM'		=> [
						$this->video_table			=> 'v',
						$this->video_cat_table		=> 'ct',
						USERS_TABLE			=> 'u',
					],
					'WHERE'		=> 'u.user_id = v.user_id
						AND ct.video_cat_id = v.video_cat_id
						AND u.user_id = ' . (int) $user_id,
					'ORDER_BY'	=> 'v.video_id DESC',
				];

				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

				while ($row = $this->db->sql_fetchrow($result))
				{
					$video_info = $this->functions->youtube_analytics(["id" => censor_text($row['youtube_id'])]);

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
						'VIDEO_ID'						=> censor_text($row['video_id']),
						'U_VIEW_VIDEO'					=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $row['video_id']]),
						'U_POSTER'						=> append_sid("{$this->root_path}memberlist.$this->php_ext", ['mode' => 'viewprofile', 'u' => $row['user_id']]),
						'USERNAME'						=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'VIDEO_THUMBNAIL'				=> 'https://img.youtube.com/vi/' . censor_text($row['youtube_id']) . '/hqdefault.jpg'
					]);

					$this->template->assign_vars([
						'USERNAME_SEARCH'						=> get_username_string('no_profile', $row['user_id'], $row['username']) . ' (' . $this->functions->videorow_user_id($user_id) . ')',
						'ENABLE_VIDEO_YOUTUBE_STATS'			=> $this->config['enable_video_youtube_stats'],
					]);
				}
				$this->db->sql_freeresult($result);

				$l_title = $this->user->lang['USER_VIDEOS'];
				$template_html = 'video_search.html';
			break;

			default:
				//Listing categories
				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . "
					ORDER BY video_cat_id";
				$res = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($res))
				{
					$this->template->assign_block_vars('videocat', [
						'VIDEO_CAT_ID'		=> $row['video_cat_id'],
						'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
						'U_CAT'				=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'cat', 'id' => $row['video_cat_id']]),
					]);
				}

				$l_title = ($this->user->lang['VIDEO_INDEX']);

				$template_html = 'video_body.html';

				$this->template->assign_vars([
					'U_VIDEO_SUBMIT' 		=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'submit']),
					'VIDEOSUBMIT'	 		=> $this->auth->acl_get('u_video_post'),
					'U_MY_VIDEOS'			=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'user_videos', 'user_id' => $this->user->data['user_id']]),
					'TOTAL_VIDEOS_INDEX'	=> $this->user->lang('TOTAL_VIDEO', $this->functions->total_videos()),
					'TOTAL_CATEGORIES'		=> $this->user->lang('TOTAL_CATEGORIES', $this->functions->total_categories()),
					'TOTAL_VIEWS'			=> $this->user->lang('TOTAL_VIEWS', $this->functions->total_views()),
					'TOTAL_COMMENTS'		=> $this->user->lang('TOTAL_COMMENTS', $this->functions->total_comments()),
				]);

				$pagination_url = $this->helper->route('dmzx_youtubegallery_controller');

				// Build template
				$this->functions->video_template();

				// We need another query for the video count
				$sql = 'SELECT COUNT(*) as video_count
					FROM ' . $this->video_table;
				$result = $this->db->sql_query($sql);
				$videorow = $this->db->sql_fetchfield('video_count');
				$this->db->sql_freeresult($result);

				$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $videorow, $sql_limit, $sql_start);

				$this->template->assign_vars([
					'TOTAL_VIDEOS'							=> $this->user->lang('LIST_VIDEO', (int) $videorow),
					'VIDEO_FOOTER_VIEW'						=> true,
					'VIDEO_VERSION'							=> $this->config['youtubegallery_version'],
					'ENABLE_VIDEO_YOUTUBE_STATS'			=> $this->config['enable_video_youtube_stats'],
				]);

			break;
		}

		if (!$row)
		{
			$this->template->assign_vars([
				'NO_ENTRY'	=> ($this->user->lang['NO_VIDEOS']),
			]);
		}

		make_jumpbox(append_sid("{$this->root_path}viewforum.$this->php_ext"));

		// Send all data to the template file
		return $this->helper->render($template_html, $l_title);
	}
}
