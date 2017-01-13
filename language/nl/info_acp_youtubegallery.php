<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* Nederlandse vertaling @ Solidjeuh <http://www.froddelpower.be>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
// ’ » “ ” …

$lang = array_merge($lang, array(
	'ACP_VIDEO'				=> 'Youtube Video Galerij',
	'ACP_VIDEO_SETTINGS'	=> 'Video Instellingen',
	'ACP_VIDEO_CATEGORY'	=> 'Video categorieën',
	'ACP_VIDEO_TITLE'		=> 'Video Titels',
	//Log
	'LOG_VIDEO_SETTINGS'			=> '<strong>Youtube video galerij instellingen geüpdatet</strong>',
	'LOG_VIDEO_CATEGORY_ADD'		=> '<strong>Youtube video galerij categorie toegevoegd</strong>',
	'LOG_VIDEO_CATEGORY_UPDATE'		=> '<strong>Youtube video galerij categorie geüpdate</strong>',
	'LOG_VIDEO_CATEGORY_DELETED'	=> '<strong>Youtube video galerij categorie verwijderd</strong>',
	'LOG_VIDEO_TITLE_DELETED'		=> '<strong>Youtube video galerij titel verwijderd</strong>',
));
