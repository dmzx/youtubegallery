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

class youtubegallery_schema1 extends \phpbb\db\migration\migration
{
	
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'video'	=> array(
					'COLUMNS'	=> array(
					'video_id'		=> array('UINT:11', NULL, 'auto_increment'),
					'video_url'		=> array('VCHAR:255', ''),
					'video_title'	=> array('VCHAR:255', ''),
					'video_cat_id'	=> array('UINT', 0),
					'username'		=> array('VCHAR:255', ''),
					'user_id'		=> array('VCHAR:255', ''),
					'youtube_id'	=> array('VCHAR:255', ''),
					'create_time'	=> array('TIMESTAMP', 0),
					'video_views'	=> array('MTEXT_UNI', ''),
				),
				'PRIMARY_KEY'	=> 'video_id',

			)),
	    );
	}
	public function revert_schema()
	{
		return array(
			'drop_tables' => array(
				$this->table_prefix . 'video',
			),
		);
	}
	
}