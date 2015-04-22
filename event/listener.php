<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	protected $phpbb_root_path;

	protected $phpEx;

	/** @var string */
	protected $table_prefix;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, $root_path, $phpEx, $table_prefix)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->template = $template;
		$this->controller_helper = $controller_helper;
		$this->user = $user;
		$this->db = $db;
		$this->root_path = $root_path;
		$this->phpEx = $phpEx;
		$this->table_prefix = $table_prefix;

	}

	static public function getSubscribedEvents()
	{
		return array(
		'core.viewonline_overwrite_location'	=> 'add_page_viewonline',
		'core.user_setup'   => 'load_language_on_setup',
		'core.page_header'	=> 'add_page_header_link',

		);
	}

	public function add_page_viewonline($event)
	{
	global $user, $phpbb_container, $phpEx;
	   if (strrpos($event['row']['session_page'], 'app.' . $phpEx . '/video') === 0)
	   {
		$event['location'] = $user->lang('VIDEO_INDEX');
		$event['location_url'] = $phpbb_container->get('controller.helper')->route('dmzx_youtubegallery_controller');
	   }
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'U_VIDEO' => $this->controller_helper->route('dmzx_youtubegallery_controller'),
		));
	}

		public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'dmzx/youtubegallery',
			'lang_set' => 'info_acp_video',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

}
