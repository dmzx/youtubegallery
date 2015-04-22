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

class youtubegallery_sample extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'insert_sample_data'))),
		);
	}
	public function insert_sample_data()
	{
		global $user;

		// Define sample rule data
		$sample_data = array(
			array(
				'video_cat_id'		=> 1,
				'video_cat_title'	=> 'Uncategorized',
				),

		);

		// Insert sample PM data
		$this->db->sql_multi_insert($this->table_prefix . 'video_cat', $sample_data);
	}
}