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

class youtubegallery_install extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('youtubegallery_version', '1.0.2')),
			array('config.add', array('enable_video', true)),
			array('config.add', array('enable_video_share', true)),
			array('config.add', array('video_width', '640')),
			array('config.add', array('video_height', '390')),
			array('config.add', array('google_api_key', '')),
			array('config.add', array('enable_comments', true)),
			array('config.add', array('comments_per_page', '10')),
			array('config.add', array('enable_video_comments', true)),
			array('config.add', array('enable_video_statics_on_index', true)),
			array('config.add', array('enable_video_on_index', false)),
			array('config.add', array('enable_video_on_index_location', true)),
			array('config.add', array('video_on_index_value', '6')),

			// Add permissions
			array('permission.add', array('u_video_view_full')),
			array('permission.add', array('u_video_view')),
			array('permission.add', array('u_video_delete')),
			array('permission.add', array('u_video_post')),
			array('permission.add', array('u_video_comment')),
			array('permission.add', array('u_video_comment_delete')),

			// Set permissions
			array('permission.permission_set', array('REGISTERED', 'u_video_view_full', 'group')),
			array('permission.permission_set', array('REGISTERED', 'u_video_view', 'group')),
			array('permission.permission_set', array('REGISTERED', 'u_video_post', 'group')),
			array('permission.permission_set', array('REGISTERED', 'u_video_comment', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_view_full', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_view', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_delete', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_post', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_comment', 'group')),
			array('permission.permission_set', array('ADMINISTRATORS', 'u_video_comment_delete', 'group')),

			// Add ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_VIDEO'
			)),

			array('module.add', array(
				'acp',
				'ACP_VIDEO',
				array(
					'module_basename'	=> '\dmzx\youtubegallery\acp\acp_youtubegallery_module',
					'modes' => array(
						'cat',
						'settings',
						'title'
					),
				),
			)),
			// Insert sample data
			array('custom', array(
				array(&$this, 'insert_sample_data')
			)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'video_cat'	=> array(
					'COLUMNS' => array(
						'video_cat_id'		=> array('UINT:11', null, 'auto_increment'),
						'video_cat_title'	=> array('VCHAR:255', ''),
					),
					'PRIMARY_KEY'	=> 'video_cat_id',
				),

				$this->table_prefix . 'video'	=> array(
					'COLUMNS'	=> array(
						'video_id'		=> array('UINT:11', null, 'auto_increment'),
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
				),

				$this->table_prefix . 'video_cmnts'	=> array(
					'COLUMNS'	=> array(
						'cmnt_id'			=> array('UINT', null, 'auto_increment'),
						'cmnt_video_id'		=> array('UINT', 0),
						'cmnt_poster_id'	=> array('UINT', 0),
						'cmnt_text'			=> array('TEXT_UNI', ''),
						'create_time'		=> array('TIMESTAMP', 0),
						'bbcode_uid'		=> array('VCHAR:8', ''),
						'bbcode_bitfield'	=> array('VCHAR:255', ''),
						'bbcode_options'	=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'cmnt_id',
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables' => array(
				$this->table_prefix . 'video_cat',
				$this->table_prefix . 'video',
				$this->table_prefix . 'video_cmnts',
			),
		);
	}

	public function insert_sample_data()
	{
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'video_cat'))
		{
			$sql_ary = array(
				array(
					'video_cat_id'		=> 1,
					'video_cat_title'	=> 'Uncategorized',
				),
			);
			// Insert sample data
			$this->db->sql_multi_insert($this->table_prefix . 'video_cat', $sql_ary);
		}
	}
}
