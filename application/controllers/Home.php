<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }

    public function index()
    {
        $data['msg'] = '';
        $data['title'] = 'Home';
        $data['view'] = 'home';
        $areasOfSpecialties = $this->Common_model->loadAreasOfSpecialty();
        $loadUserAreasOfSpecialtySearch = $this->Common_model->loadUserAreasOfSpecialtySearch();
        $data['specialist'] = json_encode(array(
            'area_of_speciality' => $areasOfSpecialties,
            'specialist' => $loadUserAreasOfSpecialtySearch
        ));
        $this->template->load('layout', 'home', $data);
    }

    public function searchDetails()
    {
        $data['title'] = 'Search Results';
        $data['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $this->load->model('User_model');
        if (isset($_COOKIE['zipcodes'])) {
            $data['location'] = $_COOKIE['zipcodes'];
        } else {
            $data['location'] = null;
        }
        if (isset($_COOKIE['specialist']) && $_COOKIE['specialist'] != '') {
            $data['search'] = $_COOKIE['specialist'];
        } else {
            $data['search'] = null;
        }
        $data['limit'] = 20;
        $data['areas_of_specialties'] = $this->Common_model->loadAreasOfSpecialty();
        $data['load_all_tags'] = $this->Common_model->loadAllTags();
        $this->template->load('layout', 'search_results', $data);
    }

    public function searchList()
    {
        $input = $this->input->post();
        $this->load->model('User_model');
        $usersData = $this->User_model->getPaginationData($input);
        $data['page'] = $input['page'];
        $data['limit'] = $input['limit'];
        $data['paginationData'] = isset($usersData['data']) ? $usersData['data'] : array();
        $total_pages = round($usersData['count']/$data['limit']);

        $adjacents = 2;
        $data['total'] = $usersData['count'];
        $data['total_pages'] = $total_pages;
        if ($total_pages <= (1 + ($adjacents * 2))) {
            $data['start'] = 1;
            $data['end'] = $total_pages;
        } else {
            if (($data['page'] - $adjacents) > 1) {
                if (($data['page'] + $adjacents) < $total_pages) {
                    $data['start'] = ($data['page'] - $adjacents);
                    $data['end'] = ($data['page'] + $adjacents);
                } else {
                    $data['start'] = ($total_pages - (1 + ($adjacents * 2)));
                    $data['end'] = $total_pages;
                }
            } else {
                $data['start'] = 1;
                $data['end'] = (1 + ($adjacents * 2));
            }
        }
        echo json_encode($data);
    }

    public function getSpecialList()
    {
        $this->load->model('Common_model');
        $q = $this->input->get('q');
        $areasOfSpecialties = $this->Common_model->loadAreasOfSpecialty($q);
        $html = '';
        foreach ($areasOfSpecialties as $value) {
            $name = $value->name;
            if (!empty($q)) {
                $value->name = preg_replace('/[\s-]*' . $q . '[\'\s-]*/i', '<b>$0</b>', $value->name);
            }
            $html .= '<li><a href="" data-name="' . $name . '" data-id="' . $value->id . '">' . $value->name . '</a></li>';
        }
        $specialLists = $this->Common_model->loadUserAreasOfSpecialtySearch($q);
        if (!empty($specialLists) || !empty($areasOfSpecialties)) {
            $html .= '<hr>';
        }
        foreach ($specialLists as $value) {
            $name = $value->name;
            if (!empty($q)) {
                $value->name = preg_replace('/[\s-]*' . $q . '[\'\s-]*/i', '<b>$0</b>', $value->name);
            }
            $html .= '<li><a href="" data-name="' . $name . '" data-id="' . $value->id . '">' . $value->name . '</a></li>';
        }
        echo $html;
    }

    public function getZipCodes()
    {
        $this->load->model('Common_model');
        $q = $this->input->get('q');
        $viewZipCodes = $this->Common_model->viewZipCodes($q, is_numeric($q));
        $html = '';
        if (is_numeric($q)) {
            if (!empty($viewZipCodes)) {
                foreach ($viewZipCodes as $key => $value) {
                    $name = $value->name;
                    $value->name = preg_replace('/[\s-]*' . $q . '[\'\s-]*/i', '<b>$0</b>', $value->name);
//                if ($key > 10) {
//                    break;
//                }
                    $html .= '<li><a href="" data-name="' . $name . '" data-id="' . $value->id . '">' . $value->name . '</a></li>';
                }
            }
        } else {
            if (isset($viewZipCodes['cities']) && !empty($viewZipCodes['cities'])) {
                foreach ($viewZipCodes['cities'] as $value) {
                    $name = $value->name;
                    if ($value->name != '') {
                        $value->name = preg_replace('/[\s-]*' . $q . '[\'\s-]*/i', '<b>$0</b>', $value->name);
                        $html .= '<li><a href="" data-name="' . $name . '" data-id="' . $value->id . '">' . $value->name . '</a></li>';
                    }
                }
            }
            if (!empty($viewZipCodes['cities']) || !empty($viewZipCodes['states'])) {
                $html .= '<hr>';
            }
            foreach ($viewZipCodes['states'] as $value) {
                $name = $value->name;
                if ($value->name != '') {
                    $value->name = preg_replace('/[\s-]*' . $q . '[\'\s-]*/i', '<b>$0</b>', $value->name);
                    $html .= '<li><a href="" data-name="' . $name . '" data-id="' . $value->id . '">' . $value->name . '</a></li>';
                }
            }
        }
        echo $html;
    }

    public function profile()
    {

        $data['msg'] = '';
        $data['title'] = ' Business Profile';
        $data['view'] = 'profile';
        $this->load->view('content', $data);
    }

    public function specialistProfile($param)
    {
        $data['msg'] = '';
        $data['title'] = urldecode($param).'\'s Profile';
        $data['view'] = 'profile';
        $this->load->model('Common_model');
        $this->load->model('Login_model');
        $userName = explode('-',urldecode($param));
        $condition = "firstName =" . "'" . $userName[0] . "' and lastName='". (isset($userName[1]) ? $userName[1] : '')."'";
        $data['user'] = (array)$this->Login_model->getDataByCondition('users', $condition, true);
        $loginUserId = isset($_SESSION['user']['userId']) ? $_SESSION['user']['userId'] : '';
        $data['userProfile'] = $this->Common_model->loadUserProfile($data['user']['userId'],$loginUserId);
//        $data['userCompanyProfile'] = $this->Common_model->loadUserCompanyProfile($data['user']['userId']);
//        $data['userAboutMe'] = $this->Common_model->loadUserAboutMe($data['user']['userId']);
        $data['userAreasOfSpecialty'] = $this->Common_model->loadUserAreasOfSpecialty($data['user']['userId']);
        $data['userFees'] = $this->Common_model->loadUserFees($data['user']['userId']);
        $data['userTags'] = $this->Common_model->loadUserTags($data['user']['userId']);
//        $data['endorsementCount'] = $this->Common_model->endorsementCount($data['user']['userId']);
//        $data['reviewCount'] = $this->Common_model->reviewCount($data['user']['userId']);
        $data['reviewAllDetails'] = $this->Common_model->reviewAllDetails($data['user']['userId']);
        if(isset($_GET['onlyHtml']) && $_GET['onlyHtml'] == true){
            $this->load->view('viewProfileModel', $data);
        }else{
            $this->template->load('layout','viewProfile', $data);
        }
    }

    public function review_details_save(){
        $rating=$this->input->post('rating');
        $rating_for=$this->input->post('rating_for');
        $review_headline=$this->input->post('review_headline');
        $wright_review=$this->input->post('wright_review');
        $user=$_SESSION['user'];
        $insert_user_stored_proc = "CALL saveUserReview(
			{$rating_for}, 
			{$rating}, 
			{$this->db->escape($review_headline)},
			{$this->db->escape($wright_review)},
			{$user['userId']})";
        $result = $this->db->query($insert_user_stored_proc);
        echo 'true';
    }

    public function endorse_details_save(){
        $rating_for=$this->input->post('rating_for');
        $wright_review=$this->input->post('wright_review');
        $user=$_SESSION['user'];
        $insert_user_stored_proc = "CALL saveUserEndorsement(
			{$rating_for}, 
			{$this->db->escape($wright_review)},
			{$user['userId']})";
        $result = $this->db->query($insert_user_stored_proc);
        echo 'true';
    }

    public function edit_profile()
    {

        $data['msg'] = '';
        $data['title'] = 'Account';
        $data['view'] = 'editprofile';
        $this->load->view('content', $data);
    }

    public function passand_security()
    {

        $data['msg'] = '';
        $data['title'] = 'Password & Security';
        $data['view'] = 'passand_security';
        $this->load->view('content', $data);
    }

    public function change_password()
    {
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
            $data['view'] = 'login/change_password';
            $this->load->view('content', $data);
        }
    }

    public function sendReviewToUser($user){
        $data['msg'] = '';
        $data['title'] = urldecode($user).'\'s Profile';
        $data['view'] = 'profile';
        $this->load->model('Common_model');
        $this->load->model('Login_model');
        $userName = explode('-',urldecode($user));
        $condition = "firstName =" . "'" . $userName[0] . "' and lastName='". (isset($userName[1]) ? $userName[1] : '')."'";
        $data['user'] = (array)$this->Login_model->getDataByCondition('users', $condition, true);
        $loginUserId = isset($_SESSION['user']['userId']) ? $_SESSION['user']['userId'] : '';
        $data['userProfile'] = $this->Common_model->loadUserProfile($data['user']['userId'],$loginUserId);
        $this->template->load('layout','sendReviewDetails', $data);
    }

    public function sendEndorsementToUser($user){
        $data['msg'] = '';
        $data['title'] = urldecode($user).'\'s Profile';
        $data['view'] = 'profile';
        $this->load->model('Common_model');
        $this->load->model('Login_model');
        $userName = explode('-',urldecode($user));
        $condition = "firstName =" . "'" . $userName[0] . "' and lastName='". (isset($userName[1]) ? $userName[1] : '')."'";
        $data['user'] = (array)$this->Login_model->getDataByCondition('users', $condition, true);
        $loginUserId = isset($_SESSION['user']['userId']) ? $_SESSION['user']['userId'] : '';
        $data['userProfile'] = $this->Common_model->loadUserProfile($data['user']['userId'],$loginUserId);
        $this->template->load('layout','sendEndorsementDetails', $data);
    }

    public function sendMessageToUser($user){
        if(!isset($_SESSION['user'])){
            $path = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $this->load->library('uuid');
            $token = $this->uuid->v4();
            $data = array(
                'id' => $token,
                'redirectURL' => $path
            );
            $this->db->set($data);
            $query=$this->db->get_compiled_insert('redirects');
            $this->db->query($query);
            $_SESSION['rt'] = $token;
            redirect('consumer/login');
        }
        $data['msg'] = '';
        $data['title'] = urldecode($user).'\'s Profile';
        $data['view'] = 'profile';
        $this->load->model('Common_model');
        $this->load->model('Login_model');
        $userName = explode('-',urldecode($user));
        $condition = "firstName =" . "'" . $userName[0] . "' and lastName='". (isset($userName[1]) ? $userName[1] : '')."'";
        $data['user'] = (array)$this->Login_model->getDataByCondition('users', $condition, true);
        $loginUserId = isset($_SESSION['user']['userId']) ? $_SESSION['user']['userId'] : '';
        $data['userProfile'] = $this->Common_model->loadUserProfile($data['user']['userId'],$loginUserId);
        $this->template->load('layout','sendMessageToUser', $data);
    }
}
