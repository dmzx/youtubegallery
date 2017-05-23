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
	public	$u_action;

	function main($id, $mode)
	{
		global $phpbb_container, $user;

		// Add the ACP lang file
		$user->add_lang_ext('dmzx/youtubegallery', 'acp_youtubegallery');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('dmzx.youtubegallery.admin.controller');

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		switch ($mode)
		{
			case 'settings':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_video';
				// Set the page title for our ACP page
				$this->page_title = $user->lang['ACP_VIDEO'];
				// Load the display settings handle in the admin controller
				$admin_controller->display_settings();
		 	break;

			case 'cat':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_video_cat';
				// Set the page title for our ACP page
				$this->page_title = $user->lang['ACP_VIDEO_CATEGORY'];
				// Load the display cat handle in the admin controller
				$admin_controller->display_cat();
			break;

			case 'title':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_video_title';
				// Set the page title for our ACP page
				$this->page_title = $user->lang['ACP_VIDEO_TITLE'];
				// Load the display titles handle in the admin controller
				$admin_controller->display_title();
			break;
		}
	}
}
