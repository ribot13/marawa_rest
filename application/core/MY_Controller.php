<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of MY_Controller
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : MY_Controller
 * @Module Name : Core Controller
 * @Module Title : Core Controller
 *
 */
class MY_Controller extends CI_Controller {

    public $require_login = true;

    public function __construct() {
        parent::__construct();
    }

    protected function login_check($user = null, $pass = null) {
        $this->load->model('auth/Login_model', 'lm');
        $user = is_null($user) ? $_SERVER['PHP_AUTH_USER'] : $user;
        $pass = is_null($pass) ? $_SERVER['PHP_AUTH_PW'] : $pass;
        $this->lm->login_check($user, $pass);
    }

    public function render_json($data) {
        if ($this->require_login)
            if ($this->login_check() === false)
                die();
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

}
