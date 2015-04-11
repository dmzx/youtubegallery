<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\acp;

class acp_youtubegallery_module
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $cache;
		global $phpbb_root_path, $phpbb_admin_path, $phpEx, $table_prefix;

	//	$user->add_lang('mods/info_acp_video');
		$this->table_prefix = $table_prefix;
		switch ($mode)
		{
			default:
			case 'settings':
				$display_vars = array(
					'title'	=> 'ACP_VIDEO',
					'vars'	=> array(
						'legend1'				=> 'ACP_VIDEO_GENERAL_SETTINGS',
						'video_width'				=> array('lang' => 'ACP_VIDEO_WIDTH',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $user->lang['PIXEL']),
						'video_height'				=> array('lang' => 'ACP_VIDEO_HEIGHT',	'validate' => 'string',	'type' => 'text:4:4', 'explain' => true, 'append' => ' ' . $user->lang['PIXEL']),

						'legend5'					=> 'ACP_SUBMIT_CHANGES',
					)
				);
			$this->page_title = 'ACP_VIDEO';
			$this->tpl_name = 'acp_video';
			$this->new_config = $config;
			$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc(request_var('config', array('' => ''), true)) : $this->new_config;
			$error = array();
			if (sizeof($error))
			{
				$submit = false;
			}
			validate_config_vars($display_vars['vars'], $cfg_array, $error);
			$submit = (isset($_POST['submit'])) ? true : false;
			$form_name = 'acp_video';
			add_form_key('acp_video');
			if ($submit && !check_form_key('acp_video'))
			{
				$update = false;
				$errors[] = $user->lang['FORM_INVALID'];
			}
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
					$template->assign_block_vars('options', array(
						'S_LEGEND'		=> true,
						'LEGEND'		=> (isset($user->lang[$vars])) ? $user->lang[$vars] : $vars)
					);

					continue;
				}
				$type = explode(':', $vars['type']);
				$l_explain = '';
				if ($vars['explain'] && isset($vars['lang_explain']))
				{
					$l_explain = (isset($user->lang[$vars['lang_explain']])) ? $user->lang[$vars['lang_explain']] : $vars['lang_explain'];
				}
				else if ($vars['explain'])
				{
					$l_explain = (isset($user->lang[$vars['lang'] . '_EXPLAIN'])) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '';
				}
				$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);
				if (empty($content))
				{
					continue;
				}
				$template->assign_block_vars('options', array(
					'KEY'			=> $config_key,
					'TITLE'			=> (isset($user->lang[$vars['lang']])) ? $user->lang[$vars['lang']] : $vars['lang'],
					'S_EXPLAIN'		=> $vars['explain'],
					'TITLE_EXPLAIN'	=> $l_explain,
					'CONTENT'		=> $content,
					)
				);
				unset($display_vars['vars'][$config_key]);
			}
		break;

			case 'cat':
				$user->add_lang(array('posting'));
				$this->tpl_name = 'acp_video_cat';
				$this->page_title = 'ACP_VIDEO_CATEGORY';

				$form_key = 'acp_video_cat';
				add_form_key($form_key);

				include ($phpbb_root_path . 'includes/functions_user.' . $phpEx);

				$form_action = $this->u_action. '&amp;action=add';
			//	$user->add_lang('mods/info_acp_video');
				$lang_mode		= $user->lang['ACP_VIDEO_CATEGORY'];
				$video_cat_id 	= request_var('video_cat_id', 0);
				$video_cat_title = request_var('video_cat_title', '', true);
				$action		= (isset($_POST['add'])) ? 'add' : ((isset($_POST['delete'])) ? 'delete' : request_var('action', ''));

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
						$db->sql_query('INSERT INTO ' . $this->table_prefix . \dmzx\youtubegallery\core\render_helper::VIDEO_CAT_TABLE .' ' . $db->sql_build_array('INSERT', $sql_ary));
						trigger_error($user->lang['ACP_CATEGORY_CREATED'] . adm_back_link($this->u_action));
					}
					break;

					case 'edit':
						$form_action = $this->u_action. '&amp;action=update';
						$lang_mode = $user->lang['ACP_CATEGORY_EDIT'];
						$sql = 'SELECT *
							FROM ' . $this->table_prefix . \dmzx\youtubegallery\core\render_helper::VIDEO_CAT_TABLE . '
							WHERE video_cat_id = '.(int) request_var('id', '');
						$result = $db->sql_query_limit($sql,1);
						$row = $db->sql_fetchrow($result);

						$template->assign_vars(array(
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
						$db->sql_query('UPDATE ' . $this->table_prefix . \dmzx\youtubegallery\core\render_helper::VIDEO_CAT_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . ' WHERE VIDEO_CAT_ID = ' . $video_cat_id);
						trigger_error($user->lang['ACP_CATEGORY_UPDATED'] . adm_back_link($this->u_action));
					}
					break;

					case 'delete':
						if (confirm_box(true))
						{
							$sql = 'DELETE FROM ' . $this->table_prefix . \dmzx\youtubegallery\core\render_helper::VIDEO_CAT_TABLE . '
								WHERE video_cat_id = '.(int)request_var('id', '');
							$db->sql_query($sql);
							trigger_error($user->lang['ACP_CATEGORY_DELETED'] . adm_back_link($this->u_action));
						}
						else
						{
							confirm_box(false, $user->lang['ACP_CATEGORY_DELETE'], build_hidden_fields(array(
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
					FROM ' . $this->table_prefix . \dmzx\youtubegallery\core\render_helper::VIDEO_CAT_TABLE . '
					ORDER by video_cat_id';
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$template->assign_block_vars('category', array(
						'VIDEO_CAT_TITLE'	=> $row['video_cat_title'],
						'U_EDIT'			=> $this->u_action . '&amp;action=edit&amp;id=' .$row['video_cat_id'],
						'U_DEL'				=> $this->u_action . '&amp;action=delete&amp;id=' .$row['video_cat_id'],

					));
				}
				$db->sql_freeresult($result);

				$template->assign_vars(array(
					'U_ACTION'		=> $form_action,
					'L_MODE_TITLE'	=> $lang_mode,
					));
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}
	}
}