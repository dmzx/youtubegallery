<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2019 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\controller;

use dmzx\youtubegallery\core\functions;
use phpbb\config\config;
use phpbb\template\template;
use phpbb\controller\helper;
use phpbb\user;
use phpbb\auth\auth;
use phpbb\pagination;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\request\request_interface;

class ucp_controller
{
	/** @var functions */
	protected $functions;

	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var helper */
	protected $helper;

	/** @var user */
	protected $user;

	/** @var auth */
	protected $auth;

	/** @var pagination */
	protected $pagination;

	/** @var db_interface */
	protected $db;

	/** @var request_interface */
	protected $request;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $video_table;

	protected $video_cat_table;

	/**
	* Constructor
	*
	* @param functions			$functions
	* @param config				$config
	* @param template			$template
	* @param helper				$helper
	* @param user				$user
	* @param auth				$auth
	* @param pagination			$pagination
	* @param db_interface		$db
	* @param request_interface	$request
	* @param string				$root_path
	* @param string				$php_ext
	* @param string 			$video_table
	* @param string 			$video_cat_table
	*
	*/
	public function __construct(
		functions $functions,
		config $config,
		helper $helper,
		template $template,
		user $user,
		auth $auth,
		pagination $pagination,
		db_interface $db,
		request_interface $request,
		$root_path,
		$php_ext,
		$video_table,
		$video_cat_table
	)
	{
		$this->functions 			= $functions;
		$this->config 				= $config;
		$this->template 			= $template;
		$this->helper 				= $helper;
		$this->user 				= $user;
		$this->auth 				= $auth;
		$this->pagination 			= $pagination;
		$this->db 					= $db;
		$this->request 				= $request;
		$this->root_path 			= $root_path;
		$this->php_ext				= $php_ext;
		$this->video_table 			= $video_table;
		$this->video_cat_table 		= $video_cat_table;
	}

	public function main()
	{
		if ($this->user->data['user_id'] == ANONYMOUS || $this->user->data['is_bot'] || !$this->auth->acl_get('u_video_view') || !$this->config['enable_video_global'])
		{
			return;
		}

		$sql_start 	= $this->request->variable('start', 0);
		$sql_limit 	= $this->request->variable('limit', $this->config['videos_per_page']);
		$base_url = append_sid("{$this->root_path }ucp.{$this->php_ext}?i=-dmzx-youtubegallery-ucp-youtubegallery_ucp_module");

		$sql_ary = [
			'SELECT'	=> 'v.*,
			ct.video_cat_title,ct.video_cat_id,
			u.username,u.user_colour,u.user_id',
			'FROM'		=> [
				$this->video_table			=> 'v',
				$this->video_cat_table		=> 'ct',
				USERS_TABLE			=> 'u',
			],
			'WHERE'		=> 'u.user_id = v.user_id
				AND ct.video_cat_id = v.video_cat_id
				AND u.user_id = ' . (int) $this->user->data['user_id'],
			'ORDER_BY'	=> 'v.video_id DESC',
		];

		$sql = $this->db->sql_build_query('SELECT', $sql_ary);
		$result = $this->db->sql_query_limit($sql, $sql_limit, $sql_start);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$video_info = $this->functions->youtube_analytics(["id" => censor_text($row['youtube_id'])]);

			$this->template->assign_block_vars('video', [
				'VIDEO_TITLE'					=> $row['video_title'],
				'VIDEO_CAT_ID'					=> $row['video_cat_id'],
				'VIDEO_CAT_TITLE'				=> $row['video_cat_title'],
				'VIDEO_VIEWS'					=> $row['video_views'],
				'VIDEO_DURATION'				=> $row['video_duration'],
				'VIDEO_VIEWS_YOUTUBE'			=> isset($video_info['views']) ? $video_info['views'] : '',
				'VIDEO_VIEWS_YOUTUBE_LIKE'		=> isset($video_info['likes']) ? $video_info['likes'] : '',
				'VIDEO_VIEWS_YOUTUBE_DISLIKE'	=> isset($video_info['dislikes']) ? $video_info['dislikes'] : '',
				'VIDEO_VIEWS_YOUTUBE_COMMENTS'	=> isset($video_info['comments']) ? $video_info['comments'] : '',
				'U_CAT'							=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'cat', 'id' => $row['video_cat_id']]),
				'VIDEO_TIME'					=> $this->user->format_date($row['create_time']),
				'VIDEO_ID'						=> censor_text($row['video_id']),
				'U_VIEW_VIDEO'					=> $this->helper->route('dmzx_youtubegallery_controller', ['mode' => 'view', 'id' => $row['video_id']]),
				'VIDEO_THUMBNAIL'				=> 'https://img.youtube.com/vi/' . censor_text($row['youtube_id']) . '/hqdefault.jpg'
			]);
		}
		$this->db->sql_freeresult($result);

		$this->pagination->generate_template_pagination($base_url, 'pagination', 'start', $this->functions->videorow_user_id($this->user->data['user_id']), $sql_limit, $sql_start);

		$this->functions->assign_authors();

		$this->template->assign_vars([
			'ENABLE_VIDEO_YOUTUBE_STATS'		=> $this->config['enable_video_youtube_stats'],
			'TOTAL_VIDEOS'						=> $this->user->lang('LIST_VIDEO', (int) $this->functions->videorow_user_id($this->user->data['user_id'])),
			'VIDEO_FOOTER_VIEW'					=> true,
			'VIDEO_VERSION'						=> $this->config['youtubegallery_version'],
		]);
	}
}
