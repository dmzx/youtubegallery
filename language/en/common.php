<?php
/**
*
* Youtube Videos Gallery extension for the phpBB Forum Software package.
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
	'VIDEO_INDEX'			=> 'Video Gallery',
	'VIDEO_SELECT_CAT'		=> 'Select a category',
	'VIDEO_SUBMIT'			=> 'New Video',
	'VIDEO_URL'				=> 'Enter Video URL',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Help and Suggestions',
	'VIDEOS_TIPS_PART_01'			=> 'Browse to',
	'VIDEOS_TIPS_PART_02'			=> 'search your favorite videos.',
	'VIDEOS_TIPS_PART_03'			=> 'Copy the video URL, paste it in the field above, choose the category and submit the form.',
	'VIDEOS_TIPS_PART_04'			=> 'You can use',
	'VIDEOS_TIPS_PART_05'			=> 'both are accepted by the Extension.',
	'VIDEOS_TIPS_PART_06'			=> 'Warning',
	'VIDEOS_TIPS_PART_07'			=> 'this page isn’t for uploading videos to Youtube!',
	'UNAUTHED'				=> 'You are not authorised to view this page.',
	'VIDEO_UNAUTHED'		=> 'You are not authorised to view this video.',
	'INVALID_VIDEO'			=> 'The video you selected does not exist.',
	'VIDEO'					=> 'Videos',
	'VIDEO_EXPLAIN'			=> 'View gallery of Youtube videos',
	'VIEW_CAT'				=> 'View Category',
	'VIEW_VIDEO'			=> 'View Video',
	'VIDEO_CAT'				=> 'Category',
	'VIDEO_CATS'			=> 'Categories',
	'VIDEO_CATEGORIES'		=> 'Categories',
	'VIDEO_CREATED'			=> 'This video has been added successfully.',
	'VIDEO_DATE'			=> 'Date',
	'VIDEO_DELETE'			=> 'Delete video',
	'VIDEO_DELETED'			=> 'This video has been deleted successfully.',
	'PAGE_RETURN'			=> '%sReturn to the videos page%s',
	'RETURN'				=> 'Return to the previous page',
	'COMMENTS'				=> 'Comments',
	'POST_COMMENT'			=> 'Post a Comment',
	'COMMENT_CREATED'		=> 'Your comment has been added successfully.',
	'VIDEO_CMNT_SUBMIT'		=> 'Post a new comment',
	'NO_VIDEOS_COMMENTS'	=> 'This video has no comments.',
	'VIDEO_COMMENT'			=> 'Comment',
	'VIDEO_COMMENTS'		=> 'Comments',
	'COMMENT_DELETED_SUCCESS'	=> 'This comment has been deleted successfully.',
	'DELETE_COMMENT_CONFIRM'	=> 'Are you sure you want to delete this comment?',
	'DELETE_VIDEO'			=> 'Are you sure you want to delete this video?',
	'MY_VIDEOS'				=> 'View your videos',
	'NEED_VIDEO_URL'		=> 'You must enter a <strong>url</strong> for this video.',
	'NEWEST_VIDEOS'			=> 'Newest Videos',
	'NO_VIDEOS'				=> 'This page has no videos.',
	'NO_CAT_VIDEOS'			=> 'This category has no videos or does not exist.',
	'NO_USER_VIDEOS'		=> 'This user has no videos or does not exist.',
	'NO_CATEGORIES'			=> 'This page has no categories.',
	'NO_TITLE'			=> 'This page has no titles.',
	'RETURN_TO_VIDEO_INDEX' => 'Return to Video Gallery',
	'SEARCH_VIDEOS'			=> 'Search Videos',
	'TOTAL_CATEGORIES_OTHER'=> 'Total categories <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Total categories <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Total videos',
	'TOTAL_VIDEOS_OTHER'	=> 'Total videos <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Total videos <strong>0</strong>',
	'TOTAL_VIEWS_OTHER'		=> 'Total views <strong>%d</strong>',
	'TOTAL_VIEW_ZERO'		=> 'Total views <strong>0</strong>',
	'TOTAL_COMMENTS_OTHER'	=> 'Total comments <strong>%d</strong>',
	'TOTAL_COMMENT_ZERO'	=> 'Total comments <strong>0</strong>',
	'USER_VIDEOS'			=> 'Search user’s videos',
	'USER_VIDEOS'			=> 'Search user’s videos',
	'NO_KEY_ADMIN'				=> 'Dear board administrator, in order to use Video Gallery, you must set up a <strong>Google Public API key</strong>, go to the Administration Control Panel and follow the instructions.',
	'NO_KEY_USER'				=> 'Dear user, the gallery will be unavailable. Please come back later.',
	'COMMENTS_DISABLED'		=> 'Comments are disabled.',
	'DELETE_COMMENT'		=> 'Delete comment',

	// ACP
	'ACP_VIDEO'				=> 'Video Gallery',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Video Settings',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'General Settings',
	'ACP_VIDEO_ENABLE'		=> 'Enable Videos Page',
	'ACP_VIDEO_CATEGORY'	=> 'Video Categories',
	'ACP_VIDEO_HEIGHT'		=> 'Video Height',
	'ACP_VIDEO_HEIGHT_EXPLAIN'		=> 'Set video height.',
	'ACP_VIDEO_WIDTH'		=> 'Video Width',
	'ACP_VIDEO_WIDTH_EXPLAIN'		=> 'Set video width.',
	'ACP_VERSION_CURRENT'	=> 'Version',
	'ACP_GOOGLE_KEY'		=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'In order to use Video Gallery, you must create a <strong>Google Public API key</strong>. Please, visit <strong><a href="https://console.developers.google.com/">Google Developers Console</a></strong> to generate the key. If you have trouble to generate your key, read the guide <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Until you set up your key, the gallery will be unavailable.',
	'ACP_VIDEOS_PER_PAGE'	=> 'Videos per page',
	'ACP_COMMENTS_PER_PAGE'	=> 'Comments per page',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'	=> 'Set value for comments on video page.<br /><em>Default value is 10</em>.',
	'ACP_ENABLE_COMMENTS'	=> 'Enable comments on videos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'	=> 'This option will display the comment on video page.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'	=> 'Enable video statistics on index',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'	=> 'This option will display the video statics on index page.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'This category has been added successfully.',
	'ACP_CATEGORY_DELETE'	=> 'Are you sure you wish to delete this category?',
	'ACP_CATEGORY_DELETED'	=> 'This category has been deleted successfully',
	'ACP_CATEGORY_EDIT'		=> 'Edit category',
	'ACP_CATEGORY_UPDATED'	=> 'This category has been updated successfully!',
	'ACP_VIDEO_CAT_ADD'		=> 'Add New Category',
	'ACP_VIDEO_CAT_TITLE'	=> 'Category Title',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Enter the title of the category.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'You must enter a <strong>title</strong> for this category.',
	'ACP_VIDEO_OVERVIEW'	=> 'Video Categories',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Here you can manage the Video Categories of your board.',
	'ACP_VIDEO_TITLE'	=> 'Video Titles',
	'ACP_VIDEO_TITLE_EXPLAIN'	=> 'Here you can manage the Video Titles of your board.',
	'ACP_TITLE_DELETE'	=> 'Are you sure you wish to delete this title?',
	'ACP_TITLE_DELETED'	=> 'This title has been deleted successfully',

	// Install
	'INSTALL_TEST_CAT'		=> 'Uncategorized',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Can view Video Gallery',
	'ACL_U_VIDEO_VIEW'		=> 'Can view videos',
	'ACL_U_VIDEO_DELETE'	=> 'Can delete own videos',
	'ACL_U_VIDEO_POST'		=> 'Can post videos',
	'ACL_U_VIDEO_COMMENT'	=> 'Can post video comments',
	'ACL_U_VIDEO_COMMENT_DELETE'		=> 'Can delete own video comments',

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
	'VIDEO_AUTHOR'			=> 'Author',
	'VIDEO_WATCH'			=> 'Watch on YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 Video',
	'LIST_VIDEOS'			=> '%1$s Videos',
	'LIST_COMMENT'			=> '1 Comment',
	'LIST_COMMENTS'			=> '%1$s Comments',

));

