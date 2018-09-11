<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of Welcome_model
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : Welcome_model
 * @Table Name : dashboard
 *
 */
 
 class Welcome_model extends MY_Model {

    public $tbl = 'dashboard';
    public $insertid;
    public $id_col = 'id';

    public function __construct() {
        parent::__construct();
    }

    
}