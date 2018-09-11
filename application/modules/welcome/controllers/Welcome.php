<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of Welcome
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : Welcome
 * @Module Name : Welcome
 * @Module Title : Welcome
 *
 */
class Welcome extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->require_login=true;
    }

    public function index() {
        $this->load->model('auth/Login_model', 'lm');
        echo '<h1>Hello</h1>';
        echo $this->lm->_hashMe("kanjuds123");
    }

}
