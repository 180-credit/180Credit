<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();                
        //$this->gdb->checkagentlogin();
        //$this->load->model('user_model');
    }

    public function index() {
        
        $data['msg'] = '';
        $data['title'] = 'Account';
        $data['view'] = 'myaccount';
        $this->load->view('content', $data);
    }
	
	public function profile() {
        
        $data['msg'] = '';
        $data['title'] = 'My Business Profile';
        $data['view'] = 'my-bis-pro';
        $this->load->view('content', $data);
    }
	
	public function editprofile() {
        
        $data['msg'] = '';
        $data['title'] = 'Account';
        $data['view'] = 'editprofile';
        $this->load->view('content', $data);
    }
	
	public function passandsecurity() {
        
        $data['msg'] = '';
        $data['title'] = 'Password & Security';
        $data['view'] = 'my-pass-sec';
        $this->load->view('content', $data);
    }
	
	public function change_password() {
        if (isset($_POST) && !empty($_POST)) {
            $data = array(
                'password' => md5($this->input->post('newpassword'))
            );
            $id = $this->session->userdata('user_id');
            $this->login_model->updatePassword($id, $data);
            redirect('login');
        } else {
			$data['msg'] = '';
			$data['title'] = 'Password & Security';
            $data['view'] = 'login/changepassword';
            $this->load->view('content', $data);
        }
    }
}
