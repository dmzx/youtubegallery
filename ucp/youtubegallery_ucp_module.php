<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2019 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\ucp;

class youtubegallery_ucp_module
{
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container, $user;

		// Add the lang file
		$user->add_lang_ext('dmzx/youtubegallery', 'common');

		// Set template
		$this->tpl_name = 'ucp_youtubegallery';
		$this->page_title = 'VIDEO_INDEX';

		// Get an instance of the UCP controller and display the options
		$controller = $phpbb_container->get('dmzx.youtubegallery.ucp.controller');

		$controller->$mode($this->u_action);
	}
}
