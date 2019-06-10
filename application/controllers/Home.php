<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Common_model');
        $data['msg'] = '';
        $data['title'] = 'Home';
        $data['view'] = 'home';
        $areasOfSpecialties = $this->Common_model->loadAreasOfSpecialty();
        $loadUserAreasOfSpecialtySearch = $this->Common_model->loadUserAreasOfSpecialtySearch();
        $data['specialist'] = json_encode(array(
            'area_of_speciality'=>$areasOfSpecialties,
            'specialist'=> $loadUserAreasOfSpecialtySearch
        ));
        $this->template->load('layout', 'home', $data);
    }


    public function getSpecialList()
    {
        $this->load->model('Common_model');
        $q = $this->input->get('q');
        $areasOfSpecialties = $this->Common_model->loadAreasOfSpecialty($q);
        $html = '';
        foreach ($areasOfSpecialties as $value){
            if(!empty($q)){
                $value->name = preg_replace('/\S*('. $q .'\S*)/i', '<b>$1</b>', $value->name);
            }
            $html.='<li><a data-id="'.$value->id.'">'.$value->name.'</a></li>';
        }
        $specialLists = $this->Common_model->loadUserAreasOfSpecialtySearch($q);
        if(!empty($specialLists) || !empty($areasOfSpecialties)){
            $html .='<hr>';
        }
        foreach ($specialLists as $value){
            if(!empty($q)) {
                $value->name = preg_replace('/\S*(' . $q . '\S*)/i', '<b>$1</b>', $value->name);
            }
            $html.='<li><a data-id="'.$value->id.'">'.$value->name.'</a></li>';
        }
        echo $html;
    }

    public function getZipCodes()
    {
        $this->load->model('Common_model');
        $q = $this->input->get('q');
        $viewZipCodes = $this->Common_model->viewZipCodes($q);
        $html = '';
        foreach ($viewZipCodes as $key => &$value){
            $value->name = preg_replace('/\S*('. $q .'\S*)/i', '<b>$1</b>', $value->name);
            if($key > 10){
                break;
            }
            $html.='<li><a data-id="'.$value->id.'">'.$value->name.'</a></li>';
        }
        echo $html;
    }


    public function profile()
    {

        $data['msg'] = '';
        $data['title'] = 'My Business Profile';
        $data['view'] = 'profile';
        $this->load->view('content', $data);
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

}
