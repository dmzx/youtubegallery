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
	'ACP_VIDEO_EXPLAIN'								=> 'Paramètres de l’extension Galerie vidéo Youtube.',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Paramètres généraux',
	'ACP_VIDEO_ENABLE'								=> 'Activer la page des vidéos',
	'ACP_VERSION_CURRENT'							=> 'Version',
	'ACP_GOOGLE_KEY'								=> 'Clé publique de l’API Google',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Permet d’utiliser la galerie vidéo Youtube au moyen d’une <strong>clé publique de l’API Google</strong>. Merci de consulter la page : « <strong><a href="https://support.google.com/cloud/answer/6158862/">Configuration des clés de l’API</a></strong> » pour générer la clé. Pour tout problème, se référer au guide présent sur la page <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">d’aide de la console développeurs de Google : clés de l’API</a></strong>. Si aucune clé n’est saisie, la galerie sera inaccessible.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Nombre de vidéos par page',
	'ACP_VIDEOS_PER_PAGE_EXPLAIN'					=> 'Permet de saisir le nombre de vidéos à afficher par page.<br /><em>Par défaut la valeur est définie sur 10</em>.',
	'ACP_COMMENTS_PER_PAGE'							=> 'Nombre de commentaires par page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Permet de saisir le nombre de commentaires à afficher par page.<br /><em>Par défaut la valeur est définie sur 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Activer les commentaires pour les vidéos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Permet d’afficher les commentaires sur la page des vidéos.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Activer la galerie vidéo Youtube',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Permet d’activer l’ensemble des fonctionnalités de l’extension « Galerie vidéo Youtube ».',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Activer les statistiques vidéo sur la page de l’index du forum',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Permet d’afficher les statistiques vidéo sur la page de l’index du forum.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Afficher les dernières vidéos sur la page de l’index du forum',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Permet d’afficher les dernières vidéos ajoutées dans la galerie vidéo Youtube sur la page de l’index du forum.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Emplacement des dernières vidéos sur la page de l’index du forum',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Permet de définir l’emplacement des dernières vidéos ajoutées dans la galerie vidéo Youtube au-dessus ou en dessous du forum.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Nombre de vidéos à afficher sur la page de l’index du forum',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Permet de saisir le nombre de vidéos à afficher en tant que dernières vidéos sur la page de l’index du forum.<br /><em>Par défaut la valeur est définie sur 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Les paramètres de la galerie vidéo Youtube ont été sauvegardés.',
	'ACP_VIDEO_TOP'									=> 'Au-dessus',
	'ACP_VIDEO_BOTTOM'								=> 'En dessous',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Cette catégorie a été ajoutée avec succès.',
	'ACP_CATEGORY_DELETE'			=> 'Confirmer la suppression de cette catégorie.',
	'ACP_CATEGORY_DELETED'			=> 'Cette catégorie a été supprimée avec succès',
	'ACP_CATEGORY_EDIT'				=> 'Modifier la catégorie',
	'ACP_CATEGORY_UPDATED'			=> 'Cette catégorie a été mise à jour avec succès.',
	'ACP_VIDEO_CAT_ADD'				=> 'Ajouter une nouvelle catégorie',
	'ACP_VIDEO_CAT_TITLE'			=> 'Titre de la catégorie',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Permet de saisir le titre de la catégorie.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Il est nécessaire de saisir un <strong>titre</strong> pour cette catégorie.',
	'ACP_VIDEO_OVERVIEW'			=> 'Catégories vidéo',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Permet de gérer les catégories vidéo de son forum.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'Permet de gérer les titres des vidéos de son forum.',
	'ACP_TITLE_DELETE'				=> 'Confirmer la suppression de ce titre.',
	'ACP_TITLE_DELETED'				=> 'Ce titre a été supprimé avec succès.',
));
