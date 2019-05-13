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
		$user= $_SESSION['user'];
		$data['load_billing_types'] = $this->Common_model->loadBillingTypes();
		$data['load_fee_types'] = $this->Common_model->loadFeeTypes();
		$data['states'] = $this->Common_model->loadStates();
		$data['user_company_profile'] = $this->Common_model->loadUserCompanyProfile($user['userId']);
		$data['areas_of_specialtys'] = $this->Common_model->loadUserAreasOfSpecialty($user['userId']);
		$this->template->load('layout', 'account/business_profile', $data);
	}

	public function store_business_profile(){
		$user=$_SESSION['user'];
		$insert_user_stored_proc = "CALL saveUserCompanyProfile(
			{$user['userId']}, 
			'{$this->input->post('company_name')}',
			 '{$this->input->post('street_address')}',
			  '{$this->input->post('city')}',
			  {$this->input->post('state')},
			  '{$this->input->post('zip_code')}',
			  '{$this->input->post('phone_number')}',
			  '{$this->input->post('website_url')}',
			  '{$this->input->post('scheduling_url')}',
			  '{$this->input->post('facebook_url')}',
			  '{$this->input->post('twitter_url')}',
			  '{$this->input->post('youtube_url')}',
			  '{$this->input->post('linkedin_url')}',
			  '{$this->input->post('instagram_url')}')";
        $result = $this->db->query($insert_user_stored_proc);
		redirect('/my-business-profile');
	}

	public function save_area_of_speciality(){
		$areasOfSpeciality=$this->input->post('areas_of_speciality');
		$is_checked=$this->input->post('is_checked');
		$is_checked = $is_checked===true ? 1 :0;
		$user=$_SESSION['user'];
		$insert_user_stored_proc = "CALL  updateUserAreaOfSpecialty(
			{$user['userId']}, 
			{$areasOfSpeciality},
			{$is_checked})";
        $result = $this->db->query($insert_user_stored_proc);
		// redirect('/my-business-profile');
		return true;
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
