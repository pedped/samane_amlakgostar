<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Memento plugins Controller
 *
 * This class handles plugins management related functionality
 *
 * @package		Admin
 * @subpackage	plugins
 * @author		dbcinfotech
 * @link		http://amlakgostar.ir
 */
require_once'phone_core.php';

class Phone extends Phone_core {

    public function __construct() {
        parent::__construct();
    }

}
