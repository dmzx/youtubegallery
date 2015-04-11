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

class youtubegallery_module extends \phpbb\db\migration\migration
{
	
	public function update_data()
	{
		return array(
		    array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_VIDEO')),
			array('module.add', array(
			'acp', 'ACP_VIDEO', array(
			'module_basename'	=> '\dmzx\youtubegallery\acp\acp_youtubegallery_module', 'modes'	  => array('cat', 'settings'),
		       ),
			)),
		);
	}
}