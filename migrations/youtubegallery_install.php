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

class youtubegallery_install extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v310\dev'];
	}

	public function update_data()
	{
		return [
			// Add configs
			['config.add', ['youtubegallery_version', '1.0.2']],
			['config.add', ['enable_video', true]],
			['config.add', ['enable_video_share', true]],
			['config.add', ['video_width', '640']],
			['config.add', ['video_height', '390']],
			['config.add', ['google_api_key', '']],
			['config.add', ['enable_comments', true]],
			['config.add', ['comments_per_page', '10']],
			['config.add', ['enable_video_comments', true]],
			['config.add', ['enable_video_statics_on_index', true]],
			['config.add', ['enable_video_on_index', false]],
			['config.add', ['enable_video_on_index_location', true]],
			['config.add', ['video_on_index_value', '6']],

			// Add permissions
			['permission.add', ['u_video_view_full']],
			['permission.add', ['u_video_view']],
			['permission.add', ['u_video_delete']],
			['permission.add', ['u_video_post']],
			['permission.add', ['u_video_comment']],
			['permission.add', ['u_video_comment_delete']],

			// Set permissions
			['permission.permission_set', ['REGISTERED', 'u_video_view_full', 'group']],
			['permission.permission_set', ['REGISTERED', 'u_video_view', 'group']],
			['permission.permission_set', ['REGISTERED', 'u_video_post', 'group']],
			['permission.permission_set', ['REGISTERED', 'u_video_comment', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_view_full', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_view', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_delete', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_post', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_comment', 'group']],
			['permission.permission_set', ['ADMINISTRATORS', 'u_video_comment_delete', 'group']],

			// Add ACP module
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_VIDEO'
			]],

			['module.add', [
				'acp',
				'ACP_VIDEO',
				[
					'module_basename'	=> '\dmzx\youtubegallery\acp\acp_youtubegallery_module',
					'modes' => [
						'cat',
						'settings',
						'title'
					],
				],
			]],
			// Insert sample data
			['custom', [
				[&$this, 'insert_sample_data']
			]],
		];
	}

	public function update_schema()
	{
		return [
			'add_tables'	=> [
				$this->table_prefix . 'video_cat'	=> [
					'COLUMNS' => [
						'video_cat_id'		=> ['UINT:11', null, 'auto_increment'],
						'video_cat_title'	=> ['VCHAR:255', ''],
					],
					'PRIMARY_KEY'	=> 'video_cat_id',
				],

				$this->table_prefix . 'video'	=> [
					'COLUMNS'	=> [
						'video_id'		=> ['UINT:11', null, 'auto_increment'],
						'video_url'		=> ['VCHAR:255', ''],
						'video_title'	=> ['VCHAR:255', ''],
						'video_cat_id'	=> ['UINT', 0],
						'username'		=> ['VCHAR:255', ''],
						'user_id'		=> ['VCHAR:255', ''],
						'youtube_id'	=> ['VCHAR:255', ''],
						'create_time'	=> ['TIMESTAMP', 0],
						'video_views'	=> ['MTEXT_UNI', ''],
					],
					'PRIMARY_KEY'	=> 'video_id',
				],

				$this->table_prefix . 'video_cmnts'	=> [
					'COLUMNS'	=> [
						'cmnt_id'			=> ['UINT', null, 'auto_increment'],
						'cmnt_video_id'		=> ['UINT', 0],
						'cmnt_poster_id'	=> ['UINT', 0],
						'cmnt_text'			=> ['TEXT_UNI', ''],
						'create_time'		=> ['TIMESTAMP', 0],
						'bbcode_uid'		=> ['VCHAR:8', ''],
						'bbcode_bitfield'	=> ['VCHAR:255', ''],
						'bbcode_options'	=> ['UINT', 0],
					],
					'PRIMARY_KEY'	=> 'cmnt_id',
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_tables' => [
				$this->table_prefix . 'video_cat',
				$this->table_prefix . 'video',
				$this->table_prefix . 'video_cmnts',
			],
		];
	}

	public function insert_sample_data()
	{
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'video_cat'))
		{
			$sql_ary = [
				[
					'video_cat_id'		=> 1,
					'video_cat_title'	=> 'Uncategorized',
				],
			];
			// Insert sample data
			$this->db->sql_multi_insert($this->table_prefix . 'video_cat', $sql_ary);
		}
	}
}
