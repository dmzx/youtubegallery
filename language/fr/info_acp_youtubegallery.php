<?php
/**
*
* Youtube Videos Gallery extension for the phpBB Forum Software package.
* French translation by Philippe (http://www.forum-newbeetle.fr) & Galixte (http://www.galixte.com)
*
* @copyright (c) 2015 dmzx <http://www.dmzx-web.net> & _Vinny_ <http://www.suportephpbb.com.br>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
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
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_VIDEO'				=> 'Galerie vidéo Youtube',
	'ACP_VIDEO_SETTINGS'	=> 'Paramètres des vidéos',
	'ACP_VIDEO_CATEGORY'	=> 'Catégories des vidéos',
	'ACP_VIDEO_TITLE'		=> 'Titres des vidéos',
	//Log
	'LOG_VIDEO_SETTINGS'			=> '<strong>Paramètres de la galerie vidéo Youtube mis à jour</strong>',
	'LOG_VIDEO_CATEGORY_ADD'		=> '<strong>Catégorie ajoutée dans la galerie vidéo Youtube</strong>',
	'LOG_VIDEO_CATEGORY_UPDATE'		=> '<strong>Catégorie mise à jour dans la galerie vidéo Youtube</strong>',
	'LOG_VIDEO_CATEGORY_DELETED'	=> '<strong>Catégorie supprimée dans la galerie vidéo Youtube</strong>',
	'LOG_VIDEO_TITLE_DELETED'		=> '<strong>Titre supprimé dans la galerie vidéo Youtube</strong>',
));
