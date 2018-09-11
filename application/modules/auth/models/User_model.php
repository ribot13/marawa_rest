<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of User_model
 *
 * @author : ak.ramdhani@gmail.com
 * @Class Name : User_model
 * @Table Name : users
 *
 */
class User_model extends MY_Model {

    public $tbl = 'users';
    public $insertid;
    public $id_col = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function all($conds = null) {
        if (is_array($conds) && count($conds) > 0) {
            foreach ($conds as $key => $val) {
                $this->db->where($key, $val, false);
            }
        }
        $q = $this->db->get($this->tbl);
        if ($result = $q->result()) {
            return $result;
        }
        return false;
    }

    public function get($id) {
        $q = $this->db->where('id', $id)->get($this->tbl);
        if ($row = $q->row()) {
            unset($row->password, $row->remember_token);
            return $row;
        }
        return false;
    }

}
