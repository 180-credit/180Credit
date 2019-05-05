<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->model('Login_model'); 
    }

    public function login_service_provider() {
        $data['title'] = 'Service Provider access';
        $data['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $this->template->load('layout', 'login/login_service_provider', $data);
    }

    public function login_consumer() {
        $data['title'] = 'Consumer access';
        $data['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
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
    

    public function signup_store(){
        $this->load->library('uuid');
        $token = $this->uuid->v4();
        $data = [
            'firstName'=>$this->input->post('first_name'),
            'lastName'=>$this->input->post('last_name'),
            '180creditUserType'=> $this->input->post('user_type'),
            'userEmail'=>$this->input->post('email'),
            'active'=>1,
            'userStatus'=>1,
            'userPassword'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'verificationToken'=>$token
        ];
        $linkToken = base_url().'verify/'.$token;
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
            /*$insert_id = $this->db->insert_id();
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
            $this->session->set_userdata('logged_in', $session_data)*/
            $this->session->set_flashdata('success', 'An verification mail has been sent to your mail, please verify your account.');
        }
        else{
            $this->session->set_flashdata('success', 'An verification mail has been sent to your mail, please verify your account.');
        }   
        if($this->input->post('user_type') == "1"){
            redirect('/login/login_service_provider');
        }else{
            redirect('/login/login_consumer');
        }
    }
    
    public function login_post(){
        $condition = "userEmail =" . "'" . $this->input->post('email') . "'";
        $result = (array)$this->Login_model->getDataByCondition('users',$condition,true);
        if(password_verify($this->input->post('password'), $result['userPassword'])){
            $this->session->set_flashdata('success', 'You are login successfully.');
            redirect('/login/success_screen');
        }
        else {
            if($result['180creditUserType'] == 1){
                $this->session->set_flashdata('error', 'Email and password mismatch.');
                redirect('/login/login_service_provider');
            }
            else {
                $this->session->set_flashdata('error', 'Email and password mismatch.');
                redirect('/login/login_consumer');
            }
        }
    }

    public function success_screen() {
        $data['title'] = 'Success';
        $data['msg'] = isset($_SESSION['success']) ? $_SESSION['success'] : '';
        $this->template->load('layout', 'login/success_screen', $data);
    }

    public function user_exists(){
        $condition = "userEmail =" . "'" . $this->input->post('email') . "'";
        $result = (array)$this->Login_model->getDataByCondition('users',$condition,true);
        
        if(empty($result)){
            echo "true";
        }else{
            echo "false";
        }
    }
}
