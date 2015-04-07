<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

namespace dmzx\youtubegallery\core;

class functions_youtubegallery
{
	/**
	 * CONSTANTS SECTION
	 *
	 * To access them, you need to use the class.
	 *
	 */
	const VIDEO_CAT_TABLE	= 'video_cat';
	const VIDEO_TABLE	= 'video';
	/**
	 * End of constants
	 */

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\cache\service */
	protected $cache;

	protected $table_prefix;

	/**
	 * Constructor
	 *
	 * @param \phpbb\template\template			$template
	 * @param \phpbb\user						$user
	 * @param \phpbb\auth\auth					$auth
	 * @param \phpbb\db\driver\driver_interface	$db
	 * @param \phpbb\cache\service				$cache
	 * @param									$table_prefix
	 */
	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\log\log_interface $log, \phpbb\db\driver\driver_interface $db, \phpbb\cache\service $cache, $table_prefix)
	{
		$this->template = $template;
		$this->user = $user;
		$this->auth = $auth;
		$this->db = $db;
		$this->cache = $cache;
		$this->phpbb_log = $log;
		$this->table_prefix = $table_prefix;
	}


	
}