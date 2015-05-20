<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'VIDEO_INDEX'			=> 'Filmgalleri',
	'VIDEO_SELECT_CAT'		=> 'Välj en kategori',
	'VIDEO_SUBMIT'			=> 'Ny film',
	'VIDEO_URL'				=> 'Mata in en filmens URL',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Hjälp och förslag',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Gå till <a href="https://www.youtube.com/">Youtube.com</a> och leta upp dina favoritfilmer.</li>
		<li>Kopiera filmernas länkar, infoga dem i fältet ovan, välj en kategori och skicka formuläret.</li>
		<li>Du kan använda <strong>youtube.com</strong> och <strong>youtu.be</strong>, bägge accepteras.</li>
	</ul>
	<br />
	<strong>OBS: denna sida kan ej användas till uppladdning av filmer till Youtube!</strong>',
	'UNAUTHED'				=> 'Du har ej behörighet att se denna sida.',
	'VIDEO_UNAUTHED'		=> 'Du har ej behörighet att se denna film.',
	'INVALID_VIDEO'			=> 'Den valda filmen existerar ej.',
	'VIDEO'					=> 'Filmer',
	'VIDEO_EXPLAIN'			=> 'Visa galleri med Youtube-filmer',
	'VIEW_CAT'				=> 'Visa kategori',
	'VIEW_VIDEO'			=> 'Visa film',
	'VIDEO_CAT'				=> 'Kategori',
	'VIDEO_CATS'			=> 'Kategorier',
	'VIDEO_CATEGORIES'		=> 'Kategorier',
	'VIDEO_CREATED'			=> 'Filmen har lagts till.',
	'VIDEO_DATE'			=> 'Datum',
	'VIDEO_DELETE'			=> 'Radera filmen',
	'VIDEO_DELETED'			=> 'Filmen har tagits bort.',
	'PAGE_RETURN'			=> '%sTillbaka till filmsidan%s',
	'DELETE_VIDEO'			=> 'Är du säker på att du vill radera filmen?',
	'MY_VIDEOS'				=> 'Visa dina filmer',
	'NEED_VIDEO_URL'		=> 'Du måste ange en <strong>URL</strong> för filmen.',
	'NEWEST_VIDEOS'			=> 'Senaste filmnerna',
	'NO_VIDEOS'				=> 'Denna sida har inga filmer.',
	'NO_CATEGORIES'			=> 'Denna sida har inga kategorier.',
	'RETURN_TO_VIDEO_INDEX' => 'Tillbaka till filmgallerian',
	'SEARCH_VIDEOS'			=> 'Sök film',
	'TOTAL_CATEGORIES_OTHER'=> 'Antal kategorier <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Antal kategorier <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Antal filmer',
	'TOTAL_VIDEOS_OTHER'	=> 'Antal filmer <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Antal filmer <strong>0</strong>',
	'USER_VIDEOS'			=> 'Sök användarens filmer',
	'NO_KEY_ADMIN'				=> 'För att kunna använda filmgallerian måste du ha en <strong>Google Public API nyckel</strong>, gå till ACPn och följ instruktionerna där.',
	'NO_KEY_USER'				=> 'Gallerian är ej tillgänglig, försök igen senare.',

	// ACP
	'ACP_VIDEO'						=> 'Filmgalleri',
	'ACP_VIDEO_EXPLAIN'				=> '',
	'ACP_VIDEO_SETTINGS'			=> 'Filminställningar',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Allmäna inställningar',
	'ACP_VIDEO_ENABLE'				=> 'Aktivera filmsidan',
	'ACP_VIDEO_CATEGORY'			=> 'Filmkategorier',
	'ACP_VIDEO_HEIGHT'				=> 'Filmhöjd',
	'ACP_VIDEO_WIDTH'				=> 'Filmbredd',
	'ACP_VERSION_CURRENT'			=> 'Version',
	'ACP_GOOGLE_KEY'		=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'Du måste skapa en <strong>Google Public API nyckel</strong> för att kunna använda filmgallerian. Gå till <a href="https://console.developers.google.com/">Google Developers Console</a> för att generera nyckeln. Om problem uppstår bör du läsa guiden <a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a>. Gallerian kommer ej att vara tillgänglig tills du har genererat en nyckel.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Kategorin har lagts till.',
	'ACP_CATEGORY_DELETE'			=> 'Är du säker på att du vill radera denna kategori?',
	'ACP_CATEGORY_DELETED'			=> 'Kategorin har raderats',
	'ACP_CATEGORY_EDIT'				=> 'Bearbeta kategorin',
	'ACP_CATEGORY_UPDATED'			=> 'Kategorin har aktualiserats!',
	'ACP_VIDEO_CAT_ADD'				=> 'Skapa ny kategori',
	'ACP_VIDEO_CAT_TITLE'			=> 'Kategorirubrik',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Ange en rubrik för kategorin.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Du måste ange en <strong>rubrik</strong> för denna kategori.',
	'ACP_VIDEO_OVERVIEW'			=> 'Filmkategorier',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Här kan du hantera forumets filmkategorier.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Utan kategori',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Kan se filmgallerian',
	'ACL_U_VIDEO_VIEW'		=> 'Kan se filmer',
	'ACL_U_VIDEO_DELETE'	=> 'Kan radera filmer',
	'ACL_U_VIDEO_POST'		=> 'Kan lägga till filmer',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] är <em>AV</em>',
	'FLASH_IS_ON'			=> '[flash] är <em>PÅ</em>',
	'VIDEO_ADD_BY'			=> 'Tillagt av',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Bädda in film',
	'VIDEO_LINK'			=> 'Filmlänk',
	'VIDEO_LINKS'			=> 'Länkar',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube filmlänk',
	'VIDEO_VIEWS'			=> 'Visningar',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Autor',
	'VIDEO_WATCH'			=> 'Visa hos Youtube',

	//Pagination
	'LIST_VIDEO'			=> '1 film',
	'LIST_VIDEOS'			=> '%1$s filmer',
));
