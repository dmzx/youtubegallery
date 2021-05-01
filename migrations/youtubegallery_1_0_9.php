<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2021 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_0_9 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_8',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['youtubegallery_version', '1.0.9']],
		];
	}
}
