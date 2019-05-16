<?php
use phpDocumentor\Reflection\Types\Boolean;

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
		$data['user_fees'] = $this->Common_model->loadUserFees($user['userId']);
		$data['areas_of_specialtys'] = $this->Common_model->loadUserAreasOfSpecialty($user['userId']);
		$data['user_about_me'] = $this->Common_model->loadUserAboutMe($user['userId']);
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
		$user=$_SESSION['user'];
		$insert_user_stored_proc = "CALL updateUserAreaOfSpecialty(
			{$user['userId']}, 
			{$areasOfSpeciality},
			{$is_checked})";
        $result = $this->db->query($insert_user_stored_proc);
		// redirect('/my-business-profile');
		return true;
	}


	public function remove_fees_data(){
		$fees_id=$this->input->post('fees_id');
		$insert_user_stored_proc = "CALL deleteUserFee(
			{$fees_id})";
        $result = $this->db->query($insert_user_stored_proc);
		echo 1;
	}


	public function offer_free_consultations(){
		$is_checked=$this->input->post('is_checked');
		$user=$_SESSION['user'];
		$insert_user_stored_proc = "CALL updateUserFreeConsultation(
			{$user['userId']}, 
			{$is_checked})";
        $result = $this->db->query($insert_user_stored_proc);
		// redirect('/my-business-profile');
		return true;
	}

	public function save_consultancy_fee(){
		$consultancy_fee_type=$this->input->post('consultancy_fee_type');
		$consultancy_amount=$this->input->post('consultancy_amount');
		$consultancy_billing_type=$this->input->post('consultancy_billing_type');
		$user=$_SESSION['user'];
		$feeTypeId = null;
		$billingTypeId = null;
		$feeTypeDetail = $this->Common_model->loadUserFeeFromName($consultancy_fee_type);
		$billingTypeDetail = $this->Common_model->loadUserBillingFromName($consultancy_billing_type);
		
		if(isset($feeTypeDetail->id)){
			$feeTypeId = $feeTypeDetail->id;
		}else{
			$insertFeeType = "INSERT into fee_types SET feeTypeName='{$consultancy_fee_type}', createdByUserId={$user['userId']},createdOn=now()";
			$this->db->reconnect();
			$this->db->query($insertFeeType);
			$this->db->close();
			$this->db->reconnect();
			$feeTypeDetailResult=$this->db->query('select * from fee_types ORDER BY id DESC LIMIT 1');
			$this->db->close();
			$feeTypeDetail = $feeTypeDetailResult->row();
			$feeTypeId = $feeTypeDetail->id;
		}
		if(isset($billingTypeDetail->id)){
			$billingTypeId = $billingTypeDetail->id;
		}else{
			$insertFeeType = "INSERT into billing_types SET billingTypeName='{$consultancy_billing_type}', createdByUserId={$user['userId']},createdOn=now()";
			$this->db->reconnect();
			$this->db->query($insertFeeType);
			$this->db->close();
			$this->db->reconnect();
			$billingTypesDetailResult=$this->db->query('select * from billing_types ORDER BY id DESC LIMIT 1');
			$this->db->close();
			$billingTypesDetail = $billingTypesDetailResult->row();
			$billingTypeId = $billingTypesDetail->id;
		}

		$insert_user_stored_proc = "CALL saveUserFee(
			{$user['userId']}, 
			{$billingTypeId},
			{$feeTypeId},
			'{$consultancy_amount}')";
		$result = $this->db->query($insert_user_stored_proc);
		$dataUserFees = $this->Common_model->loadUserFees($user['userId']);
		$html = "";
		foreach($dataUserFees as $fee){
			$html .='<div class="form-row draggable-item" data-id="'.$fee->id.'" id="fees_list_'.$fee->id.'">
			<div class="col">
				<div class="row no-gutters">
					<div class="col"><label>'.$fee->feeTypeName.'</label></div>
					<div class="col-3"><label>$'.$fee->amount.'/'.$fee->billingTypeName.'</label></div>
				</div>
			</div>
			<div class="col-1 d-flex align-items-center justify-content-center">
				<a data-id="'.$fee->id.'" class="remove_fees_data"><i class="fas fa-minus-circle" ></i></a>
			</div>
		</div>';
		}
		echo $html;
	}

	public function update_sequence_fees(){
		$fees_sequence=$this->input->post('fees_sequence');
		
		foreach($fees_sequence as $key => $sequence){
			$this->Common_model->setUpdatedSequence($sequence,$key+1);
		}
	}

	public function save_about_me(){
		$sortDescription=$this->input->post('sort_description');
		$longDescription=$this->input->post('long_description');
		$user=$_SESSION['user'];
		$insert_user_stored_proc = "CALL saveUserAboutMe(
			{$user['userId']}, 
			'{$sortDescription}',
			'{$longDescription}')";
        $result = $this->db->query($insert_user_stored_proc);
		redirect('/my-business-profile');
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
