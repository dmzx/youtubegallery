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

class acp_youtubegallery_info
 {
	function module()
	{
		 return array(
			'filename'	=> '\dmzx\youtubegallery\acp\acp_youtubegallery_module',
			'title'		=> 'ACP_NEWS_TITLE',
			'modes'		=> array(
				'settings'			=> array('title' => 'ACP_VIDEO_SETTINGS',				'auth' => 'acl_a_board',	'cat' => array('ACP_VIDEO')),
				'cat'				=> array('title' => 'ACP_VIDEO_CATEGORY',				'auth' => 'acl_a_board',	'cat' => array('ACP_VIDEO')),
			),
		);
	}
}