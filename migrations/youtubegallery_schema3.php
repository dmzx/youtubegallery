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

class youtubegallery_schema3 extends \phpbb\db\migration\migration
{

	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'video_cmnts'	=> array(
					'COLUMNS'	=> array(
					'cmnt_id'			=> array('UINT', NULL, 'auto_increment'),
					'cmnt_video_id'		=> array('UINT', 0),
					'cmnt_poster_id'	=> array('UINT', 0),
					'cmnt_text'			=> array('TEXT_UNI', ''),
					'create_time'		=> array('TIMESTAMP', 0),
					'bbcode_uid'		=> array('VCHAR:8', ''),
					'bbcode_bitfield'	=> array('VCHAR:255', ''),
					'bbcode_options'	=> array('UINT', 0),
				),
				'PRIMARY_KEY'	=> 'cmnt_id',

			)),
		);
	}
	public function revert_schema()
	{
		return array(
			'drop_tables' => array(
				$this->table_prefix . 'video_cmnts',
			),
		);
	}
}