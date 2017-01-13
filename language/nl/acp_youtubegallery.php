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
	'ACP_VIDEO_EXPLAIN'								=> 'Video Galerij Extensie',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Algemene instellingen',
	'ACP_VIDEO_ENABLE'								=> 'Schakel video pagina in',
	'ACP_VERSION_CURRENT'							=> 'Versie',
	'ACP_GOOGLE_KEY'								=> 'Google Publieke API sleutel',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Om de video galerij te gebruiken moet je een <strong>Google Public API key</strong> aanmaken. Bezoek aub <strong><a href="https://support.google.com/cloud/answer/6158862/">Het opzetten van API sleutels</a></strong> om de sleutel aan te maken. Lees deze gids als je problemen hebt om deze aan te maken <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Tot je deze sleutel aangemaakt hebt zal de video galerij niet beschikbaar zijn.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Video’s per pagina',
	'ACP_COMMENTS_PER_PAGE'							=> 'Reacties per pagina',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Stel het aantal reacties in op de video pagina.<br /><em>Standaard waarde is 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Schakel reacties in op de video pagina',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Deze optie zal reacties openen op de video pagina',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Schakel video galerij in',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Schakel de video galerij extensie globaal in.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Schakel video statistieken in op de index pagina',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Deze optie zal de video statistieken weergeven op de index pagina.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Schakel laatste video’s in op de index pagina',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Deze optie zal de laatste video’s weergeven op de index pagina.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Toon de laatste video’s bovenaan de index pagina',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Nee is de onderkant van de index pagina',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Toon de laatste video’s',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Stel de waarde in voor het aantal video’s op de index pagina.<br /><em>Standaard waarde is 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Video galerij instellingen opgeslagen',
	'ACP_VIDEO_TOP'									=> 'Bovenaan',
	'ACP_VIDEO_BOTTOM'								=> 'Onderaan',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Deze categorie werd succesvol toegevoegd.',
	'ACP_CATEGORY_DELETE'			=> 'Ben je zeker dat je deze categorie wenst te verwijderen?',
	'ACP_CATEGORY_DELETED'			=> 'Deze categorie werd succesvol verwijderd',
	'ACP_CATEGORY_EDIT'				=> 'Bewerk categorie',
	'ACP_CATEGORY_UPDATED'			=> 'Deze categorie werd succesvol geüpdate!',
	'ACP_VIDEO_CAT_ADD'				=> 'Nieuwe categorie toevoegen',
	'ACP_VIDEO_CAT_TITLE'			=> 'Categorie Titel',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Plaats de titel van de video.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Je moet een <strong>titel</strong> invullen voor deze categorie.',
	'ACP_VIDEO_OVERVIEW'			=> 'Video Categorieën',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Hier kan je de video categorieën beheren van je forum.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'Hier kan je de video titels van je forum beheren',
	'ACP_TITLE_DELETE'				=> 'Ben je zeker dat je deze titel wenst te verwijderen?',
	'ACP_TITLE_DELETED'				=> 'Deze titel werd succesvol verwijderd',
));
