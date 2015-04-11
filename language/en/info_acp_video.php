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
	'VIDEO_INDEX'			=> 'Video Gallery',
	'VIDEO_SELECT_CAT'		=> 'Select a category',
	'VIDEO_SUBMIT'			=> 'New Video',
	'VIDEO_URL'				=> 'Enter Video URL',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Help and Suggestions',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Browse to <a href="https://www.youtube.com/">Youtube.com</a>, search your favorite videos.</li>
		<li>Copy the video URL, paste it in the field above, choose the category and submit the form.</li>
		<li>You can use <strong>youtube.com</strong> and <strong>youtu.be</strong>, both are accepted by the Extension.</li>
	</ul>
	<br />
	<strong>Warning: this page isn’t for uploading videos to Youtube!</strong>',
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
	'VIDEO_DELETED'			=> 'This video has been deleted successfully.',
	'PAGE_RETURN'			=>'%sReturn to the videos page%s',
	'DELETE_VIDEO'			=> 'Are you sure you want to delete this video?',
	'MY_VIDEOS'				=> 'View your videos',
	'NEED_VIDEO_URL'		=> 'You must enter a <strong>url</strong> for this video.',
	'NEWEST_VIDEOS'			=> 'Newest Videos',
	'NO_VIDEOS'				=> 'This page has no videos.',
	'NO_CATEGORIES'			=> 'This page has no categories.',
	'RETURN_TO_VIDEO_INDEX' => 'Return to Video Gallery',
	'SEARCH_VIDEOS'			=> 'Search Videos',
	'TOTAL_CATEGORIES_OTHER'=> 'Total categories <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Total categories <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Total videos',
	'TOTAL_VIDEOS_OTHER'	=> 'Total videos <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Total videos <strong>0</strong>',
	'USER_VIDEOS'			=> 'Search user’s videos',

	// ACP
	'ACP_VIDEO'				=> 'Video Gallery',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Video Settings',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'General Settings',
	'ACP_VIDEO_ENABLE'		=> 'Enable Videos Page',
	'ACP_VIDEO_CATEGORY'	=> 'Video Categories',
	'ACP_VIDEO_HEIGHT'		=> 'Video Height',
	'ACP_VIDEO_WIDTH'		=> 'Video Width',
	'ACP_VERSION_CURRENT'	=> 'Version',

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

	// Install
	'INSTALL_TEST_CAT'		=> 'Uncategorized',
	
	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Can view Video Gallery',
	'ACL_U_VIDEO_VIEW'		=> 'Can view videos',
	'ACL_U_VIDEO_DELETE'	=> 'Can delete own videos',
	'ACL_U_VIDEO_POST'		=> 'Can post videos',
	
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
));

