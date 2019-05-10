<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/helpers/Authenticate.php';

class Account extends CI_Controller {
	use Authenticate;
	function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        $this->load->database();
		$this->load->model('Login_model');
		$this->load->model('Common_model');
		if(!$this->checkLogin()){
            redirect('/consumer/login');
        } 
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
		$data['title']='My Business profile';
		$data['areas_of_specialty'] = $this->Common_model->loadAreasOfSpecialty();
		$this->template->load('layout', 'account/business_profile', $data);
	}

	public function store_business_profile(){
		print_r($_POST);
		die();
	}

	public function change_password()
	{
		$data['title']='Password & Security';
		$this->template->load('layout', 'account/pwd_change', $data);
	}

	public function store_user()
	{
		$data=[
			'firstName'=> $this->input->post('first_name'),
			'lastName'=>$this->input->post('last_name'),
			'userEmail'=>$this->input->post('email'),
			'isCreditRepairService' => isset($_POST['isCreditRepairService']) ? $_POST['isCreditRepairService'] : 0 ,
			'isCreditRepairIndustry' => isset($_POST['isCreditRepairIndustry']) ? $_POST['isCreditRepairIndustry'] : 0 ,
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
