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
		return array(
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_5',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('youtubegallery_version', '1.0.6')),

			//UCP module
			array('module.add', array(
				'ucp',
				0,
				'VIDEO_INDEX'
			)),
			array('module.add', array(
				'ucp',
				'VIDEO_INDEX',
				array(
					'module_basename'	=> '\dmzx\youtubegallery\ucp\youtubegallery_ucp_module',
					'auth'				=> 'ext_dmzx/youtubegallery',
					'modes'				=> array('main'),
				),
			)),
		);
	}
}
