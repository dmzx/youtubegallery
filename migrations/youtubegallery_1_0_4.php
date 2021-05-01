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

class youtubegallery_1_0_4 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\youtubegallery\migrations\youtubegallery_1_0_3',
		];
	}

	public function update_data()
	{
		return [
			// Update config
			['config.update', ['youtubegallery_version', '1.0.4']],
			// Add configs
			['config.add', ['videos_per_page', '10']],
			['config.add', ['enable_video_chat', false]],
			['config.add', ['enable_video_chat_comment', false]],
		];
	}
}
