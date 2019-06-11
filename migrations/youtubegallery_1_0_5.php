<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\migrations;

class youtubegallery_1_0_5 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array(
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_4',
		);
	}

	public function update_data()
	{
		return array(
			array('config.update', array('youtubegallery_version', '1.0.5')),
			array('config.add', array('enable_video_youtube_stats', true)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'video'		=> array(
					'video_duration'	=> array('VCHAR:255', ''),
				),
			),
		);
	}
}
