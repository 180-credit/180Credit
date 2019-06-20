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
        $input = $this->input->get();
        $paginationUrl = array();
        $this->load->model('User_model');
        if (isset($input['specialities'])) {
            $data['specialities'] = $input['specialities'];
            $paginationUrl[] = 'specialities=' . urlencode(implode(',',$data['specialities']));
        } else {
            $data['specialities'] = null;
        }
        if (isset($input['amenities'])) {
            $data['amenities'] = $input['amenities'];
            $paginationUrl[] = 'amenities=' . urlencode(implode(',',$data['amenities']));
        } else {
            $data['amenities'] = null;
        }
        if (isset($input['location'])) {
            $data['location'] = $input['location'];
            $paginationUrl[] = 'location=' . urlencode($data['location']);
        } else {
            $data['location'] = null;
        }
        if (isset($input['search'])) {
            $data['search'] = $input['search'];
            $paginationUrl[] = 'search=' . urlencode($data['search']);
        } else {
            $data['search'] = null;
        }
        if (isset($input['is_online'])) {
            $data['is_online'] = $input['is_online'];
            $paginationUrl[] = 'is_online=' . urlencode($data['is_online']);
        } else {
            $data['is_online'] = null;
        }
        if (isset($input['offer_free_consultations'])) {
            $data['offer_free_consultations'] = $input['offer_free_consultations'];
            $paginationUrl[] = 'offer_free_consultations=' . urlencode($data['offer_free_consultations']);
        } else {
            $data['offer_free_consultations'] = null;
        }


        $pageLimit = array(2,20, 50, 100, 500);
        if (isset($input['limit']) && in_array($input['limit'], $pageLimit)) {
            $data['limit'] = $input['limit'];
            $paginationUrl[] = 'limit=' . urlencode($data['limit']);
        } else {
            $data['limit'] = 20;
        }
        $paginationUrl = implode('&', $paginationUrl);
        $data['pagination_url'] = 'search?'.$paginationUrl;
        $data['page'] = isset($input['page']) ? $input['page'] : 1;


        $usersData = $this->User_model->getPaginationData($data);
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
        $data['areas_of_specialties'] = $this->Common_model->loadAreasOfSpecialty();
        $data['load_all_tags'] = $this->Common_model->loadAllTags();



        $this->template->load('layout', 'search_results', $data);
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
        if(isset($_GET['onlyHtml']) && $_GET['onlyHtml'] ==true){
            $this->load->view('viewProfile', $data);
        }else{
            $this->template->load('layout','viewProfile', $data);
        }
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
