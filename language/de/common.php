<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
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
	'VIDEO_INDEX'				=> 'Videogalerie',
	'VIDEO_SELECT_CAT'			=> 'Wähle eine Kategorie',
	'VIDEO_SUBMIT'				=> 'Neues Video',
	'VIDEO_URL'					=> 'Video-URL eingeben',
	'VIDEOS_TIP'				=> 'Hilfe und Vorschläge',
	'VIDEOS_TIPS_PART_01'		=> 'Navigiere zu <a href="https://www.youtube.com/">Youtube.com</a>, und suche deine Lieblingsvideos.',
	'VIDEOS_TIPS_PART_02'		=> 'Kopiere die Video-URL, füge sie in das Feld unten ein, wähle die Kategorie aus und bestätige das Formular.',
	'VIDEOS_TIPS_PART_03'		=> 'Du kannst <strong>youtube.com</strong> und <strong>youtu.be</strong> benutzen, beide werden von der Erweiterung akzeptiert.',
	'VIDEOS_TIPS_PART_04'		=> 'Warnung',
	'VIDEOS_TIPS_PART_05'		=> 'diese Seite dient nicht zum Hochladen von Videos nach Youtube!',
	'VIDEO_UNAUTHED'			=> 'Du hast keine ausreichenden Berechtigungen, um dieses Video anzusehen.',
	'INVALID_VIDEO'				=> 'Das von dir gewählte Video existiert nicht.',
	'VIDEO'						=> 'Videos',
	'VIDEO_EXPLAIN'				=> 'Betrachte die Galerie der Youtube-Videos',
	'VIEW_CAT'					=> 'Betrachte Kategorie',
	'VIEW_VIDEO'				=> 'Betrachte Video',
	'VIDEO_CAT'					=> 'Kategorie',
	'VIDEO_CATS'				=> 'Kategorien',
	'VIDEO_CREATED'				=> 'Das Video wurde erfolgreich hinzugefügt.',
	'VIDEO_DATE'				=> 'Datum',
	'VIDEO_DELETE'				=> 'Video löschen',
	'VIDEO_DELETED'				=> 'Das Video wurde erfolgreich gelöscht.',
	'VIDEO_LAST'				=> 'Letztes',
	'VIDEO_VERSION'				=> 'Version',
	'PAGE_RETURN'				=> '%sZurück zur Videoseite%s',
	'COMMENTS'					=> 'Kommentare',
	'POST_COMMENT'				=> 'Verfasse einen Kommentar',
	'COMMENT_CREATED'			=> 'Dein Kommentar wurde erfolgreich hinzugefügt.',
	'VIDEO_CMNT_SUBMIT'			=> 'Verfasse einen neuen Kommentar',
	'NO_VIDEOS_COMMENTS'		=> 'Dieses Video hat keine Kommentare.',
	'VIDEO_COMMENT'				=> 'Kommentar',
	'VIDEO_COMMENTS'			=> 'Kommentare',
	'COMMENT_DELETED_SUCCESS'	=> 'Der Kommentar wurde erfolgreich gelöscht.',
	'DELETE_COMMENT_CONFIRM'	=> 'Bist du sicher, dass du diesen Kommentar löschen möchtest?',
	'DELETE_COMMENT_NOT'		=> 'Kommentar <strong>nicht</strong> gelöscht.',
	'DELETE_VIDEO'				=> 'Bist du sicher, dass du dieses Video löschen möchtest?',
	'MY_VIDEOS'					=> 'Betrachte deine Videos',
	'NEED_VIDEO_URL'			=> 'Du musst eine <strong>URL</strong> für dieses Video eingeben.',
	'NEWEST_VIDEOS'				=> 'Neueste Videos',
	'NO_VIDEOS'					=> 'Auf dieser Seite gibt es keine Videos.',
	'NO_CAT_VIDEOS'				=> 'In dieser Kategorie gibt es keine Videos, oder sie existiert nicht.',
	'NO_USER_VIDEOS'			=> 'Dieser Benutzer hat keine Videos, oder er existiert nicht.',
	'NO_CATEGORIES'				=> 'Auf dieser Seite gibt es keine Kategorien.',
	'NO_TITLE'					=> 'Auf dieser Seite gibt es keine Titel.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Zurück zur Videogalerie',
	'SEARCH_VIDEOS'				=> 'Suche Videos',
	'TOTAL_VIDEOS'				=> 'Videos gesamt',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'Keine Kategorien',
		1 => 'Gesamt <strong>%1$d</strong> Kategorie',
		2 => 'Gesamt <strong>%1$d</strong> Kategorien',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'Keine Videos',
		1 => 'Gesamt <strong>%1$d</strong> Video',
		2 => 'Gesamt <strong>%1$d</strong> Videos',
	),

	'TOTAL_VIEWS'		=> array(
		0 => 'Nicht angesehen',
		1 => 'Gesamt <strong>%1$d</strong> Mal angesehen',
		2 => 'Gesamt <strong>%1$d</strong> Mal angesehen',
	),

	'TOTAL_COMMENTS'	=> array(
		0 => 'Keine Kommentare',
		1 => 'Gesamt <strong>%1$d</strong> Kommentar',
		2 => 'Gesamt <strong>%1$d</strong> Kommentare',
	),
	'USER_VIDEOS'				=> 'Alle Videos des Benutzers',
	'USER_VIDEOS_EXPLAIN'		=> 'Zeige alle an',
	'NO_KEY_ADMIN'				=> 'Lieber Board-Administrator, um die Videogalerie zu benutzen, musst du einen <strong>Google Public API Key</strong> erstellen. Gehe zum Administrationsbereich und folge den Anweisungen.',
	'NO_KEY_USER'				=> 'Lieber Benutzer, unsere Videogalerie ist derzeit nicht verfügbar. Bitte versuche es später noch einmal.',
	'COMMENTS_DISABLED'			=> 'Kommentare sind derzeit deaktiviert.',
	'DELETE_COMMENT'			=> 'Kommentar löschen',

	// View Video
	'FLASH_IS_OFF'				=> '[flash] ist <em>AUS</em>',
	'FLASH_IS_ON'				=> '[flash] ist <em>AN</em>',
	'VIDEO_ADD_BY'				=> 'Hinzugefügt von',
	'VIDEO_BBCODE'				=> 'BBcode',
	'VIDEO_EMBED'				=> 'Video einbetten',
	'VIDEO_LINK'				=> 'Video-Link',
	'VIDEO_LINKS'				=> 'Links',
	'VIDEO_LINK_YOUTUBE'		=> 'Youtube Video Link',
	'VIDEO_VIEWS'				=> 'Betrachtungen',

	// Youtube video text
	'VIDEO_AUTHOR'				=> 'Autor',
	'VIDEO_WATCH'				=> 'Auf YouTube ansehen',

	//Pagination
	'LIST_COMMENT'		=>	array(
		1 => '%s Kommentar',
		2 => '%s Kommentare',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s Video',
		2 => '%s Videos',
	),
));
