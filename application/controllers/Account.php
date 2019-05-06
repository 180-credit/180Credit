<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Login_model'); 
    }

	public function index()
	{
		$data['title']='My account';
		$this->template->load('layout', 'account/my_account', $data);
	}

	public function edit_profile()
	{
		$data['title']='My account edit';
		$this->template->load('layout', 'account/account_edit', $data);
	}

	public function my_business_profile()
	{
		$data['title']='My account edit';
		$this->template->load('layout', 'account/business_profile', $data);
	}

	public function change_password()
	{
		$data['title']='My account edit';
		$this->template->load('layout', 'account/pwd_change', $data);
	}

	public function store_user()
	{
		$data=[
			'firstName'=> $this->input->post('first_name'),
			'lastName'=>$this->input->post('last_name')
		];
		$path = 'assets/profile_images';
		if(isset($_FILES['profile_image']['name']) && !empty($_FILES['profile_image']['name'])){
			$fileName = $path.'/'.time().'.'.pathinfo($_FILES['profile_image']['name'])['extension'];
			move_uploaded_file($_FILES['profile_image']['tmp_name'],FCPATH.$fileName);
		}
		// $oldImage =$this->input->post('old_profile_image');
		if(isset($fileName)){
			$data = array_merge($data,[
				'profile_image'=>$fileName
			]);
		}
		$this->db->where('userId', $this->input->post('user_id'));
		$this->db->update('users', $data);
		$condition = "userEmail =" . "'" . $this->input->post('email') . "'";
		$result = (array)$this->Login_model->getDataByCondition('users',$condition,true);
		$this->session->set_userdata('user', $result);
		redirect('/my-account');
	}
}
