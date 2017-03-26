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

use phpbb\config\config;
use phpbb\template\template;
use phpbb\log\log_interface;
use phpbb\user;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\request\request_interface;

class admin_controller
{
	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var log_interface */
	protected $log;

	/** @var user */
	protected $user;

	/** @var db_interface */
	protected $db;

	/** @var request_interface */
	protected $request;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;

	/** @var string Custom form action */
	protected $u_action;

	/**
	 * Constructor
	 *
	 * @param config				$config
	 * @param template				$template
	 * @param log_interface			$log
	 * @param user					$user
	 * @param db_interface			$db
	 * @param request_interface		$request
	 * @param string 				$video_table
	 * @param string 				$video_cat_table
	 */
	public function __construct(
		config $config,
		template $template,
		log_interface $log,
		user $user,
		db_interface $db,
		request_interface $request,
		$video_table,
		$video_cat_table
	)
	{
		$this->config 			= $config;
		$this->template 		= $template;
		$this->log 				= $log;
		$this->user 			= $user;
		$this->db 				= $db;
		$this->request 			= $request;
		$this->video_table 		= $video_table;
		$this->video_cat_table 	= $video_cat_table;
	}

	public function display_settings()
	{
		add_form_key('acp_video');

		// Is the form being submitted to us?
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('acp_video'))
			{
				trigger_error($this->user->lang['FORM_INVALID'] . adm_back_link($this->u_action));
			}

			// Set the options the user configured
			$this->set_options();

			// Add option settings change action to the admin log
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_VIDEO_SETTINGS');

			trigger_error($this->user->lang['ACP_VIDEO_SETTINGS_SAVED'] . adm_back_link($this->u_action));
		}

		$this->template->assign_vars(array(
			'VIDEO_GALLERY_VERSION'				=> $this->config['youtubegallery_version'],
			'ENABLE_VIDEO_GLOBAL'				=> $this->config['enable_video_global'],
			'GOOGLE_KEY_ACP'					=> $this->config['google_api_key'],
			'ENABLE_VIDEO_STATICS_ON_INDEX'		=> $this->config['enable_video_statics_on_index'],
			'ENABLE_COMMENTS'					=> $this->config['enable_comments'],
			'COMMENTS_PER_PAGE_ACP'				=> $this->config['comments_per_page'],
			'ENABLE_VIDEO_ON_INDEX'				=> $this->config['enable_video_on_index'],
			'ENABLE_VIDEO_ON_INDEX_LOCATION'	=> $this->config['enable_video_on_index_location'],
			'VIDEO_ON_INDEX_VALUE_ACP'			=> $this->config['video_on_index_value'],

			'U_ACTION'							=> $this->u_action,
		));
	}

	protected function set_options()
	{
		$this->config->set('enable_video_global', $this->request->variable('enable_video_global', 0));
		$this->config->set('google_api_key', $this->request->variable('google_api_key', ''));
		$this->config->set('enable_video_statics_on_index', $this->request->variable('enable_video_statics_on_index', 0));
		$this->config->set('enable_comments', $this->request->variable('enable_comments', 0));
		$this->config->set('comments_per_page', $this->request->variable('comments_per_page', ''));
		$this->config->set('enable_video_on_index', $this->request->variable('enable_video_on_index', 0));
		$this->config->set('enable_video_on_index_location', $this->request->variable('enable_video_on_index_location', 0));
		$this->config->set('video_on_index_value', $this->request->variable('video_on_index_value', ''));
	}

	public function display_cat()
	{
		$form_key = 'acp_video_cat';
		add_form_key($form_key);

		$form_action 		= $this->u_action. '&amp;action=add';
		$lang_mode			= $this->user->lang['ACP_VIDEO_CATEGORY'];
		$video_cat_id 		= $this->request->variable('video_cat_id', 0);
		$video_cat_title 	= $this->request->variable('video_cat_title', '', true);
		$action				= ($this->request->is_set_post('add') ? 'add' : ($this->request->is_set_post('delete')) ? 'delete' : $this->request->variable('action', ''));

		$sql_ary = array(
			'video_cat_id'		=> $video_cat_id,
			'video_cat_title'	=> $video_cat_title,
		);

		switch ($action)
		{
			case 'add':
				if ($video_cat_title == '')
				{
					trigger_error($this->user->lang['ACP_VIDEO_CAT_TITLE_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
				}
				else
				{
					$this->db->sql_query('INSERT INTO ' . $this->video_cat_table .' ' . $this->db->sql_build_array('INSERT', $sql_ary));

					// Add option category change action to the admin log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_VIDEO_CATEGORY_ADD');

					trigger_error($this->user->lang['ACP_CATEGORY_CREATED'] . adm_back_link($this->u_action));
				}
			break;
			case 'edit':
				$form_action = $this->u_action. '&amp;action=update';
				$lang_mode = $this->user->lang['ACP_CATEGORY_EDIT'];

				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . '
					WHERE video_cat_id = ' . (int) $this->request->variable('id', 0);
				$result = $this->db->sql_query_limit($sql,1);
				$row = $this->db->sql_fetchrow($result);

				$this->template->assign_vars(array(
					'S_EDIT_MODE'		=> true,
					'VIDEO_CAT_ID'		=> $row['video_cat_id'],
					'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
				));
				$this->db->sql_freeresult($result);
			break;
			case 'update':
				if ($video_cat_title == '')
				{
					trigger_error($this->user->lang['ACP_VIDEO_CAT_TITLE_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
				}
				else
				{
					$this->db->sql_query('UPDATE ' . $this->video_cat_table . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . ' WHERE VIDEO_CAT_ID = ' . $video_cat_id);

					// Add option category update change action to the admin log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_VIDEO_CATEGORY_UPDATE');

					trigger_error($this->user->lang['ACP_CATEGORY_UPDATED'] . adm_back_link($this->u_action));
				}
			break;
			case 'delete':
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_cat_table . '
						WHERE video_cat_id = ' . (int) $this->request->variable('id', 0);
					$this->db->sql_query($sql);

					// Add option category delete change action to the admin log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_VIDEO_CATEGORY_DELETED');

					trigger_error($this->user->lang['ACP_CATEGORY_DELETED'] . adm_back_link($this->u_action));
				}
				else
				{
					confirm_box(false, $this->user->lang['ACP_CATEGORY_DELETE'], build_hidden_fields(array(
						'video_cat_id'		=> $video_cat_id,
						'action'			=> 'delete',
					)));
				}
			break;
		}

		$sql = 'SELECT *
			FROM ' . $this->video_cat_table . '
			ORDER by video_cat_id';
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->template->assign_block_vars('category', array(
				'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
				'U_EDIT'			=> $this->u_action . '&amp;action=edit&amp;id=' .$row['video_cat_id'],
				'U_DEL'				=> $this->u_action . '&amp;action=delete&amp;id=' .$row['video_cat_id'],
			));
		}
		$this->db->sql_freeresult($result);

		$this->template->assign_vars(array(
			'U_ACTION'		=> $form_action,
			'L_MODE_TITLE'	=> $lang_mode,
		));
	}

	public function display_title()
	{
		$form_key = 'acp_video_title';
		add_form_key($form_key);

		$form_action 		= $this->u_action. '&amp;action=delete';
		$lang_mode			= $this->user->lang['ACP_VIDEO_TITLE'];
		$video_id 			= $this->request->variable('video_id', 0);
		$action				= ($this->request->is_set_post('delete')) ? 'delete' : $this->request->variable('action', '');

		switch ($action)
		{
			case 'delete':
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_table . '
						WHERE video_id = ' . (int) $this->request->variable('id', 0);
					$this->db->sql_query($sql);

					// Add option title delete change action to the admin log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_VIDEO_TITLE_DELETED');

					trigger_error($this->user->lang['ACP_TITLE_DELETED'] . adm_back_link($this->u_action));
				}
				else
				{
					confirm_box(false, $this->user->lang['ACP_TITLE_DELETE'], build_hidden_fields(array(
						'video_id'		=> $video_id,
						'action'		=> 'delete',
					)));
				}
			break;
		}

		$sql_title_ary = array(
			'SELECT' => 'v.*, ct.*, u.username,u.user_colour,u.user_id',
			'FROM'	=> array(
				$this->video_table			=> 'v',
				$this->video_cat_table		=> 'ct',
				USERS_TABLE			=> 'u',
			),
			'WHERE'	=> 'ct.video_cat_id = v.video_cat_id
				AND u.user_id = v.user_id',
			'ORDER_BY'	=> 'v.video_id DESC',
		);
		$sql = $this->db->sql_build_query('SELECT', $sql_title_ary);
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->template->assign_block_vars('title', array(
				'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
				'VIDEO_CAT_ID'		=> $row['video_cat_id'],
				'VIDEO_TITLE'		=> $row['video_title'],
				'U_EDIT'			=> $this->u_action . '&amp;action=edit&amp;id=' . $row['video_cat_id'],
				'U_DEL'				=> $this->u_action . '&amp;action=delete&amp;id=' . $row['video_id'],
				'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
			));
		}
		$this->db->sql_freeresult($result);

		$this->template->assign_vars(array(
			'U_ACTION'		=> $form_action,
			'L_MODE_TITLE'	=> $lang_mode,
		));
	}

	/**
	* Set page url
	*
	* @param string $u_action Custom form action
	* @return null
	* @access public
	*/
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
