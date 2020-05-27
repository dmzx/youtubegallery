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

class youtubegallery_1_0_8_sample_data extends \phpbb\db\migration\migration
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
			['custom', [[$this, 'insert_sample_data']]],
		];
	}

	public function insert_sample_data()
	{
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'video'))
		{
			$sql_ary = [
				'video_description'		=> '<r>This is an example video description: <B><s>[b]</s>YOU MUST SYNC IN ACP TO SEE YOUTUBE DESCIPTION HERE<e>[/b]</e></B>.</r>',
			];

			$sql = 'UPDATE ' . $this->table_prefix . 'video' . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary);
			$this->db->sql_query($sql);
		}
	}
}
