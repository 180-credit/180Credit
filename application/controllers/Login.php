<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->library('email');
    }

    public function login_service_provider() {
        $data['title'] = 'Service Provider access';
        $this->template->load('layout', 'login/login_service_provider', $data);
    }

    public function login_consumer() {
        $data['title'] = 'Consumer access';
        $this->template->load('layout', 'login/login_consumer', $data);
    }

    public function signup_consumer() {
        $data['title'] = 'Consumer access';
        $this->template->load('layout', 'login/signup_consumer', $data);
    }

    public function signup_service_provider() {
        $data['title'] = 'Service Provider access';
        $this->template->load('layout', 'login/signup_service_provider', $data);
    }

}
