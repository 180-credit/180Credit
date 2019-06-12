<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getLogin($email, $pwd) {
        return $this->db->query("select * from " . $this->common->getUserTable() . " WHERE email_id='" . $email . "' AND password='" . $pwd . "' AND active=1")->row();
    }
    
    public function getDataByCondition($table, $condition, $first = false) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($condition);
        $result = $this->db->get();
        if ($first == true) {
            return $result->row();
        } else {
            return $result;
        }
    }

}
