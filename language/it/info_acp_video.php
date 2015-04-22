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

$lang = array_merge($lang, array(
	'VIDEO_INDEX'			=> 'Galleria Video',
	'VIDEO_SELECT_CAT'		=> 'Scegli una categoria',
	'VIDEO_SUBMIT'			=> 'Nuovo Video',
	'VIDEO_URL'				=> 'Incolla l\'URL del video',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Aiuto e suggerimenti',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Browse to <a href="https://www.youtube.com/">Youtube.com</a>, search your favorite videos.</li>
		<li>Copy the video URL, paste it in the field above, choose the category and submit the form.</li>
		<li>You can use <strong>youtube.com</strong> and <strong>youtu.be</strong>, both are accepted by the Extension.</li>
	</ul>
	<br />
	<strong>Warning: this page isn’t for uploading videos to Youtube!</strong>',
	'UNAUTHED'				=> 'Non sei autorizzato a visualizzare questa pagina.',
	'VIDEO_UNAUTHED'		=> 'Non sei autorizzato a visualizzare	questo video.',
	'INVALID_VIDEO'			=> 'Il video che hai selezionato non esiste.',
	'VIDEO'					=> 'Video',
	'VIDEO_EXPLAIN'			=> 'Guarda la galleria di video di Youtube',
	'VIEW_CAT'				=> 'Visualizza la Categoria',
	'VIEW_VIDEO'			=> 'Visualizza il Video',
	'VIDEO_CAT'				=> 'Categoria',
	'VIDEO_CATS'			=> 'Categorie',
	'VIDEO_CATEGORIES'		=> 'Categorie',
	'VIDEO_CREATED'			=> 'Questo video è stato aggiunto con successo.',
	'VIDEO_DATE'			=> 'Data',
	'VIDEO_DELETE'			=> 'Cancella video',
	'VIDEO_DELETED'			=> 'Questo video è stato eliminatocon successo.',
	'PAGE_RETURN'			=>' Tornare alle pagine video',
	'DELETE_VIDEO'			=> 'Sei sicuro di voler cancellare questo video?',
	'MY_VIDEOS'				=> 'Guarda i tuoi video',
	'NEED_VIDEO_URL'		=> 'Devi inserire un <strong>url</strong> per questo video.',
	'NEWEST_VIDEOS'			=> 'Nuovi Video',
	'NO_VIDEOS'				=> 'Questa pagina non ha video.',
	'NO_CATEGORIES'			=> 'Questa pagina non ha categorie.',
	'RETURN_TO_VIDEO_INDEX' => 'Ritorna alla Galleria Video',
	'SEARCH_VIDEOS'			=> 'Cerca Video',
	'TOTAL_CATEGORIES_OTHER'=> 'Numero totale di categorie <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Numero totale di categorie <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Numero totale di video',
	'TOTAL_VIDEOS_OTHER'	=> 'Numero totale di video <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Numero totale di video <strong>0</strong>',
	'USER_VIDEOS'			=> 'Cerca video degli utenti',

	// ACP
	'ACP_VIDEO'				=> 'Galleria Video',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Impostazioni Video',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Impostazioni Generali',
	'ACP_VIDEO_ENABLE'		=> 'Abilita Video Pagina',
	'ACP_VIDEO_CATEGORY'	=> 'Categorie Video',
	'ACP_VIDEO_HEIGHT'		=> 'Altezza Video',
	'ACP_VIDEO_WIDTH'		=> 'Larghezza Video',
	'ACP_VERSION_CURRENT'	=> 'Versione',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Questa categoria è stata aggiunta con successo.',
	'ACP_CATEGORY_DELETE'	=> 'Sei sicuro di voler cancellare questa categoria?',
	'ACP_CATEGORY_DELETED'	=> 'Questa categoria è stata eliminata con successo',
	'ACP_CATEGORY_EDIT'		=> 'Modifica categoria',
	'ACP_CATEGORY_UPDATED'	=> 'Questa categoria è stata aggiornata con successo!',
	'ACP_VIDEO_CAT_ADD'		=> 'Aggiungi nuova Categoria',
	'ACP_VIDEO_CAT_TITLE'	=> 'Titolo Categoria',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Inserire il titolo della categoria.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Devi inserire un	<strong>nome</strong> per questa categoria.',
	'ACP_VIDEO_OVERVIEW'	=> 'Categorie Video',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Qui è possibile gestire le categorie video della piattaforma.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Senza categoria',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Può vedere la Galleria Video',
	'ACL_U_VIDEO_VIEW'		=> 'Può vedere i video',
	'ACL_U_VIDEO_DELETE'	=> 'Può eliminare proprio video',
	'ACL_U_VIDEO_POST'		=> 'Possono pubblicare video',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] is <em>OFF</em>',
	'FLASH_IS_ON'			=> '[flash] is <em>ON</em>',
	'VIDEO_ADD_BY'			=> 'Added by',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Embed Video',
	'VIDEO_LINK'			=> 'Video Link',
	'VIDEO_LINKS'			=> 'Links',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube Video Link',
	'VIDEO_VIEWS'			=> 'Views',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Autore',
	'VIDEO_WATCH'			=> 'Guarda su YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 Video',
	'LIST_VIDEOS'			=> '%1$s Videos',
));

