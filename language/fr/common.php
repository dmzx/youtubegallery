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
	'VIDEO_INDEX'			=> 'Galerie Vidéo',
	'VIDEO_SELECT_CAT'		=> 'Sélectionner une catégorie',
	'VIDEO_SUBMIT'			=> 'Nouvelle vidéo',
	'VIDEO_URL'				=> 'Entrer l’adresse de la vidéo ',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Aide et Suggestions',
	'VIDEOS_TIPS_PART_01'			=> 'Se rendre sur',
	'VIDEOS_TIPS_PART_02'			=> 'pour trouver ses vidéos préférées.',
	'VIDEOS_TIPS_PART_03'			=> 'Copier l’adresse URL de la vidéo, la coller dans le champ ci-dessous, choisir la catégorie souhaitée et valider le formulaire.',
	'VIDEOS_TIPS_PART_04'			=> 'Il est possible d’utiliser',
	'VIDEOS_TIPS_PART_05'			=> 'les deux étant acceptés par cette extension.',
	'VIDEOS_TIPS_PART_06'			=> 'Merci de noter que',
	'VIDEOS_TIPS_PART_07'			=> 'cette page ne permet pas d’envoyer des vidéos sur le site Web de Youtube !',
	'UNAUTHED'				=> 'Vous n’êtes pas autorisé à visualiser cette page.',
	'VIDEO_UNAUTHED'		=> 'Vous n’êtes pas autorisé à visualiser cette vidéo.',
	'INVALID_VIDEO'			=> 'La vidéo que vous avez sélectionné n’existe pas.',
	'VIDEO'					=> 'Vidéos',
	'VIDEO_EXPLAIN'			=> 'Voir la galerie des vidéos Youtube',
	'VIEW_CAT'				=> 'Voir la catégorie',
	'VIEW_VIDEO'			=> 'Voir la vidéo',
	'VIDEO_CAT'				=> 'Catégorie',
	'VIDEO_CATS'			=> 'Catégories',
	'VIDEO_CATEGORIES'		=> 'Catégories',
	'VIDEO_CREATED'			=> 'La vidéo a été ajoutée.',
	'VIDEO_DATE'			=> 'Date',
	'VIDEO_DELETE'			=> 'Effacer la vidéo',
	'VIDEO_DELETED'			=> 'La vidéo a été effacée.',
	'PAGE_RETURN'			=> '%sRetourner à la page des vidéos%s',
	'RETURN'				=> 'Retourner à la page précédente',
	'COMMENTS'				=> 'Commentaires',
	'POST_COMMENT'			=> 'Poster un commentaire',
	'COMMENT_CREATED'		=> 'Votre commentaire a été ajouté.',
	'VIDEO_CMNT_SUBMIT'		=> 'Poster un nouveau commentaire',
	'NO_VIDEOS_COMMENTS'	=> 'Cette vidéo n’est pas commentée.',
	'VIDEO_COMMENT'			=> 'Commentaire',
	'VIDEO_COMMENTS'		=> 'Commentaires',
	'COMMENT_DELETED_SUCCESS'	=> 'Ce commentaire a été correctement effacé.',
	'DELETE_COMMENT_CONFIRM'	=> 'Êtes vous certain de vouloir effacer ce commentaire?',
	'DELETE_VIDEO'			=> 'Êtes vous certain de vouloir effacer cette vidéo?',
	'MY_VIDEOS'				=> 'Voir vos vidéos',
	'NEED_VIDEO_URL'		=> 'Vous devez entrer une <strong>adresse</strong> pour cette vidéo.',
	'NEWEST_VIDEOS'			=> 'Nouvelles vidéos',
	'NO_VIDEOS'				=> 'Cette page ne contient aucune vidéo.',
	'NO_CAT_VIDEOS'			=> 'Cette catégorie ne contient aucune vidéo ou n’existe pas.',
	'NO_USER_VIDEOS'		=> 'Ce membre n’a pas posté de vidéo ou n’existe pas.',
	'NO_CATEGORIES'			=> 'Cette page ne contient aucune catégorie.',
	'NO_TITLE'				=> 'Cette page ne contient aucun sujet.',
	'RETURN_TO_VIDEO_INDEX' => 'Retourner à la galerie vidéo',
	'SEARCH_VIDEOS'			=> 'Rechercher une vidéo',
	'TOTAL_CATEGORIES_OTHER'=> 'Nombre de catégories <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Nombre de catégories <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Nombre de vidéos',
	'TOTAL_VIDEOS_OTHER'	=> 'Nombre de vidéos <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Nombre de vidéos <strong>0</strong>',
	'TOTAL_VIEWS_OTHER'		=> 'Nombre de vues <strong>%d</strong>',
	'TOTAL_VIEW_ZERO'		=> 'Nombre de vues <strong>0</strong>',
	'TOTAL_COMMENTS_OTHER'	=> 'Nombre de commentaires <strong>%d</strong>',
	'TOTAL_COMMENT_ZERO'	=> 'Nombre de commentaires <strong>0</strong>',
	'USER_VIDEOS'			=> 'Rechercher les vidéos du membre',
	'NO_KEY_ADMIN'				=> 'Cher administrateur, afin d’utiliser la galerie vidéo Youtube, vous devez paramétrer une <strong>Clé Publique API Google</strong>, rendez vous dans le panneau d’administration et suivez les instructions.',
	'NO_KEY_USER'				=> 'La galerie vidéo est momentanément désactivée. Merci de revenir ultérieurement.',
	'COMMENTS_DISABLED'		=> 'Les commentaires sont désactivés.',
	'DELETE_COMMENT'		=> 'Effacer commentaire',

	// ACP
	'ACP_VIDEO'				=> 'Galerie vidéo',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Paramètres vidéo',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Paramètres généraux',
	'ACP_VIDEO_ENABLE'		=> 'Activer la page des vidéos',
	'ACP_VIDEO_CATEGORY'	=> 'Catégories vidéo',
	'ACP_VIDEO_HEIGHT'		=> 'Hauteur de la vidéo',
	'ACP_VIDEO_HEIGHT_EXPLAIN'		=> 'Paramétrer la hauteur de la vidéo.',
	'ACP_VIDEO_WIDTH'		=> 'Largeur de la vidéo',
	'ACP_VIDEO_WIDTH_EXPLAIN'		=> 'Paramétrer la largeur de la vidéo.',
	'ACP_VERSION_CURRENT'	=> 'Version',
	'ACP_GOOGLE_KEY'		=> 'Clé Publique API Google',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'Afin d’utiliser la galerie vidéo, vous devez créer une <strong>Clé Publique API Google</strong>. Rendez vous sur <strong><a href="https://console.developers.google.com/"> la console développeurs de Google</a></strong> pour générer la clé. En cas de problème pour générer la clé, lisez le guide sur <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">l’aide de la console développeurs de Google: clés API</a></strong>. Tant que vous n’aurez pas entré la clé, la galerie sera inaccessible.',
	'ACP_VIDEOS_PER_PAGE'	=> 'Vidéos par page',
	'ACP_COMMENTS_PER_PAGE'	=> 'Commentaires par page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'	=> 'Entrez le nombre de commentaires à afficher par page.<br /><em>La valeur par défaut est 10</em>.',
	'ACP_ENABLE_COMMENTS'	=> 'Activer les commentaires pour les vidéos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'	=> 'Cette option va afficher les commentaires sur la page des vidéos.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'	=> 'Activer les statistiques vidéo sur l’index',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'	=> 'Cette option va activer l’affichage des statistiques vidéo sur la page d’index du forum.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Catégorie ajoutée.',
	'ACP_CATEGORY_DELETE'	=> 'Êtes vous certain de vouloir effacer cette catégorie?',
	'ACP_CATEGORY_DELETED'	=> 'Cette catégorie a été correctement effacée',
	'ACP_CATEGORY_EDIT'		=> 'Éditer la catégorie',
	'ACP_CATEGORY_UPDATED'	=> 'Cette catégorie a été correctement mise à jour!',
	'ACP_VIDEO_CAT_ADD'		=> 'Ajouter une nouvelle catégorie',
	'ACP_VIDEO_CAT_TITLE'	=> 'Titre des catégories',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Entrer le titre de la catégorie.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Vous devez entrer un <strong>titre</strong> pour cette catégorie.',
	'ACP_VIDEO_OVERVIEW'	=> 'Catégories vidéo',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Vous pouvez gérer les catégories vidéo de votre forum.',
	'ACP_VIDEO_TITLE'	=> 'Titres des vidéos',
	'ACP_VIDEO_TITLE_EXPLAIN'	=> 'Vous pouvez gérer les titres des vidéos de votre forum.',
	'ACP_TITLE_DELETE'	=> 'Êtes vous certain de vouloir effacer ce titre?',
	'ACP_TITLE_DELETED'	=> 'Ce titre a été correctement effacé',

	// Install
	'INSTALL_TEST_CAT'		=> 'Sans catégorie',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Peut voir la galerie vidéo',
	'ACL_U_VIDEO_VIEW'		=> 'Peut voir les vidéos',
	'ACL_U_VIDEO_DELETE'	=> 'Peut effacer ses propres vidéos',
	'ACL_U_VIDEO_POST'		=> 'Peut poster des vidéos',
	'ACL_U_VIDEO_COMMENT'	=> 'Peut commenter les vidéos',
	'ACL_U_VIDEO_COMMENT_DELETE'		=> 'Peut effacer ses propres commentaires sur les vidéos',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] est <em>DESACTIVE</em>',
	'FLASH_IS_ON'			=> '[flash] est <em>ACTIVE</em>',
	'VIDEO_ADD_BY'			=> 'Ajouté par',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Incorporer Vidéo',
	'VIDEO_LINK'			=> 'Lien Vidéo',
	'VIDEO_LINKS'			=> 'Liens Vidéo',
	'VIDEO_LINK_YOUTUBE'	=> 'Lien Vidéo Youtube',
	'VIDEO_VIEWS'			=> 'Vues',

	// Youtube vidéo text
	'VIDEO_AUTHOR'			=> 'Auteur',
	'VIDEO_WATCH'			=> 'Regarder sur YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 Vidéo',
	'LIST_VIDEOS'			=> '%1$s Vidéos',
	'LIST_COMMENT'			=> '1 Commentaire',
	'LIST_COMMENTS'			=> '%1$s Commentaires',

));

