<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of Auth
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : Auth
 * @Module Name : Auth
 * @Module Title : User
 *
 */
class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth/user_model', 'dbm');
    }

    public function index() {
        if ($this->input->method() == 'get') {
            $id = $this->input->get('id');
            $data = $this->dbm->get($id);
        }
        if ($this->input->method() == 'view') {
            $conds=$this->input->input_stream();
            $data = $this->dbm->all($conds);
        }
        $this->render_json($data);
    }

    public function save() {
        $result['status'] = false;
        if ($this->input->method() == 'put') {
            $result['msg'] = 'Data tersebut gagal ditambahkan!';
        }
        if ($this->input->method() == 'patch') {
            $result['msg'] = 'Data tersebut gagal diupdate!';
        }
        if ($this->input->method() == 'delete') {
            $result['msg'] = 'Data tersebut gagal dihapus!';
        }
        $this->render_json($result);
    }

}
