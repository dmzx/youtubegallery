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
	'VIDEO_INDEX'			=> 'Видео галерея',
	'VIDEO_SELECT_CAT'		=> 'Выбрать категорию',
	'VIDEO_SUBMIT'			=> 'Новое видео',
	'VIDEO_URL'				=> 'Указать URL Видеоролика',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Помощь и предложения',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Перейдите на <a href="https://www.youtube.com/">Youtube.com</a> и выберите видеоролик который Вам понравился.</li>
		<li>Скопируйте URL видеоролика, вставьте его в поле выше и нажмите отправить.</li>
		<li>Ссылки принимаются с <strong>youtube.com</strong> и <strong>youtu.be</strong>, а также расширения.</li>
	</ul>
	<br />
	<strong>Внимание: Эта страница не для загрузки видеороликов с Youtube!</strong>',
	'UNAUTHED'				=> 'Вы не авторизованы для просмотра этой страницы.',
	'VIDEO_UNAUTHED'		=> 'Вы не авторизованы для просмотра этого видеоролика.',
	'INVALID_VIDEO'			=> 'Выбранного видеоролика не существует.',
	'VIDEO'					=> 'Видео',
	'VIDEO_EXPLAIN'			=> 'Посмотреть галерею видеороликов с Youtube',
	'VIEW_CAT'				=> 'Просмотр категории',
	'VIEW_VIDEO'			=> 'Просмотр видеороликов',
	'VIDEO_CAT'				=> 'Категория',
	'VIDEO_CATS'			=> 'Категории',
	'VIDEO_CATEGORIES'		=> 'Категории',
	'VIDEO_CREATED'			=> 'Видеоролик было успешно добавлен.',
	'VIDEO_DATE'			=> 'Дата',
	'VIDEO_DELETE'			=> 'Удалить видеоролик',
	'VIDEO_DELETED'			=> 'Этот видеоролик было успешно удалён.',
	'PAGE_RETURN'			=> '%sВернуться к странице видеороликов%s',
	'DELETE_VIDEO'			=> 'Вы уверены, что хотите удалить этот видеоролик?',
	'MY_VIDEOS'				=> 'Мои видеоролики',
	'NEED_VIDEO_URL'		=> 'Вы должны ввести <strong>url</strong> для этого видеоролика.',
	'NEWEST_VIDEOS'			=> 'Новые видеоролики',
	'NO_VIDEOS'				=> 'На этой странице нет видеороликов.',
	'NO_CATEGORIES'			=> 'Эта страница без категории.',
	'RETURN_TO_VIDEO_INDEX' => 'Вернуться к видео галереи',
	'SEARCH_VIDEOS'			=> 'Поиск видео',
	'TOTAL_CATEGORIES_OTHER'=> 'Всего категорий <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Всего категорий <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Всего видеороликов',
	'TOTAL_VIDEOS_OTHER'	=> 'Всего видеороликов <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Всего видеороликов <strong>0</strong>',
	'USER_VIDEOS'			=> 'Поиск видео пользователя',
	'NO_KEY_ADMIN'				=> 'Dear board administrator, in order to use Video Gallery, you must set up a <strong>Google Public API key</strong>, go to the Administration Control Panel and follow the instructions.',
	'NO_KEY_USER'				=> 'Dear user, the gallery will be unavailable. Please come back later.',

	// ACP
	'ACP_VIDEO'				=> 'Видео галерея',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Настройки видео',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Общие настройки',
	'ACP_VIDEO_ENABLE'		=> 'Включить видео',
	'ACP_VIDEO_CATEGORY'	=> 'Категории видео',
	'ACP_VIDEO_HEIGHT'		=> 'Высота видео',
	'ACP_VIDEO_WIDTH'		=> 'Ширина видео',
	'ACP_VERSION_CURRENT'	=> 'Версия',
	'ACP_GOOGLE_KEY'		=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'In order to use Video Gallery, you must create a <strong>Google Public API key</strong>. Please, visit <a href="https://console.developers.google.com/">Google Developers Console</a> to generate the key. If you have trouble to generate your key, read the guide <a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a>. Until you set up your key, the gallery will be unavailable.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Категория была успешно добавлена.',
	'ACP_CATEGORY_DELETE'	=> 'Вы уверены, что хотите удалить эту категорию?',
	'ACP_CATEGORY_DELETED'	=> 'Категория была успешно удалена',
	'ACP_CATEGORY_EDIT'		=> 'Редактировать категорию',
	'ACP_CATEGORY_UPDATED'	=> 'Категория успешно обновлена!',
	'ACP_VIDEO_CAT_ADD'		=> 'Создать категорию',
	'ACP_VIDEO_CAT_TITLE'	=> 'Название категории',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> '',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Вы должны ввести <strong>название</strong> категории.',
	'ACP_VIDEO_OVERVIEW'	=> 'Категории видеороликов',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Здесь Вы можете управлять категориями видеороликов.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Без категории',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Может просматривать видео галерею',
	'ACL_U_VIDEO_VIEW'		=> 'Может просматривать видеоролики',
	'ACL_U_VIDEO_DELETE'	=> 'Может удалять свои видео',
	'ACL_U_VIDEO_POST'		=> 'Может добавлять видеоролики',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] <em>Выключен</em>',
	'FLASH_IS_ON'			=> '[flash] <em>Включён</em>',
	'VIDEO_ADD_BY'			=> 'Добавил',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Вставить видео',
	'VIDEO_LINK'			=> 'Ссылка на видео',
	'VIDEO_LINKS'			=> 'Ссылки',
	'VIDEO_LINK_YOUTUBE'	=> 'Ссылка на видео Youtube',
	'VIDEO_VIEWS'			=> 'Просмотры',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Автор',
	'VIDEO_WATCH'			=> 'Смотреть на Youtube',

	//Pagination
	'LIST_VIDEO'			=> '1 видеоролик',
	'LIST_VIDEOS'			=> 'Видеороликов %1$s',
));
