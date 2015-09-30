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
	'VIDEO_INDEX'			=> 'Galerie vidéo',
	'VIDEO_SELECT_CAT'		=> 'Sélectionner une catégorie',
	'VIDEO_SUBMIT'			=> 'Nouvelle vidéo',
	'VIDEO_URL'				=> 'Saisir l’adresse URL de la vidéo',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Aide et Suggestions',
	'VIDEOS_TIPS_PART_01'			=> 'Se rendre sur <a href="https://www.youtube.com/">Youtube.com</a>, pour trouver ses vidéos préférées.',
	'VIDEOS_TIPS_PART_02'			=> 'Copier l’adresse URL de la vidéo, la coller dans le champ ci-dessous, choisir la catégorie souhaitée et valider le formulaire.',
	'VIDEOS_TIPS_PART_03'			=> 'Il est possible d’utiliser <strong>youtube.com</strong> et <strong>youtu.be</strong>, les deux étant acceptés par cette extension.',
	'VIDEOS_TIPS_PART_04'			=> 'Merci de noter que',
	'VIDEOS_TIPS_PART_05'			=> 'cette page ne permet pas d’envoyer des vidéos sur le site Web de Youtube !',
	'VIDEO_UNAUTHED'		=> 'Vous n’êtes pas autorisé à voir cette vidéo.',
	'INVALID_VIDEO'			=> 'La vidéo que vous avez sélectionnée n’existe pas.',
	'VIDEO'					=> 'Vidéos',
	'VIDEO_EXPLAIN'			=> 'Voir la galerie des vidéos Youtube',
	'VIEW_CAT'				=> 'Voir la catégorie',
	'VIEW_VIDEO'			=> 'Voir la vidéo',
	'VIDEO_CAT'				=> 'Catégorie',
	'VIDEO_CATS'			=> 'Catégories',
	'VIDEO_CREATED'			=> 'La vidéo a été ajoutée avec succès.',
	'VIDEO_DATE'			=> 'Date',
	'VIDEO_DELETE'			=> 'Supprimer la vidéo',
	'VIDEO_DELETED'			=> 'Cette vidéo a été supprimée avec succès.',
	'PAGE_RETURN'			=> '%sRetourner à la page des vidéos%s',
	'COMMENTS'				=> 'Commentaires',
	'POST_COMMENT'			=> 'Poster un commentaire',
	'COMMENT_CREATED'		=> 'Votre commentaire a été ajouté.',
	'VIDEO_CMNT_SUBMIT'		=> 'Poster un nouveau commentaire',
	'NO_VIDEOS_COMMENTS'	=> 'Cette vidéo n’a aucun commentaire.',
	'VIDEO_COMMENT'			=> 'Commentaire',
	'VIDEO_COMMENTS'		=> 'Commentaires',
	'COMMENT_DELETED_SUCCESS'	=> 'Ce commentaire a été supprimé avec succès.',
	'DELETE_COMMENT_CONFIRM'	=> 'Confirmer la suppression de ce commentaire.',
	'DELETE_VIDEO'			=> 'Confirmer la suppression de cette vidéo.',
	'MY_VIDEOS'				=> 'Voir ses vidéos',
	'NEED_VIDEO_URL'		=> 'Vous devez saisir une <strong>adresse URL</strong> pour cette vidéo.',
	'NEWEST_VIDEOS'			=> 'Nouvelles vidéos',
	'NO_VIDEOS'				=> 'Cette page ne contient aucune vidéo.',
	'NO_CAT_VIDEOS'			=> 'Cette catégorie ne contient aucune vidéo ou n’existe pas.',
	'NO_USER_VIDEOS'		=> 'Ce membre n’a pas posté de vidéo ou n’existe pas.',
	'NO_CATEGORIES'			=> 'Cette page ne contient aucune catégorie.',
	'NO_TITLE'				=> 'Cette page ne contient aucun titre.',
	'RETURN_TO_VIDEO_INDEX' => 'Retourner à la galerie vidéo',
	'SEARCH_VIDEOS'			=> 'Rechercher des vidéos',
	'TOTAL_CATEGORIES_OTHER'=> 'Nombre de catégories : <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Nombre de catégories : <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Nombre de vidéos',
	'TOTAL_VIDEOS_OTHER'	=> 'Nombre de vidéos : <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Nombre de vidéos : <strong>0</strong>',
	'TOTAL_VIEWS_OTHER'		=> 'Nombre de vues : <strong>%d</strong>',
	'TOTAL_VIEW_ZERO'		=> 'Nombre de vues : <strong>0</strong>',
	'TOTAL_COMMENTS_OTHER'	=> 'Nombre de commentaires : <strong>%d</strong>',
	'TOTAL_COMMENT_ZERO'	=> 'Nombre de commentaires : <strong>0</strong>',
	'USER_VIDEOS'			=> 'Rechercher les vidéos du membre',
	'NO_KEY_ADMIN'				=> 'Afin d’utiliser la galerie vidéo Youtube, il est nécessaire de paramétrer une <strong>clé publique de l’API Google</strong> dans le « Panneau d’administration » et suivre les instructions.',
	'NO_KEY_USER'				=> 'La galerie vidéo est momentanément indisponible. Merci de revenir ultérieurement.',
	'COMMENTS_DISABLED'		=> 'Les commentaires sont désactivés.',
	'DELETE_COMMENT'		=> 'Supprimer un commentaire',

	// ACP
	'ACP_VIDEO'				=> 'Galerie vidéo',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Paramètres vidéo',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Paramètres généraux',
	'ACP_VIDEO_ENABLE'		=> 'Activer la page des vidéos',
	'ACP_VIDEO_CATEGORY'	=> 'Catégories vidéo',
	'ACP_VIDEO_HEIGHT'		=> 'Hauteur de la vidéo',
	'ACP_VIDEO_HEIGHT_EXPLAIN'		=> 'Permet de paramétrer la hauteur de la vidéo.',
	'ACP_VIDEO_WIDTH'		=> 'Largeur de la vidéo',
	'ACP_VIDEO_WIDTH_EXPLAIN'		=> 'Permet de paramétrer la largeur de la vidéo.',
	'ACP_VERSION_CURRENT'	=> 'Version',
	'ACP_GOOGLE_KEY'		=> 'Clé publique de l’API Google',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'Permet d’utiliser la galerie vidéo en créant une <strong>clé publique de l’API Google</strong>. Se rendre sur la <strong><a href="https://console.developers.google.com/"> la console développeurs de Google</a></strong> pour générer la clé. En cas de problème, lire attentivement le guide sur la page <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">d’aide de la console développeurs de Google : clés de l’API</a></strong>. Tant qu’aucune clé n’est saisie, la galerie sera inaccessible.',
	'ACP_VIDEOS_PER_PAGE'	=> 'Vidéos par page',
	'ACP_COMMENTS_PER_PAGE'	=> 'Commentaires par page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'	=> 'Permet de saisir le nombre de commentaires à afficher par page.<br /><em>La valeur par défaut est à 10</em>.',
	'ACP_ENABLE_COMMENTS'	=> 'Activer les commentaires pour les vidéos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'	=> 'Permet d’afficher les commentaires sur la page des vidéos.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'	=> 'Activer les statistiques vidéo sur la page de l’index du forum',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'	=> 'Permet d’afficher les statistiques vidéo sur la page de l’index du forum.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Cette catégorie a été ajoutée avec succès.',
	'ACP_CATEGORY_DELETE'	=> 'Confirmer la suppression de cette catégorie.',
	'ACP_CATEGORY_DELETED'	=> 'Cette catégorie a été supprimée avec succès',
	'ACP_CATEGORY_EDIT'		=> 'Modifier la catégorie',
	'ACP_CATEGORY_UPDATED'	=> 'Cette catégorie a été mise à jour avec succès.',
	'ACP_VIDEO_CAT_ADD'		=> 'Ajouter une nouvelle catégorie',
	'ACP_VIDEO_CAT_TITLE'	=> 'Titre de la catégorie',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Permet de saisir le titre de la catégorie.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Il est nécessaire de saisir un <strong>titre</strong> pour cette catégorie.',
	'ACP_VIDEO_OVERVIEW'	=> 'Catégories vidéo',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Permet de gérer les catégories vidéo de son forum.',
	'ACP_VIDEO_TITLE'	=> 'Titres des vidéos',
	'ACP_VIDEO_TITLE_EXPLAIN'	=> 'Permet de gérer les titres des vidéos de son forum.',
	'ACP_TITLE_DELETE'	=> 'Confirmer la suppression de ce titre.',
	'ACP_TITLE_DELETED'	=> 'Ce titre a été supprimé avec succès.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Sans catégorie',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Peut voir la galerie vidéo.',
	'ACL_U_VIDEO_VIEW'		=> 'Peut voir les vidéos.',
	'ACL_U_VIDEO_DELETE'	=> 'Peut supprimer ses vidéos.',
	'ACL_U_VIDEO_POST'		=> 'Peut poster des vidéos.',
	'ACL_U_VIDEO_COMMENT'	=> 'Peut commenter les vidéos.',
	'ACL_U_VIDEO_COMMENT_DELETE'		=> 'Peut supprimer ses commentaires des vidéos.',

	// View Video
	'FLASH_IS_OFF'			=> '[FLASH] est <em>DÉSACTIVÉ</em>',
	'FLASH_IS_ON'			=> '[FLASH] est <em>ACTIVÉ</em>',
	'VIDEO_ADD_BY'			=> 'Ajouté par',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Vidéo intégrée',
	'VIDEO_LINK'			=> 'Lien de la vidéo',
	'VIDEO_LINKS'			=> 'Liens des vidéos',
	'VIDEO_LINK_YOUTUBE'	=> 'Lien de la vidéo Youtube',
	'VIDEO_VIEWS'			=> 'Vues',

	// Youtube vidéo text
	'VIDEO_AUTHOR'			=> 'Auteur',
	'VIDEO_WATCH'			=> 'Voir sur YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 vidéo',
	'LIST_VIDEOS'			=> '%1$s vidéos',
	'LIST_COMMENT'			=> '1 commentaire',
	'LIST_COMMENTS'			=> '%1$s commentaires',

));

