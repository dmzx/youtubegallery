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
	'VIDEO_INDEX'				=> 'Video Galerij',
	'VIDEO_SELECT_CAT'			=> 'Selecteer een categorie',
	'VIDEO_SUBMIT'				=> 'Nieuwe Video',
	'VIDEO_URL'					=> 'Vul Video URL in',
	'VIDEOS_TIP'				=> 'Help en suggesties',
	'VIDEOS_TIPS_PART_01'		=> 'Surf naar <a href="https://www.youtube.com/">Youtube.com</a>, zoek je favoriete video.',
	'VIDEOS_TIPS_PART_02'		=> 'Kopieer de video URL, plak deze in bovenstaand formulier, kies categorie en plaats de video.',
	'VIDEOS_TIPS_PART_03'		=> 'Ja kan <strong>youtube.com</strong> gebruiken en <strong>youtu.be</strong>, beide worden geaccepteerd.',
	'VIDEOS_TIPS_PART_04'		=> 'Waarschuwing',
	'VIDEOS_TIPS_PART_05'		=> 'deze pagina is niet voor video’s naar youtube te uploaden!',
	'VIDEO_UNAUTHED'			=> 'Je hebt geen permissie om deze video te bekijken.',
	'INVALID_VIDEO'				=> 'De geselecteerde video bestaat niet.',
	'VIDEO'						=> 'Video',
	'VIDEO_EXPLAIN'				=> 'Bekijk galerij van de Youtube video’s',
	'VIEW_CAT'					=> 'Bekijk categorie',
	'VIEW_VIDEO'				=> 'Bekijk Video',
	'VIDEO_CAT'					=> 'Categorie',
	'VIDEO_CATS'				=> 'Categorieën',
	'VIDEO_CREATED'				=> 'Deze video is succesvol toegevoegd.',
	'VIDEO_DATE'				=> 'Datum',
	'VIDEO_DELETE'				=> 'Verwijder video',
	'VIDEO_DELETED'				=> 'Deze video is succesvol verwijderd.',
	'VIDEO_LAST'				=> 'Laatste',
	'VIDEO_VERSION'				=> 'Versie',
	'PAGE_RETURN'				=> '%sGa terug naar de video pagina%s',
	'COMMENTS'					=> 'Reacties',
	'POST_COMMENT'				=> 'Plaats een reactie',
	'COMMENT_CREATED'			=> 'Je reactie is succesvol toegevoegd.',
	'VIDEO_CMNT_SUBMIT'			=> 'Plaatst een nieuwe reactie',
	'NO_VIDEOS_COMMENTS'		=> 'Deze video heeft geen reacties.',
	'VIDEO_COMMENT'				=> 'Reactie',
	'VIDEO_COMMENTS'			=> 'Reacties',
	'COMMENT_DELETED_SUCCESS'	=> 'Deze reactie is succesvol verwijderd.',
	'DELETE_COMMENT_CONFIRM'	=> 'Ben je zeker dat je deze reactie wenst te verwijderen?',
	'DELETE_COMMENT_NOT'		=> 'Reactie <strong>niet</strong> verwijderd.',
	'DELETE_VIDEO'				=> 'Ben je zeker dat je deze video wenst te verwijderen?',
	'MY_VIDEOS'					=> 'Bekijk je video’s',
	'NEED_VIDEO_URL'			=> 'Je moet een <strong>url</strong> opgeven voor deze video.',
	'NEWEST_VIDEOS'				=> 'Nieuwste video’s',
	'NO_VIDEOS'					=> 'Deze pagina heeft geen video’s.',
	'NO_CAT_VIDEOS'				=> 'Deze categorie heeft geen video’s of bestaat niet.',
	'NO_USER_VIDEOS'			=> 'Deze gebruiker heeft geen video’s of bestaat niet.',
	'NO_CATEGORIES'				=> 'Deze pagina heeft geen categorieën.',
	'NO_TITLE'					=> 'Deze pagina heeft geen titels.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Keer terug naar de video galerij',
	'SEARCH_VIDEOS'				=> 'Zoek Video’s',
	'TOTAL_VIDEOS'				=> 'Totaal video’s',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'Geen categorieën',
		1 => 'Totaal <strong>%1$d</strong> categorie',
		2 => 'Totaal <strong>%1$d</strong> categorieën',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'Geen videos',
		1 => 'Totaal <strong>%1$d</strong> video',
		2 => 'Totaal <strong>%1$d</strong> video’s',
	),

	'TOTAL_VIEWS'		=> array(
		0 => 'Niet bekeken',
		1 => 'Totaal <strong>%1$d</strong> maal bekeken',
		2 => 'Totaal <strong>%1$d</strong> maal bekeken',
	),

	'TOTAL_COMMENTS'	=> array(
		0 => 'Geen reacties',
		1 => 'Totaal <strong>%1$d</strong> reactie',
		2 => 'Totaal <strong>%1$d</strong> reacties',
	),
	'USER_VIDEOS'				=> 'Alle video’s van gebruiker',
	'USER_VIDEOS_EXPLAIN'		=> 'Toon alle',
	'NO_KEY_ADMIN'				=> 'Beste forum beheerder, om de video galerij te gebruiken moet je een <strong>Google Public API key</strong> aanmaken, ga naar het Administratie Controle Paneel en volg de instructies.',
	'NO_KEY_USER'				=> 'Beste gebruiker, de video galerij is momenteel niet beschikbaar. Probeer later opnieuw..',
	'COMMENTS_DISABLED'			=> 'Reacties zijn uitgeschakeld.',
	'DELETE_COMMENT'			=> 'Verwijder reactie',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] is <em>UIT</em>',
	'FLASH_IS_ON'			=> '[flash] is <em>AAN</em>',
	'VIDEO_ADD_BY'			=> 'Toegevoegd door',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Embed Video',
	'VIDEO_LINK'			=> 'Video Link',
	'VIDEO_LINKS'			=> 'Links',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube Video Link',
	'VIDEO_VIEWS'			=> 'Bekeken',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Auteur',
	'VIDEO_WATCH'			=> 'Bekijk op YouTube',

	//Pagination
	'LIST_COMMENT'		=>	array(
		1 => '%s reactie',
		2 => '%s reacties',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s video',
		2 => '%s video’s',
	),
));
