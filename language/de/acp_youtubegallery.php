<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
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
	'ACP_VIDEO_EXPLAIN'								=> 'Video Gallery Extension',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Allgemeine Einstellungen',
	'ACP_VIDEO_ENABLE'								=> 'Aktiviere Videoseite',
	'ACP_VERSION_CURRENT'							=> 'Version',
	'ACP_GOOGLE_KEY'								=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Um die Videogalerie benutzen zu können, musst du einen <strong>Google Public API key</strong> erstellen. Besuche bitte die <strong><a href="https://console.cloud.google.com/">Google Cloud Platform</a></strong>, um den Key zu erstellen. Wenn du Probleme bei der Erstellung deines Keys hast, lies die Anleitung unter <strong><a href="https://support.google.com/cloud/answer/6158862">Cloud Platform Console Help: Setting up API keys</a></strong>. Bis du deinen Key erstellt hast, ist die Galerie nicht verfügbar.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Videos je Seite',
	'ACP_COMMENTS_PER_PAGE'							=> 'Kommentare je Seite',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Stelle einen Wert für Kommentare auf der Videoseite ein.<br /><em>Der Standardwert ist 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Aktiviere Kommentare für Videos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Diese Option zeigt die Kommentare auf der Videoseite an.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Aktiviere die Videogalerie',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Aktiviert die Videogalerie-Erweiterung global.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Aktiviere Videostatistik auf dem Index',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Diese Option zeigt die Videostatistik auf der Indexseite an.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Aktivere letztes Video auf dem Index',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Diese Option wird die Videos auf der Indexseite anzeigen.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Zeige das letzte Video oben auf dem Index',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Über oder unter dem Forum.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Zeige die letzten Videos an',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Stelle einen Wert für die letzten Videos auf dem Index ein. <br /><em>Der Standardwert ist 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Video Gallery-Einstellungen gespeichert',
	'ACP_VIDEO_TOP'									=> 'Oben',
	'ACP_VIDEO_BOTTOM'								=> 'Unten',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Die Kategorie wurde erfolgreich erstellt.',
	'ACP_CATEGORY_DELETE'			=> 'Bist du sicher, dass du diese Kategorie löschen möchtest?',
	'ACP_CATEGORY_DELETED'			=> 'Die Kategorie wurde erfolgreich gelöscht.',
	'ACP_CATEGORY_EDIT'				=> 'Bearbeite Kategorie',
	'ACP_CATEGORY_UPDATED'			=> 'Die Kategorie wurde erfolgreich aktualisiert!',
	'ACP_VIDEO_CAT_ADD'				=> 'Füge neue Kategorie hinzu',
	'ACP_VIDEO_CAT_TITLE'			=> 'Kategorie-Titel',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Gib einen Kategorientitel ein.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Du musst einen <strong>Titel</strong> für diese Kategorie eingeben.',
	'ACP_VIDEO_OVERVIEW'			=> 'Video-Kategorien',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Hier kannst du die Videokategorien für dein Board verwalten.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'Hier kannst du die Videotitel deines Boards verwalten.',
	'ACP_TITLE_DELETE'				=> 'Bist du sicher, dass du diesen Titel löschen möchtest?',
	'ACP_TITLE_DELETED'				=> 'Dieser Titel wurde erfolgreich gelöscht.',
));
