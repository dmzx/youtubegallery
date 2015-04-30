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
	'VIDEO_INDEX'			=> 'Video Galeri',
	'VIDEO_SELECT_CAT'		=> 'Kategori seç',
	'VIDEO_SUBMIT'			=> 'Yeni video',
	'VIDEO_URL'				=> 'Video urlsini girin',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Yardım ve Öneriler',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li><a href="https://www.youtube.com/">Youtube.com</a>\'da favori videolarınızı arayın.</li>
		<li>Video urlsini kopyalayın, yukarıdaki alana yapıştırın, kategoriyi seçin ve formu gödnerin.</li>
		<li><strong>youtube.com</strong> ve <strong>youtu.be</strong> adreslerini kullanabilirsiniz, iki uzantıda kabul edilir.</li>
	</ul>
	<br />
	<strong>Uyarı: Bu sayfa youtube videoları yüklemek için değildir!</strong>',
	'UNAUTHED'				=> 'BU sayfayı görüntülemek için yetkiniz yok.',
	'VIDEO_UNAUTHED'		=> 'Bu videoyu görme yetkiniz yok.',
	'INVALID_VIDEO'			=> 'Seçtiğiniz video yok.',
	'VIDEO'					=> 'Video',
	'VIDEO_EXPLAIN'			=> 'Youtube video galerilerini göster',
	'VIEW_CAT'				=> 'Kategori görünümü',
	'VIEW_VIDEO'			=> 'Video görünümü',
	'VIDEO_CAT'				=> 'Kategori',
	'VIDEO_CATS'			=> 'Kategoriler',
	'VIDEO_CATEGORIES'		=> 'Kategoriler',
	'VIDEO_CREATED'			=> 'Video başarıyla eklendi.',
	'VIDEO_DATE'			=> 'Tarih',
	'VIDEO_DELETE'			=> 'Videoyu sil',
	'VIDEO_DELETED'			=> 'Bu video başarıyla silindi.',
	'PAGE_RETURN'			=> '%sVideolar sayfasına dön%s',
	'DELETE_VIDEO'			=> 'Bu videoyu silmek istediğinizden emin misiniz?',
	'MY_VIDEOS'				=> 'Videolarınızı görüntüleyin',
	'NEED_VIDEO_URL'		=> 'Bu video için bir <strong>url</strong> girmelisiniz.',
	'NEWEST_VIDEOS'			=> 'Yeni videolar',
	'NO_VIDEOS'				=> 'Bu sayfada hiç video yok.',
	'NO_CATEGORIES'			=> 'Bu sayfada hiç kategori yok.',
	'RETURN_TO_VIDEO_INDEX' => 'Video galeriye dön',
	'SEARCH_VIDEOS'			=> 'Video ara',
	'TOTAL_CATEGORIES_OTHER'=> 'Toplam <strong>%d</strong> kategori',
	'TOTAL_CATEGORY_ZERO'	=> 'Toplam <strong>0</strong> kategori',
	'TOTAL_VIDEOS'			=> 'Toplam video',
	'TOTAL_VIDEOS_OTHER'	=> 'Toplam <strong>%d</strong> video',
	'TOTAL_VIDEO_ZERO'		=> 'Toplam <strong>0</strong> video',
	'USER_VIDEOS'			=> 'Kullanıcının videolarında ara',

	// ACP
	'ACP_VIDEO'				=> 'Video Galeri',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Video ayarları',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Genel ayarlar',
	'ACP_VIDEO_ENABLE'		=> 'Videolar sayfasını etkinleştir',
	'ACP_VIDEO_CATEGORY'	=> 'Video kategorileri',
	'ACP_VIDEO_HEIGHT'		=> 'Video yükseklik',
	'ACP_VIDEO_WIDTH'		=> 'Video genişlik',
	'ACP_VERSION_CURRENT'	=> 'Versiyon',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Kategori başarıyla eklendi.',
	'ACP_CATEGORY_DELETE'	=> 'Kategoriyi silmek istediğinize emin misiniz?',
	'ACP_CATEGORY_DELETED'	=> 'Kategori başarıyla silindi.',
	'ACP_CATEGORY_EDIT'		=> 'Kategoriyi düzenle',
	'ACP_CATEGORY_UPDATED'	=> 'Kategori başarıyla güncellendi!',
	'ACP_VIDEO_CAT_ADD'		=> 'Yeni kategori ekle',
	'ACP_VIDEO_CAT_TITLE'	=> 'Kategori başlığı',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Kategori başlığı girin.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Bu kategori için bir başlık girmelisiniz.',
	'ACP_VIDEO_OVERVIEW'	=> 'Video kategorileri',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Kurulu video galerilerinizi buradan yönetebilirsiniz.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Genel',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Video galeriyi görebilirsiniz',
	'ACL_U_VIDEO_VIEW'		=> 'Videoları görebilirsiniz',
	'ACL_U_VIDEO_DELETE'	=> 'Kendi videolarınızı silebilirsiniz',
	'ACL_U_VIDEO_POST'		=> 'Videoları görebilirsiniz',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] <em>Kapalı</em>',
	'FLASH_IS_ON'			=> '[flash] <em>Açık</em>',
	'VIDEO_ADD_BY'			=> 'tarafından eklendi',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Embed Video',
	'VIDEO_LINK'			=> 'Video Link',
	'VIDEO_LINKS'			=> 'Link',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube Video Link',
	'VIDEO_VIEWS'			=> 'İzlenme',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Ekleyen',
	'VIDEO_WATCH'			=> 'YouTube\'da izle',

	//Pagination
	'LIST_VIDEO'			=> '1 Video',
	'LIST_VIDEOS'			=> '%1$s Video',
));

