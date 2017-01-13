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
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'General Settings',
	'ACP_VIDEO_ENABLE'								=> 'Enable Videos Page',
	'ACP_VERSION_CURRENT'							=> 'Version',
	'ACP_GOOGLE_KEY'								=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'In order to use Video Gallery, you must create a <strong>Google Public API key</strong>. Please, visit <strong><a href="https://support.google.com/cloud/answer/6158862/">Setting up API keys</a></strong> to generate the key. If you have trouble to generate your key, read the guide <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Until you set up your key, the gallery will be unavailable.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Videos per page',
	'ACP_COMMENTS_PER_PAGE'							=> 'Comments per page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Set value for comments on video page.<br /><em>Default value is 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Enable comments on videos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'This option will display the comment on video page.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Enable video gallery',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Enable video gallery extension global.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Enable video statistics on index',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'This option will display the video statistics on index page.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Enable last videos on index',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'This option will display the videos on index page.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Display last videos on Top of index',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Above or below forum.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Display last videos',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Set value for last videos on index.<br /><em>Default value is 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Video gallery settings saved',
	'ACP_VIDEO_TOP'									=> 'Top',
	'ACP_VIDEO_BOTTOM'								=> 'Bottom',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'This category has been added successfully.',
	'ACP_CATEGORY_DELETE'			=> 'Are you sure you wish to delete this category?',
	'ACP_CATEGORY_DELETED'			=> 'This category has been deleted successfully',
	'ACP_CATEGORY_EDIT'				=> 'Edit category',
	'ACP_CATEGORY_UPDATED'			=> 'This category has been updated successfully!',
	'ACP_VIDEO_CAT_ADD'				=> 'Add New Category',
	'ACP_VIDEO_CAT_TITLE'			=> 'Category Title',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Enter the title of the category.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'You must enter a <strong>title</strong> for this category.',
	'ACP_VIDEO_OVERVIEW'			=> 'Video Categories',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Here you can manage the Video Categories of your board.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'Here you can manage the Video Titles of your board.',
	'ACP_TITLE_DELETE'				=> 'Are you sure you wish to delete this title?',
	'ACP_TITLE_DELETED'				=> 'This title has been deleted successfully',
));
