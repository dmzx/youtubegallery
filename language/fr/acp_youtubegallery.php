<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
* French translation - Philippe B.
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
	'ACP_VIDEO_EXPLAIN'								=> 'Extension Galerie Vidéo',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Paramètres Généraux',
	'ACP_VIDEO_ENABLE'								=> 'Activer la page des vidéos',
	'ACP_VERSION_CURRENT'							=> 'Version',
	'ACP_GOOGLE_KEY'								=> 'Clé API Google Publique',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Afin d’utiliser la galerie vidéo, vous devez créer une <strong>Clé API Google Publique</strong>. Merci de visiter <strong><a href="https://support.google.com/cloud/answer/6158862/">Créer une clé API</a></strong> pour générer la clé. Si vous avez des soucis pour générer votre clé, lisez le guide <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Tant que la clé ne sera pas entrée, la galerie ne fonctionnera pas.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Vidéos par page',
	'ACP_COMMENTS_PER_PAGE'							=> 'Commentaires par page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Nombre de commentaires sur la page des vidéos.<br /><em>La valeur par défaut est de 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Activer les commentaires des vidéos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Cette option va activer l’affichage des commentaires sur la page des vidéos.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Activer la galerie vidéo',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Activer l’extension galerie vidéo.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Activer les statistiques vidéos sur l’index',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Cette option active l’affichage des statistiques vidéos sur la page d’index.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Activer les vidéos sur l’index',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Cette option active l’affichage des vidéos sur la page d’index.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Afficher les dernières vidéos en haut de l’index',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Au dessus ou en dessous du forum.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Afficher les dernières vidéos',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Entrez le nombre de vidéos a afficher sur l’index.<br /><em>La valeur par défaut est 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Paramètres de la galerie vidéo sauvegrdés',
	'ACP_VIDEO_TOP'									=> 'Haut',
	'ACP_VIDEO_BOTTOM'								=> 'Bas',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Cette catégorie a été correctement ajoutée.',
	'ACP_CATEGORY_DELETE'			=> 'Etes vous certain de vouloir effacer cette catégorie ?',
	'ACP_CATEGORY_DELETED'			=> 'Cette catégorie a été correctement supprimée.',
	'ACP_CATEGORY_EDIT'				=> 'Editer la catégorie',
	'ACP_CATEGORY_UPDATED'			=> 'Cette catégorie a été correctement mise à jour.',
	'ACP_VIDEO_CAT_ADD'				=> 'Ajouter une nouvelle catégorie',
	'ACP_VIDEO_CAT_TITLE'			=> 'Titre de la catégorie',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Entrez le titre de la catégorie.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Vous devez entrer un <strong>titre</strong> pour cette catégorie.',
	'ACP_VIDEO_OVERVIEW'			=> 'Categories Vidéos',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'A cet endroit, vous vouvez gèrer les catégories des vidéo de votre forum.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'A cet endroit, vous vouvez gèrer les titres des vidéo de votre forum.',
	'ACP_TITLE_DELETE'				=> 'Etes vous certain de vouloir effacer ce titre ?',
	'ACP_TITLE_DELETED'				=> 'Ce titre a été correctement supprimé',
));
