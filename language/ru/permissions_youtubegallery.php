<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
* @Translation Anvar - http://bb3.mobi
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
	'ACL_U_VIDEO_VIEW_FULL'			=> 'Может просматривать видео галерею',
	'ACL_U_VIDEO_VIEW'				=> 'Может просматривать видеоролики',
	'ACL_U_VIDEO_DELETE'			=> 'Может удалять свои видео',
	'ACL_U_VIDEO_POST'				=> 'Может добавлять видеоролики',
	'ACL_U_VIDEO_COMMENT'			=> 'Может комментировать видео',
	'ACL_U_VIDEO_COMMENT_DELETE'	=> 'Может удалять свои комментарии',
));
