<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
* French Translation - Philippe B.
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
	'VIDEO_SELECT_CAT'			=> 'Selectionner une catégorie',
	'VIDEO_SUBMIT'				=> 'Nouvelle vidéo',
	'VIDEO_URL'					=> 'Entrez l’URL de la vidéo',
	'VIDEOS_TIP'				=> 'Aide et Suggestions',
	'VIDEOS_TIPS_PART_01'		=> 'Rendez vous sur <a href="https://www.youtube.com/">Youtube.com</a>, cherchez vos vidéos favorites.',
	'VIDEOS_TIPS_PART_02'		=> 'Copiez l’URL de la vidéo, collez la dans le champs, choisissez la catégorie et soumettez le formulaire.',
	'VIDEOS_TIPS_PART_03'		=> 'Vous pouvez utiliser <strong>youtube.com</strong> et <strong>youtu.be</strong>, les deux sont acceptés dans l’Extension.',
	'VIDEOS_TIPS_PART_04'		=> 'Attention',
	'VIDEOS_TIPS_PART_05'		=> 'Cette page n’est pas faite pour charger des vidéos vers Youtube !',
	'VIDEO_UNAUTHED'			=> 'Vous n’êtes pas autorisé à voir cette vidéo.',
	'INVALID_VIDEO'				=> 'La vidéo que vous avez selectionné n’existe pas.',
	'VIDEO'						=> 'Vidéos',
	'VIDEO_EXPLAIN'				=> 'Voir la galerie des vidéos Youtube',
	'VIEW_CAT'					=> 'Voir la catégorie',
	'VIEW_VIDEO'				=> 'Voir la vidéo',
	'VIDEO_CAT'					=> 'Catégorie',
	'VIDEO_CATS'				=> 'Catégories',
	'VIDEO_CREATED'				=> 'La vidéo a été ajoutée.',
	'VIDEO_DATE'				=> 'Date',
	'VIDEO_DELETE'				=> 'Effacer la vidéo',
	'VIDEO_DELETED'				=> 'La vidéo a été effacée.',
	'VIDEO_LAST'				=> 'Dernière',
	'VIDEO_VERSION'				=> 'Version',
	'PAGE_RETURN'				=> '%sRetourner à la page des vidéos%s',
	'COMMENTS'					=> 'Commentaires',
	'POST_COMMENT'				=> 'Poster un Commentaire',
	'COMMENT_CREATED'			=> 'Votre commentaire a été ajouté.',
	'VIDEO_CMNT_SUBMIT'			=> 'Poster un nouveau commentaire',
	'NO_VIDEOS_COMMENTS'		=> 'Cette vidéo n’a pas de commentaire.',
	'VIDEO_COMMENT'				=> 'Commentaire',
	'VIDEO_COMMENTS'			=> 'Commentaires',
	'COMMENT_DELETED_SUCCESS'	=> 'Le commentaire a été effacé.',
	'DELETE_COMMENT_CONFIRM'	=> 'Etes vous certain de vouloir effacer ce commentaire ?',
	'DELETE_COMMENT_NOT'		=> 'Commentaire <strong>not</strong> effacé.',
	'DELETE_VIDEO'				=> 'Etes vous certain de vouloir effacer cette vidéo ?',
	'MY_VIDEOS'					=> 'Voir vos vidéos',
	'NEED_VIDEO_URL'			=> 'Vous devez entrer une <strong>url</strong> pour cette vidéo.',
	'NEWEST_VIDEOS'				=> 'Nouvelles vidéos',
	'NO_VIDEOS'					=> 'Cette page ne contient pas de vidéo.',
	'NO_CAT_VIDEOS'				=> 'Cette catégorie ne contient pas de vidéo ou n’existe pas.',
	'NO_USER_VIDEOS'			=> 'Cet utilisateur n’a pas de vidéo ou n’existe pas.',
	'NO_CATEGORIES'				=> 'Cette page ne contient aucune catégorie.',
	'NO_TITLE'					=> 'Cette page n’a pas de titre.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Retourner vers la Galerie Vidéo',
	'SEARCH_VIDEOS'				=> 'Rechercher des vidéos',
	'TOTAL_VIDEOS'				=> 'Nombre total de vidéos',
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
		0 => 'Aucun Commentaire',
		1 => 'Total <strong>%1$d</strong> commentaire',
		2 => 'Total <strong>%1$d</strong> commentaires',
	),
	'USER_VIDEOS'				=> 'Toutes les vidéos de l’utilisateur',
	'USER_VIDEOS_EXPLAIN'		=> 'Tout montrer',
	'NO_KEY_ADMIN'				=> 'Cher administrateur, afin de pouvoir utiliser la Galerie Vidéo, vous devez paramètrer une <strong>Clé API Publique Google</strong>, allez dans le panneau de contrôle administrateur et suivez les instructions.',
	'NO_KEY_USER'				=> 'Cher utilisateur, la galerie vidéo est désactivée, merci de revenir plus tard.',
	'COMMENTS_DISABLED'			=> 'Les commentaires sont désactivés.',
	'DELETE_COMMENT'			=> 'Effacer commentaire',

	// View Video
	'FLASH_IS_OFF'				=> '[flash] est <em>Désactivé</em>',
	'FLASH_IS_ON'				=> '[flash] est <em>Activé</em>',
	'VIDEO_ADD_BY'				=> 'Ajouté par',
	'VIDEO_BBCODE'				=> 'BBcode',
	'VIDEO_EMBED'				=> 'Intégrer la vidéo',
	'VIDEO_LINK'				=> 'Lien vidéo',
	'VIDEO_LINKS'				=> 'Liens',
	'VIDEO_LINK_YOUTUBE'		=> 'Lien vidéo Youtube',
	'VIDEO_VIEWS'				=> 'Vues',

	// Youtube vidéo text
	'VIDEO_AUTHOR'				=> 'Auteur',
	'VIDEO_WATCH'				=> 'Regarder sur YouTube',

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
