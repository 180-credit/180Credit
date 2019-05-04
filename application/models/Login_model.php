<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function test() {
		echo "test";
	}
    public function getLogin($email, $pwd) {
		return $this->db->query("select * from ".$this->common->getUserTable()." WHERE email_id='".$email."' AND password='".$pwd."' AND active=1")->row();
    }
}