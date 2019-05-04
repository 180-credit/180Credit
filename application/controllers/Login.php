<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('email');     
	}	
	
    public function index() {
        
        $data['msg'] = '';
        $data['title'] = 'Consumer access';
        $data['view'] = 'login/login_consumer';
        $this->load->view('content', $data);
    }
	
	public function login_service_provider() {
        
        $data['msg'] = '';
        $data['title'] = 'Service Provider Access';
        $data['view'] = 'login/login_service_provider';
        $this->load->view('content', $data);
    }
	
	public function signup_consumer() {
        
        $data['msg'] = '';
        $data['title'] = 'Create a consumer account';
        $data['view'] = 'login/signup_consumer';
        $this->load->view('content', $data);
    }
	
	public function signup_service_provider() {
        
        $data['msg'] = '';
        $data['title'] = 'Create a service provider account';
        $data['view'] = 'login/signup_service_provider';
        $this->load->view('content', $data);
    }
	
	public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    /* public function forgotpassword() {
        if (isset($_POST) && !empty($_POST)) {
            $mailid = $_POST['email'];
            $new_password = $this->common->generatePassword();
            $message = 'New Password : ' . $new_password;

            $data = array('password' => md5($new_password));            
            $this->login_model->updatePassword(1, $data);
            
            $this->common->sendMail($mailid, PROJECT_NAME . ' | New Password', $message);
            redirect('login');
        } else {
            $this->load->view('login/forgotpassword');
        }
    } */
}
