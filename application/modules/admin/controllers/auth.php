<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Memento Auth Controller
 *
 * This class handles Auth management related functionality
 *
 * @package		Admin
 * @subpackage	Auth
 * @author		dbcinfotech
 * @link		http://amlakgostar.ir
 */
require_once'auth_core.php';
class Auth extends Auth_core {

	public function __construct()
	{
		parent::__construct();
	}
}