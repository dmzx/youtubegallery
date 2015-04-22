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
	protected $video_table;

	protected $video_cat_table;

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

			// Add option settings change action to the admin log
			$this->phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'ACP_VIDEO_SETTINGS');

		}

		// Set the options the user configured
				$display_vars = array(
						'vars'	=> array(
						'legend1'				=> 'ACP_VIDEO_GENERAL_SETTINGS',
						'video_width'				=> array('lang' => 'ACP_VIDEO_WIDTH',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $this->user->lang['PIXEL']),
						'video_height'				=> array('lang' => 'ACP_VIDEO_HEIGHT',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $this->user->lang['PIXEL']),

						'legend5'					=> 'ACP_SUBMIT_CHANGES',
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
					if(!set_config($config_name, $config_value))
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
