<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
* @Translation Anvar - http://bb3.mobi
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
// Some characters for use
// ’ » “ ” …

$lang = array_merge($lang, array(
	'ACP_VIDEO_EXPLAIN'								=> 'Video Gallery Extension',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Общие настройки',
	'ACP_VIDEO_ENABLE'								=> 'Включить видео',
	'ACP_VERSION_CURRENT'							=> 'Версия',
	'ACP_GOOGLE_KEY'								=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Для того, чтобы использовать видео галерею, необходимо получить <strong>Google Public API key</strong>. Посетите <strong><a href="https://console.developers.google.com/">Google Developers Console</a></strong> и получите ключ. Если у вас есть проблемы, чтобы сгенерировать ключ, прочитайте инструкцию <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Пока вы не добавили рабочий ключ, галерея будет недоступна.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Видео на странице',
	'ACP_COMMENTS_PER_PAGE'							=> 'Комментариев на странице',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> '<em>По умолчанию 10 комментариев</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Включить комментарии',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Отображение комментариев к видео и возможность добавлять новые комментарии.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Включить видео галерею',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Полностью включает галерею.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Включить статистику',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Включение статистики видео галереи на главной.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Видео на главной',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Включить последние видео на главной странице форума.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Видео над списком форумов',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'В противном случае блок с видео будет на главной внизу.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Количество последние видео',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Сколько видеороликов выводить на главной странице форума.<br /><em>По умолчанию 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Настройки видео галереи сохранены',
	'ACP_VIDEO_TOP'									=> 'Верх',
	'ACP_VIDEO_BOTTOM'								=> 'Низ',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Категория была успешно добавлена.',
	'ACP_CATEGORY_DELETE'			=> 'Вы уверены, что хотите удалить эту категорию?',
	'ACP_CATEGORY_DELETED'			=> 'Категория была успешно удалена',
	'ACP_CATEGORY_EDIT'				=> 'Редактировать категорию',
	'ACP_CATEGORY_UPDATED'			=> 'Категория успешно обновлена!',
	'ACP_VIDEO_CAT_ADD'				=> 'Создать категорию',
	'ACP_VIDEO_CAT_TITLE'			=> 'Название категории',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> '',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Вы должны ввести <strong>название</strong> категории.',
	'ACP_VIDEO_OVERVIEW'			=> 'Категории видеороликов',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Здесь Вы можете управлять категориями видеороликов.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> '',
	'ACP_TITLE_DELETE'				=> 'Действительно удалить этот заголовок?',
	'ACP_TITLE_DELETED'				=> 'Заголовок успешно ликвидирован',
));
