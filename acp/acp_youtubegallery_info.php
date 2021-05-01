<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\acp;

class acp_youtubegallery_info
{
	function module()
	{
		return [
			'filename'	=> '\dmzx\youtubegallery\acp\acp_youtubegallery_module',
			'title'		=> 'ACP_VIDEO',
			'modes'		=> [
				'settings'	=> ['title' => 'ACP_VIDEO_SETTINGS', 'auth' => 'ext_dmzx/youtubegallery && acl_a_board', 'cat' => ['ACP_VIDEO']],
				'cat'		=> ['title' => 'ACP_VIDEO_CATEGORY', 'auth' => 'ext_dmzx/youtubegallery && acl_a_board', 'cat' => ['ACP_VIDEO']],
				'title'		=> ['title' => 'ACP_VIDEO_TITLE', 'auth' => 'ext_dmzx/youtubegallery && acl_a_board', 'cat' => ['ACP_VIDEO']],
			],
		];
	}
}
