<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2025 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_1_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_9',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['youtubegallery_version', '1.1.0']],
		];
	}

	public function update_schema()
	{
		return [
			'add_columns'	=> [
				$this->table_prefix . 'video'		=> [
					'video_short_description'	=> ['MTEXT_UNI', ''],
				],
			],
		];
	}
}
