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

class youtubegallery_ucp_info
{
	function module()
	{
		global $config;

		return [
			'filename'		=> 'dmzx\youtubegallery\ucp\youtubegallery_ucp_module',
			'title'			=> 'VIDEO_INDEX',
			'version'		=> $config['youtubegallery_version'],
			'modes'			=> [
				'main'	=> [
					'title'	=> 'VIDEO_INDEX',
					'auth'	=> 'ext_dmzx/youtubegallery',
					'cat'	=> ['UCP_MAIN']
				],
			],
		];
	}
}
