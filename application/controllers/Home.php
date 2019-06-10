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
        $data['area_of_specialist'] = json_encode($areasOfSpecialties);
        $data['user_areas_of_specialty'] = json_encode($loadUserAreasOfSpecialtySearch);
        $areasOfSpecialties = json_decode($data['area_of_specialist'],true);
        $data['defaultArea'] = json_encode(array_column($areasOfSpecialties, 'name'));
        /*$dataOfSpecialist=array(
            array(
                'text'=>'Area of specialist',
                'children'=>$areasOfSpecialties
            ),
            array(
                'text'=>'Specialist',
                'children'=>$loadUserAreasOfSpecialtySearch
            )
        );*/
        $this->template->load('layout', 'home', $data);
    }


    public function getSpecialList($type)
    {
        $this->load->model('Common_model');
        $areasOfSpecialties = $this->Common_model->loadAreasOfSpecialty();
        if ($type == 'area.json') {
            $data['items'] = $areasOfSpecialties;
        }
        if ($type == 'specialist.json') {
            $specialLists = $this->Common_model->loadUserAreasOfSpecialtySearch();
            if (!empty($specialLists)) {
                $data['items'] = $specialLists;
            }
        }
        if (!isset($data['items'])) {
            $data['items'] = array();
        }
        echo json_encode($data);
    }

    public function getZipCodes()
    {
        $this->load->model('Common_model');
        $q = $this->input->get('q');
        $viewZipCodes = $this->Common_model->viewZipCodes($q);
        echo json_encode($viewZipCodes);
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
