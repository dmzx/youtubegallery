<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
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
	'VIDEO_INDEX'				=> 'Video Gallery',
	'VIDEO_SELECT_CAT'			=> 'Select a category',
	'VIDEO_SUBMIT'				=> 'New Video',
	'VIDEO_URL'					=> 'Enter Video URL',
	'VIDEOS_TIP'				=> 'Help and Suggestions',
	'VIDEOS_TIPS_PART_01'		=> 'Browse to <a href="https://www.youtube.com/">Youtube.com</a>, search your favourite videos.',
	'VIDEOS_TIPS_PART_02'		=> 'Copy the video URL, paste it in the field above, choose the category and submit the form.',
	'VIDEOS_TIPS_PART_03'		=> 'You can use <strong>youtube.com</strong> and <strong>youtu.be</strong>, both are accepted by the Extension.',
	'VIDEOS_TIPS_PART_04'		=> 'Warning',
	'VIDEOS_TIPS_PART_05'		=> 'this page isn’t for uploading videos to Youtube !',
	'VIDEO_UNAUTHED'			=> 'You are not authorised to view this video.',
	'INVALID_VIDEO'				=> 'The video you selected does not exist.',
	'VIDEO'						=> 'Videos',
	'VIDEO_EXPLAIN'				=> 'View gallery of Youtube videos',
	'VIEW_CAT'					=> 'View Category',
	'VIEW_VIDEO'				=> 'View Video',
	'VIDEO_CAT'					=> 'Category',
	'VIDEO_CATS'				=> 'Categories',
	'VIDEO_CREATED'				=> 'This video has been added successfully.',
	'VIDEO_DATE'				=> 'Date',
	'VIDEO_DELETE'				=> 'Delete video',
	'VIDEO_DELETED'				=> 'This video has been deleted successfully.',
	'VIDEO_LAST'				=> 'Last',
	'VIDEO_VERSION'				=> 'Version',
	'PAGE_RETURN'				=> '%sReturn to the videos page%s',
	'COMMENTS'					=> 'Comments',
	'POST_COMMENT'				=> 'Post a Comment',
	'COMMENT_CREATED'			=> 'Your comment has been added successfully.',
	'VIDEO_CMNT_SUBMIT'			=> 'Post a new comment',
	'NO_VIDEOS_COMMENTS'		=> 'This video has no comments.',
	'VIDEO_COMMENT'				=> 'Comment',
	'VIDEO_COMMENTS'			=> 'Comments',
	'COMMENT_DELETED_SUCCESS'	=> 'This comment has been deleted successfully.',
	'DELETE_COMMENT_CONFIRM'	=> 'Are you sure you want to delete this comment?',
	'DELETE_COMMENT_NOT'		=> 'Comment <strong>not</strong> deleted.',
	'DELETE_VIDEO'				=> 'Are you sure you want to delete this video?',
	'MY_VIDEOS'					=> 'View your videos',
	'NEED_VIDEO_URL'			=> 'You must enter a <strong>url</strong> for this video.',
	'NEWEST_VIDEOS'				=> 'Newest Videos',
	'NO_VIDEOS'					=> 'This page has no videos.',
	'NO_CAT_VIDEOS'				=> 'This category has no videos or does not exist.',
	'NO_USER_VIDEOS'			=> 'This user has no videos or does not exist.',
	'NO_CATEGORIES'				=> 'This page has no categories.',
	'NO_TITLE'					=> 'This page has no titles.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Return to Video Gallery',
	'SEARCH_VIDEOS'				=> 'Search Videos',
	'TOTAL_VIDEOS'				=> 'Total videos',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'No categories',
		1 => 'Total <strong>%1$d</strong> category',
		2 => 'Total <strong>%1$d</strong> categories',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'No videos',
		1 => 'Total <strong>%1$d</strong> video',
		2 => 'Total <strong>%1$d</strong> videos',
	),

	'TOTAL_VIEWS'		=> array(
		0 => 'No views',
		1 => 'Total <strong>%1$d</strong> view',
		2 => 'Total <strong>%1$d</strong> views',
	),

	'TOTAL_COMMENTS'	=> array(
		0 => 'No Comments',
		1 => 'Total <strong>%1$d</strong> comment',
		2 => 'Total <strong>%1$d</strong> comments',
	),
	'USER_VIDEOS'				=> 'All videos from User',
	'USER_VIDEOS_EXPLAIN'		=> 'Show all',
	'NO_KEY_ADMIN'				=> 'Dear board administrator, in order to use Video Gallery, you must set up a <strong>Google Public API key</strong>, go to the Administration Control Panel and follow the instructions.',
	'NO_KEY_USER'				=> 'Dear user, the gallery is unavailable. Please come back later.',
	'COMMENTS_DISABLED'			=> 'Comments are disabled.',
	'DELETE_COMMENT'			=> 'Delete comment',

	// View Video
	'FLASH_IS_OFF'				=> '[flash] is <em>OFF</em>',
	'FLASH_IS_ON'				=> '[flash] is <em>ON</em>',
	'VIDEO_ADD_BY'				=> 'Added by',
	'VIDEO_BBCODE'				=> 'BBcode',
	'VIDEO_EMBED'				=> 'Embed Video',
	'VIDEO_LINK'				=> 'Video Link',
	'VIDEO_LINKS'				=> 'Links',
	'VIDEO_LINK_YOUTUBE'		=> 'Youtube Video Link',
	'VIDEO_VIEWS'				=> 'Views',

	// Youtube video text
	'VIDEO_AUTHOR'				=> 'Author',
	'VIDEO_WATCH'				=> 'Watch on YouTube',

	//Pagination
	'LIST_COMMENT'		=>	array(
		1 => '%s comment',
		2 => '%s comments',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s video',
		2 => '%s videos',
	),
));
