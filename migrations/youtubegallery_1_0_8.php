<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2020 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_0_8 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_7',
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['youtubegallery_version', '1.0.8']],
		];
	}

	public function update_schema()
	{
		return [
			'add_columns'	=> [
				$this->table_prefix . 'video'		=> [
					'video_description'	=> ['MTEXT_UNI', ''],
				],
			],
			'change_columns'	=> [
				$this->table_prefix . 'video'	=> [
					'video_views'		=> ['VCHAR:40', ''],
				],
			],
		];
	}
}
