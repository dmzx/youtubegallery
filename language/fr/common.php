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
	'VIDEO_INDEX'				=> 'Galerie vidéo',
	'VIDEO_SELECT_CAT'			=> 'Sélectionner une catégorie',
	'VIDEO_SUBMIT'				=> 'Nouvelle vidéo',
	'VIDEO_URL'					=> 'Saisir l’adresse URL de la vidéo',
	'VIDEOS_TIP'				=> 'Aide et suggestions',
	'VIDEOS_TIPS_PART_01'		=> 'Se rendre sur le site Web <a href="https://www.youtube.com/">Youtube.com</a> pour trouver une de ses vidéos préférées.',
	'VIDEOS_TIPS_PART_02'		=> 'Copier l’adresse URL de la vidéo, puis coller celle-ci dans le champ ci-dessus, enfin sélectionner la catégorie souhaitée et valider le formulaire.',
	'VIDEOS_TIPS_PART_03'		=> 'Les sites Web <strong>youtube.com</strong> et <strong>youtu.be</strong>, sont tous deux acceptés par cette extension.',
	'VIDEOS_TIPS_PART_04'		=> 'Merci de noter que',
	'VIDEOS_TIPS_PART_05'		=> 'cette page ne permet pas d’envoyer des vidéos sur le site Web de Youtube !',
	'VIDEO_UNAUTHED'			=> 'Vous n’êtes pas autorisé à voir cette vidéo.',
	'INVALID_VIDEO'				=> 'La vidéo que vous avez sélectionnée n’existe pas.',
	'VIDEO'						=> 'Vidéos',
	'VIDEO_EXPLAIN'				=> 'Voir la galerie des vidéos Youtube',
	'VIEW_CAT'					=> 'Voir la catégorie',
	'VIEW_VIDEO'				=> 'Voir la vidéo',
	'VIDEO_CAT'					=> 'Catégorie',
	'VIDEO_CATS'				=> 'Catégories',
	'VIDEO_CREATED'				=> 'La vidéo a été ajoutée avec succès.',
	'VIDEO_DATE'				=> 'Date',
	'VIDEO_DELETE'				=> 'Supprimer la vidéo',
	'VIDEO_DELETED'				=> 'Cette vidéo a été supprimée avec succès.',
	'VIDEO_LAST'				=> 'Dernière',
	'VIDEO_VERSION'				=> 'Version',
	'PAGE_RETURN'				=> '%sRetourner à la page des vidéos%s',
	'COMMENTS'					=> 'Commentaires',
	'POST_COMMENT'				=> 'Poster un commentaire',
	'COMMENT_CREATED'			=> 'Votre commentaire a été ajouté.',
	'VIDEO_CMNT_SUBMIT'			=> 'Poster un nouveau commentaire',
	'NO_VIDEOS_COMMENTS'		=> 'Cette vidéo n’a aucun commentaire.',
	'VIDEO_COMMENT'				=> 'Commentaire',
	'VIDEO_COMMENTS'			=> 'Commentaires',
	'COMMENT_DELETED_SUCCESS'	=> 'Ce commentaire a été supprimé avec succès.',
	'DELETE_COMMENT_CONFIRM'	=> 'Confirmer la suppression de ce commentaire.',
	'DELETE_COMMENT_NOT'		=> 'Ce commentaire <strong>n’a pas été</strong> supprimé.',
	'DELETE_VIDEO'				=> 'Confirmer la suppression de cette vidéo.',
	'MY_VIDEOS'					=> 'Voir ses vidéos',
	'NEED_VIDEO_URL'			=> 'Vous devez saisir une <strong>adresse URL</strong> pour cette vidéo.',
	'NEWEST_VIDEOS'				=> 'Nouvelles vidéos',
	'NO_VIDEOS'					=> 'Cette page ne contient aucune vidéo.',
	'NO_CAT_VIDEOS'				=> 'Cette catégorie ne contient aucune vidéo ou n’existe pas.',
	'NO_USER_VIDEOS'			=> 'Ce membre n’a pas posté de vidéo ou n’existe pas.',
	'NO_CATEGORIES'				=> 'Cette page ne contient aucune catégorie.',
	'NO_TITLE'					=> 'Cette page ne contient aucun titre.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Retourner à la galerie vidéo',
	'SEARCH_VIDEOS'				=> 'Rechercher des vidéos',
	'TOTAL_VIDEOS'				=> 'Nombre de vidéos',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'Aucune catégorie',
		1 => 'Total <strong>%1$d</strong> catégorie',
		2 => 'Total <strong>%1$d</strong> catégories',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'Aucune vidéo',
		1 => 'Total <strong>%1$d</strong> vidéo',
		2 => 'Total <strong>%1$d</strong> vidéos',
	),

	'TOTAL_VIEWS'		=> array(
		0 => 'Aucune vue',
		1 => 'Total <strong>%1$d</strong> vue',
		2 => 'Total <strong>%1$d</strong> vues',
	),

	'TOTAL_COMMENTS'	=> array(
		0 => 'Aucun commentaire',
		1 => 'Total <strong>%1$d</strong> commentaire',
		2 => 'Total <strong>%1$d</strong> commentaires',
	),
	'USER_VIDEOS'				=> 'Toutes les vidéos du membre',
	'USER_VIDEOS_EXPLAIN'		=> 'Afficher toutes les vidéos du membre.',
	'NO_KEY_ADMIN'				=> 'Afin d’utiliser la galerie vidéo Youtube, il est nécessaire de paramétrer une <strong>clé publique de l’API Google</strong> dans le « Panneau d’administration » et suivre les instructions.',
	'NO_KEY_USER'				=> 'La galerie vidéo est momentanément indisponible. Merci de revenir ultérieurement.',
	'COMMENTS_DISABLED'			=> 'Les commentaires sont désactivés.',
	'DELETE_COMMENT'			=> 'Supprimer un commentaire',

	// View Video
	'FLASH_IS_OFF'				=> '[FLASH] est <em>DÉSACTIVÉ</em>',
	'FLASH_IS_ON'				=> '[FLASH] est <em>ACTIVÉ</em>',
	'VIDEO_ADD_BY'				=> 'Ajouté par',
	'VIDEO_BBCODE'				=> 'BBcode',
	'VIDEO_EMBED'				=> 'Vidéo intégrée',
	'VIDEO_LINK'				=> 'Lien de la vidéo',
	'VIDEO_LINKS'				=> 'Liens des vidéos',
	'VIDEO_LINK_YOUTUBE'		=> 'Lien de la vidéo Youtube',
	'VIDEO_VIEWS'				=> 'Vues',

	// Youtube video text
	'VIDEO_AUTHOR'				=> 'Auteur',
	'VIDEO_WATCH'				=> 'Voir sur YouTube',

	//Pagination
	'LIST_COMMENT'		=>	array(
		1 => '%s commentaire',
		2 => '%s commentaires',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s vidéo',
		2 => '%s vidéos',
	),
));
