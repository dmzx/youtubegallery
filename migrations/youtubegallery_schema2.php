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

class youtubegallery_schema2 extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('enable_video', true)),
			array('config.add', array('enable_video_share', true)),
			array('config.add', array('video_width', '640')),
			array('config.add', array('video_height', '390')),
			array('config.add', array('google_api_key', '')),
			array('config.add', array('enable_comments', true)),
			array('config.add', array('comments_per_page', '10')),
			array('config.add', array('enable_video_comments', true)),
			array('config.add', array('enable_video_statics_on_index', true)),

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
		);
	}
}