<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
* German translation by franki (http://dieahnen.de/ahnenforum/)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'VIDEO_INDEX'			=> 'Video-Galerie',
	'VIDEO_SELECT_CAT'		=> 'Wähle eine Kategorie aus',
	'VIDEO_SUBMIT'			=> 'Neues Video',
	'VIDEO_URL'				=> 'Gib eine Video-URL ein',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Hilfe und Vorschläge',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Navigiere zu <a href="https://www.youtube.com/">Youtube.com</a> und suche Deine Lieblingsvideos.</li>
		<li>Kopiere die URL des Videos, füge diese in das obere Feld ein, wähle die Kategorie aus und sende das Formular.</li>
		<li>Du kannst <strong>youtube.com</strong> und <strong>youtu.be</strong> auswählen, es werden beide von der Erweiterung akzeptiert.</li>
	</ul>
	<br />
	<strong>Warnung: Diese Seite ist nicht für das Hochladen von Videos auf Youtube!</strong>',
	'UNAUTHED'				=> 'Du bist nicht berechtigt diese Seite zu sehen.',
	'VIDEO_UNAUTHED'		=> 'Du bist nicht berechtigt dieses Video anzusehen.',
	'INVALID_VIDEO'			=> 'Das ausgewählte Video ist nicht vorhanden.',
	'VIDEO'					=> 'Videos',
	'VIDEO_EXPLAIN'			=> 'Galerie anzeigen von Youtube-Videos',
	'VIEW_CAT'				=> 'Kategorie anzeigen',
	'VIEW_VIDEO'			=> 'Video anschauen',
	'VIDEO_CAT'				=> 'Kategorie',
	'VIDEO_CATS'			=> 'Kategorien',
	'VIDEO_CATEGORIES'		=> 'Kategorien',
	'VIDEO_CREATED'			=> 'Dieses Video wurde erfolgreich hinzugefügt.',
	'VIDEO_DATE'			=> 'Datum',
	'VIDEO_DELETE'			=> 'Video Löschen',
	'VIDEO_DELETED'			=> 'Dieses Video wurde erfolgreich gelöscht.',
	'PAGE_RETURN'			=> '%sZurück zur Video-Seite%s',
	'DELETE_VIDEO'			=> 'Bist du sicher, dass Du dieses Video löschen möchtest?',
	'MY_VIDEOS'				=> 'Deine Videos anzeigen',
	'NEED_VIDEO_URL'		=> 'Du musst eine <strong>url</strong> für dieses Video angeben.',
	'NEWEST_VIDEOS'			=> 'Neueste Videos',
	'NO_VIDEOS'				=> 'Diese Seite hat keine Videos.',
	'NO_CATEGORIES'			=> 'Diese Seite hat keine Kategorien.',
	'RETURN_TO_VIDEO_INDEX' => 'Zurück zur Video-Galerie',
	'SEARCH_VIDEOS'			=> 'Videos suchen',
	'TOTAL_CATEGORIES_OTHER'=> 'Anzahl der Kategorien <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Anzahl der Kategorien <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Anzahl der Videos',
	'TOTAL_VIDEOS_OTHER'	=> 'Anzahl der Videos <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Anzahl der Videos <strong>0</strong>',
	'USER_VIDEOS'			=> 'Benutzer-Videos suchen',
	'NO_KEY_ADMIN'			=> 'Sehr geehrter Administrator, um die Video-Galerie verwenden zu können, musst Du dir einen <strong>Google Public API-Schlüssel</strong> einrichten, gehe zum Administrations-Bereich und folge den Anweisungen.',
	'NO_KEY_USER'			=> 'Sehr geehrter Nutzer, die Galerie ist momentan nicht verfügbar. Bitte komme später wieder.',
	'ACP_GOOGLE_KEY'		=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'	=> 'Um die Video-Galerie zu verwenden, musst Du einen <strong>Google Public API-Schlüssel</strong> erstellen. Bitte besuche <a href="https://console.developers.google.com/">Google Developers Console</a> um den Schlüssel zu generieren. Wenn Du Probleme hast den Schlüssel zu erzeugen, lese die Anleitung <a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a>. So lange Du deinen Schlüssel einrichtest, wird die Galerie nicht verfügbar sein.',

	// ACP
	'ACP_VIDEO'						=> 'Video-Galerie',
	'ACP_VIDEO_EXPLAIN'				=> '',
	'ACP_VIDEO_SETTINGS'			=> 'Video Einstellungen',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Allgemeine Einstellungen',
	'ACP_VIDEO_ENABLE'				=> 'Videos-Seite aktivieren',
	'ACP_VIDEO_CATEGORY'			=> 'Video-Kategorien',
	'ACP_VIDEO_HEIGHT'				=> 'Video Höhe',
	'ACP_VIDEO_WIDTH'				=> 'Video Breite',
	'ACP_VERSION_CURRENT'			=> 'Version',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Diese Kategorie wurde erfolgreich hinzugefügt.',
	'ACP_CATEGORY_DELETE'			=> 'Bist Du sicher, dass Du diese Kategorie löschen willst?',
	'ACP_CATEGORY_DELETED'			=> 'Diese Kategorie wurde erfolgreich gelöscht',
	'ACP_CATEGORY_EDIT'				=> 'Kategorie bearbeiten',
	'ACP_CATEGORY_UPDATED'			=> 'Diese Kategorie wurde erfolgreich aktualisiert!',
	'ACP_VIDEO_CAT_ADD'				=> 'Neue Kategorie hinzufügen',
	'ACP_VIDEO_CAT_TITLE'			=> 'Kategorie Titel',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Gib den Titel der Kategorie an.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Du musst einen <strong>Titel</strong> für diese Kategorie angeben.',
	'ACP_VIDEO_OVERVIEW'			=> 'Video Kategorien',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Hier kannst Du die Video Kategorien des Boards verwalten.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Unkategorisiert',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Kann die Video-Galerie sehen',
	'ACL_U_VIDEO_VIEW'		=> 'Kann Videos ansehen',
	'ACL_U_VIDEO_DELETE'	=> 'Kann Videos löschen',
	'ACL_U_VIDEO_POST'		=> 'Kann Videos hinzufügen',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] ist <em>AUS</em>',
	'FLASH_IS_ON'			=> '[flash] ist <em>AN</em>',
	'VIDEO_ADD_BY'			=> 'Hinzugefügt von',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Video Einbetten',
	'VIDEO_LINK'			=> 'Video Link',
	'VIDEO_LINKS'			=> 'Links',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube Video Link',
	'VIDEO_VIEWS'			=> 'Ansichten',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Author',
	'VIDEO_WATCH'			=> 'Auf Youtube ansehen',

	//Pagination
	'LIST_VIDEO'			=> '1 Video',
	'LIST_VIDEOS'			=> '%1$s Videos',
));
