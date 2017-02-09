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
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'VIDEO_INDEX'				=> 'Видео галерея',
	'VIDEO_SELECT_CAT'			=> 'Выбрать категорию',
	'VIDEO_SUBMIT'				=> 'Новое видео',
	'VIDEO_URL'					=> 'Указать URL Видеоролика',
	'VIDEO_URL_EXPLAIN'			=> '',
	'VIDEOS_TIP'				=> 'Помощь и предложения',
	'VIDEOS_TIPS_PART_01'		=> 'Перейдите на <a href="https://www.youtube.com/">Youtube.com</a> и выберите видео которое Вам понравилось.',
	'VIDEOS_TIPS_PART_02'		=> 'Скопируйте URL видеоролика, вставьте его в поле выше и нажмите отправить.',
	'VIDEOS_TIPS_PART_03'		=> 'Ссылки принимаются с <strong>youtube.com</strong> и <strong>youtu.be</strong>, а также расширения.',
	'VIDEOS_TIPS_PART_04'		=> 'Внимание',
	'VIDEOS_TIPS_PART_05'		=> 'Эта страница не для загрузки видеороликов с Youtube!',
	'VIDEO_UNAUTHED'			=> 'Вы не авторизованы для просмотра этого видеоролика.',
	'INVALID_VIDEO'				=> 'Выбранного видеоролика не существует.',
	'VIDEO'						=> 'Видео',
	'VIDEO_EXPLAIN'				=> 'Посмотреть галерею видеороликов с Youtube',
	'VIEW_CAT'					=> 'Просмотр категории',
	'VIEW_VIDEO'				=> 'Просмотр видеороликов',
	'VIDEO_CAT'					=> 'Категория',
	'VIDEO_CATS'				=> 'Категории',
	'VIDEO_CREATED'				=> 'Видеоролик было успешно добавлен.',
	'VIDEO_DATE'				=> 'Дата',
	'VIDEO_DELETE'				=> 'Удалить видеоролик',
	'VIDEO_DELETED'				=> 'Этот видеоролик было успешно удалён.',
	'VIDEO_LAST'				=> 'Последние видео',
	'PAGE_RETURN'				=> '%sВернуться к странице видеороликов%s',
	'COMMENTS'					=> 'Комментарии',
	'POST_COMMENT'				=> 'Оставить комментарий',
	'COMMENT_CREATED'			=> 'Ваш комментарий был успешно добавлен.',
	'VIDEO_CMNT_SUBMIT'			=> 'Добавить новый коммент',
	'NO_VIDEOS_COMMENTS'		=> 'Нет комментариев к данному видео',
	'VIDEO_COMMENT'				=> 'Комментарий',
	'VIDEO_COMMENTS'			=> 'Комментарии',
	'COMMENT_DELETED_SUCCESS'	=> 'Комментарий успешно удалён.',
	'DELETE_COMMENT_CONFIRM'	=> 'Вы уверены, что хотите удалить комментарий?',
	'DELETE_VIDEO'				=> 'Вы уверены, что хотите удалить видеоролик?',
	'MY_VIDEOS'					=> 'Мои видеоролики',
	'NEED_VIDEO_URL'			=> 'Вы должны ввести <strong>url</strong> для этого видеоролика.',
	'NEWEST_VIDEOS'				=> 'Новые видеоролики',
	'NO_VIDEOS'					=> 'На этой странице нет видеороликов.',
	'NO_CAT_VIDEOS'				=> 'В данной категории нет видео роликов.',
	'NO_USER_VIDEOS'			=> 'Данный пользователь не загрузил видео, либо не существует.',
	'NO_CATEGORIES'				=> 'Страница без категории.',
	'NO_TITLE'					=> 'Страница не имеет названия.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Вернуться к видео галереи',
	'SEARCH_VIDEOS'				=> 'Поиск видео',
	'TOTAL_VIDEOS'				=> 'Всего видеороликов',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'Нет категорий',
		1 => 'Total <strong>%1$d</strong> category',
		2 => 'Total <strong>%1$d</strong> categories',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'Нет видео',
		1 => 'Всего <strong>%1$d</strong> видео',
		2 => 'Всего <strong>%1$d</strong> видео',
	),
	'TOTAL_VIEWS'		=> array(
		0 => 'Нет просомтров',
		1 => 'Всего <strong>%1$d</strong> просмотр',
		2 => 'Всего <strong>%1$d</strong> просмотра',
	),
	'TOTAL_COMMENTS'	=> array(
		0 => 'Нет комментариев',
		1 => 'Всего <strong>%1$d</strong> комментарий',
		2 => 'Всего <strong>%1$d</strong> комментария',
	),
	'USER_VIDEOS'				=> 'Поиск видео пользователя',
	'USER_VIDEOS_EXPLAIN'		=> 'Показать все',
	'NO_KEY_ADMIN'				=> 'Для того, чтобы использовать видео галерею, необходимо настроить <strong>Google Public API key</strong>, перейдите в администраторский раздел и следуйте инструкциям.',
	'NO_KEY_USER'				=> 'Уважаемый пользователь, галерея будет недоступна. Пожалуйста, вернитесь позже.',
	'COMMENTS_DISABLED'			=> 'Комментарии отключены.',
	'DELETE_COMMENT'			=> 'Удалить комментарий',

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
	'LIST_COMMENT'		=>	array(
		1 => '%s комментарий',
		2 => '%s комментариев',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s видеоролик',
		2 => '%s видеороликов',
	),
));
