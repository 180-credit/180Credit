<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url'); 

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
    

    public function signup_cunsumer_store(){
        $trackToken = rand(100000,999999);
        $data = [
            'firstName'=>$this->input->post('first_name'),
            'lastName'=>$this->input->post('last_name'),
            '180creditUserType'=>2,
            'userEmail'=>$this->input->post('email'),
            'userPassword'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'verificationToken'=>$trackToken
        ];
        $linkToken = base_url().'verify?email='.$this->input->post('email').'&token='.password_hash($trackToken,PASSWORD_DEFAULT);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
                Hello '.$this->input->post('first_name').',<br><br>  
                Please click the link below to verify your email address.<br>  
                <a href="'.$linkToken.'">'.$linkToken.'</a>.
                <br>
                <br>
                Thank you,<br> 180Credit.com 
                </body>
                </html>';
        $data = $this->db->insert('users',$data);
        $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.sendgrid.net',
                'smtp_user' => '180credit',
                'smtp_pass' => 'bD8mbh576789k2g',
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => "html"
            ));

            $this->email->from('donotreply@180credit.com', '180Credit');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Welcome to your 180Credit account');
            $this->email->message($html);
            $this->email->send();

        if( $this->input->post('keep_login')){
            $insert_id = $this->db->insert_id();
            $condition = "userId =" . "'" . $insert_id . "'";
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where($condition);
            $this->db->limit(1);
            $result = $this->db->get()->row();
            $session_data = array(
                'username' => $result->userEmail,
                'email' => $result->userEmail,
            );
            $this->session->set_userdata('logged_in', $session_data);
            redirect('/login/login_consumer');
        }
        else{
            redirect('/login/login_consumer');
        }
    }
}
