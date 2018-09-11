<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of Login_model
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : Login_model
 * @Table Name : users
 *
 */
class Login_model extends MY_Model {

    public $tbl = 'users';
    public $insertid;
    public $id_col = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function login_check($user, $pass) {
        
        if ($q = $this->db->where('username', $user)->get($this->tbl)) {
            $row=$q->row();
            
            if (password_verify($pass, $row->password)){
                $data['last_login']=date('Y-m-d H:i:s');
                return true;
            }
        }
        return false;
    }

    public function _hashMe($data) {
        return password_hash($data, PASSWORD_BCRYPT);
    }

}
