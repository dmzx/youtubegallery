<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_0_3 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\youtubegallery\migrations\youtubegallery_install',
		);
	}

	public function update_data()
	{
		return array(
			// Update config
			array('config.update', array('youtubegallery_version', '1.0.3')),
			// Add config
			array('config.add', array('enable_video_global', true)),
			// Remove config
			array('config.remove', array('video_width')),
			array('config.remove', array('video_height')),
		);
	}
}
