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

class youtubegallery_schema extends \phpbb\db\migration\migration
{
	
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'video_cat'	=> array(
				'COLUMNS' => array(
					'video_cat_id'		=> array('UINT:11', NULL, 'auto_increment'),
					'video_cat_title'	=> array('VCHAR:255', ''),
				),
				'PRIMARY_KEY'	=> 'video_cat_id',
				)),	
		
	    );
	}
	public function revert_schema()
	{
		return array(
			'drop_tables' => array(
				$this->table_prefix . 'video_cat',
			),
		);
	}
	
}