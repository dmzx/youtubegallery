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

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
* Admin controller
*/
class admin_controller
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\log\log_interface */
	protected $log;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var string */
	protected $phpbb_root_path;

	/** @var string */
	protected $phpEx;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config				$config
	 * @param \phpbb\template\template			$template
	 * @param \phpbb\log\log_interface			$log
	 * @param \phpbb\user						$user
	 * @param \phpbb\db\driver\driver_interface	$db
	 * @param \phpbb\request\request			$request
	 * @param									$phpbb_root_path
	 * @param									$phpEx
	 * @param string 							$video_table
	 * @param string 							$video_cat_table
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\log\log_interface $log, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, \phpbb\request\request $request, $phpbb_root_path, $phpEx, $video_table, $video_cat_table)
	{
		$this->config = $config;
		$this->template = $template;
		$this->phpbb_log = $log;
		$this->user = $user;
		$this->db = $db;
		$this->request = $request;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->phpEx = $phpEx;
		$this->video_table = $video_table;
		$this->video_cat_table = $video_cat_table;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_settings()
	{
		// Create a form key for preventing CSRF attacks
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
			$this->phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'ACP_VIDEO_SETTINGS');

		}

		// Set the options the user configured
		$display_vars = array(
			'vars'	=> array(
			'legend1'						=> 'ACP_VIDEO_GENERAL_SETTINGS',
			'video_width'					=> array('lang' => 'ACP_VIDEO_WIDTH',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $this->user->lang['PIXEL']),
			'video_height'					=> array('lang' => 'ACP_VIDEO_HEIGHT',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $this->user->lang['PIXEL']),
			'google_api_key'				=> array('lang' => 'ACP_GOOGLE_KEY',	'validate' => 'string',	'type' => 'text:40:40', 'explain' => true),
			'enable_video_statics_on_index'	=> array('lang' => 'ACP_ENABLE_VIDEO_STATICS_ON_INDEX',			'validate' => 'bool',	'type' => 'radio:yes_no', 'explain' => true),
			'enable_comments'				=> array('lang' => 'ACP_ENABLE_COMMENTS',			'validate' => 'bool',	'type' => 'radio:yes_no', 'explain' => true),
			'comments_per_page'				=> array('lang' => 'ACP_COMMENTS_PER_PAGE',	'validate' => 'int:1',	'type' => 'text:3:4', 'explain' => true),

			'legend5'						=> 'ACP_SUBMIT_CHANGES',
			)
		);

		$this->new_config = $this->config;
		$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc($this->request->variable('config', array('' => ''), true)) : $this->new_config;
		$error = array();
		if (sizeof($error))
		{
			$submit = false;
		}
		validate_config_vars($display_vars['vars'], $cfg_array, $error);
		$submit = (isset($_POST['submit'])) ? true : false;
		$form_name = 'acp_video';

		foreach ($display_vars['vars'] as $config_name => $null)
		{
			if (!isset($cfg_array[$config_name]) || strpos($config_name, 'legend') !== false)
			{
				continue;
			}
			$this->new_config[$config_name] = $config_value = $cfg_array[$config_name];
			if ($submit)
			{
				if(!$this->config->set($config_name, $config_value))
				{
					$error = true;
				}
			}
		}
		foreach ($display_vars['vars'] as $config_key => $vars)
		{
			if (!is_array($vars) && strpos($config_key, 'legend') === false)
			{
				continue;
			}
			if (strpos($config_key, 'legend') !== false)
			{
				$this->template->assign_block_vars('options', array(
					'S_LEGEND'		=> true,
					'LEGEND'		=> (isset($this->user->lang[$vars])) ? $this->user->lang[$vars] : $vars)
				);

				continue;
			}
			$type = explode(':', $vars['type']);
			$l_explain = '';
			if ($vars['explain'] && isset($vars['lang_explain']))
			{
				$l_explain = (isset($this->user->lang[$vars['lang_explain']])) ? $this->user->lang[$vars['lang_explain']] : $vars['lang_explain'];
			}
			else if ($vars['explain'])
			{
				$l_explain = (isset($this->user->lang[$vars['lang'] . '_EXPLAIN'])) ? $this->user->lang[$vars['lang'] . '_EXPLAIN'] : '';
			}
			$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);
			if (empty($content))
			{
				continue;
			}
			$this->template->assign_block_vars('options', array(
				'KEY'			=> $config_key,
				'TITLE'			=> (isset($this->user->lang[$vars['lang']])) ? $this->user->lang[$vars['lang']] : $vars['lang'],
				'S_EXPLAIN'		=> $vars['explain'],
				'TITLE_EXPLAIN'	=> $l_explain,
				'CONTENT'		=> $content,
				)
			);
			unset($display_vars['vars'][$config_key]);
		}
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access protected
	*/
	protected function set_options()
	{
		$this->config->set('google_api_key', $this->request->variable('google_api_key',0));
	}

	public function display_cat()
	{
		$form_key = 'acp_video_cat';
		add_form_key($form_key);
		include ($this->phpbb_root_path . 'includes/functions_user.' . $this->phpEx);
		$form_action = $this->u_action. '&amp;action=add';
		$lang_mode		= $this->user->lang['ACP_VIDEO_CATEGORY'];
		$video_cat_id 	= $this->request->variable('video_cat_id', 0);
		$video_cat_title = $this->request->variable('video_cat_title', '', true);
		$action		= (isset($_POST['add'])) ? 'add' : ((isset($_POST['delete'])) ? 'delete' : $this->request->variable('action', ''));
		//Make SQL Array
		$sql_ary = array(
			'video_cat_id'				=> $video_cat_id,
			'video_cat_title'			=> $video_cat_title,
		);
		switch ($action)
		{
			case 'add':
			if ($video_cat_title == '')
			{
				trigger_error($user->lang['ACP_VIDEO_CAT_TITLE_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
			}
			else
			{
				$this->db->sql_query('INSERT INTO ' . $this->video_cat_table .' ' . $this->db->sql_build_array('INSERT', $sql_ary));
				trigger_error($this->user->lang['ACP_CATEGORY_CREATED'] . adm_back_link($this->u_action));
			}
			break;
			case 'edit':
				$form_action = $this->u_action. '&amp;action=update';
				$lang_mode = $this->user->lang['ACP_CATEGORY_EDIT'];
				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . '
					WHERE video_cat_id = '.(int) $this->request->variable('id', 0);
				$result = $this->db->sql_query_limit($sql,1);
				$row = $this->db->sql_fetchrow($result);
				$this->template->assign_vars(array(
					'S_EDIT_MODE'		=> true,
					'VIDEO_CAT_ID'		=> $row['video_cat_id'],
					'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
					));
			break;
			case 'update':
			if ($video_cat_title == '')
			{
				trigger_error($user->lang['ACP_VIDEO_CAT_TITLE_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
			}
			else
			{
				$this->db->sql_query('UPDATE ' . $this->video_cat_table . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . ' WHERE VIDEO_CAT_ID = ' . $video_cat_id);
				trigger_error($this->user->lang['ACP_CATEGORY_UPDATED'] . adm_back_link($this->u_action));
			}
			break;
			case 'delete':
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_cat_table . '
						WHERE video_cat_id = '.(int)$this->request->variable('id', '');
					$this->db->sql_query($sql);
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
		//
		// Start output the page
		//
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
		include ($this->phpbb_root_path . 'includes/functions_user.' . $this->phpEx);
		$form_action = $this->u_action. '&amp;action=add';
		$lang_mode		= $this->user->lang['ACP_VIDEO_TITLE'];
		$video_id 	= $this->request->variable('video_id', 0);
		$video_title = $this->request->variable('video_title', '', true);
		$video_cat_id 	= $this->request->variable('video_cat_id', 0);
		$video_cat_title = $this->request->variable('video_cat_title', '', true);
		$action		= (isset($_POST['add'])) ? 'add' : ((isset($_POST['delete'])) ? 'delete' : $this->request->variable('action', ''));
		//Make SQL Array
		$sql_ary = array(
			'video_cat_id'				=> $video_cat_id,
			'video_cat_title'			=> $video_cat_title,
		);
		switch ($action)
		{
			case 'edit':
				$form_action = $this->u_action. '&amp;action=update';
				$lang_mode = $this->user->lang['ACP_CATEGORY_EDIT'];
				$sql = 'SELECT *
					FROM ' . $this->video_cat_table . '
					WHERE video_cat_id = '.(int) $this->request->variable('id', '');
				$result = $this->db->sql_query_limit($sql,1);
				$row = $this->db->sql_fetchrow($result);
				$this->template->assign_vars(array(
					'S_EDIT_MODE'		=> true,
					'VIDEO_CAT_ID'		=> $row['video_cat_id'],
					'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
					));
			break;
			case 'update':

				$this->db->sql_query('UPDATE ' . $this->video_cat_table . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . ' WHERE VIDEO_CAT_ID = ' . $video_cat_id);
				trigger_error($this->user->lang['ACP_CATEGORY_UPDATED'] . adm_back_link($this->u_action));

			break;
			case 'delete':
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . $this->video_table . '
						WHERE video_id = '.(int)$this->request->variable('id', '');
					$this->db->sql_query($sql);
					trigger_error($this->user->lang['ACP_TITLE_DELETED'] . adm_back_link($this->u_action));
				}
				else
				{
					confirm_box(false, $this->user->lang['ACP_TITLE_DELETE'], build_hidden_fields(array(
						'video_id'		=> $video_id,
						'action'			=> 'delete',
					)));
				}
			break;
		}
		//
		// Start output the page
		//
		$sql_title_ary = array(
			'SELECT'	=> 'v.*,ct.*,
			u.username,u.user_colour,u.user_id',
			'FROM'		=> array(
				$this->video_table			=> 'v',
				$this->video_cat_table		=> 'ct',
				USERS_TABLE			=> 'u',
			),
			'WHERE'		=> 'ct.video_cat_id = v.video_cat_id
				AND u.user_id = v.user_id',
			'ORDER_BY'	=> 'v.video_id DESC',
		);

		$sql = $this->db->sql_build_query('SELECT', $sql_title_ary);
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$this->template->assign_block_vars('title', array(
				'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
				'VIDEO_CAT_ID'	=> $row['video_cat_id'],
				'VIDEO_TITLE'	=> $row['video_title'],
				'U_EDIT'			=> $this->u_action . '&amp;action=edit&amp;id=' .$row['video_cat_id'],
				'U_DEL'				=> $this->u_action . '&amp;action=delete&amp;id=' .$row['video_id'],
				'USERNAME'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
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
