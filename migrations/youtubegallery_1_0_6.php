<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2019 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_0_6 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_5',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['youtubegallery_version', '1.0.6']],

			//UCP module
			['module.add', [
				'ucp',
				0,
				'VIDEO_INDEX'
			]],
			['module.add', [
				'ucp',
				'VIDEO_INDEX',
				[
					'module_basename'	=> '\dmzx\youtubegallery\ucp\youtubegallery_ucp_module',
					'auth'				=> 'ext_dmzx/youtubegallery',
					'modes'				=> ['main'],
				],
			]],
		];
	}
}
