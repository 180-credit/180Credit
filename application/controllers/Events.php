<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Event lists';
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $data['upcoming_events'] = $this->upcoming_events;
        $this->template->load('layout', 'event/list', $data);
    }

    public function load_ajax_data()
    {
        $input = $this->input->post();
        $eventType = 0;
        $eventSearch = '';
        $data['page'] = 1;
        if (isset($input['event_type']) && $input['event_type'] != '') {
            $eventType = $input['event_type'];
        }
        if (isset($input['event_search']) && $input['event_search'] != '') {
            $eventSearch = $input['event_search'];
        }
        if (isset($input['page']) && $input['page'] != '') {
            $data['page'] = $input['page'];
        }

        $data['limit'] = 20;
        $usersData['count'] = count($this->Common_model->loadAllEvents($eventType, $eventSearch, 'createdOn', 'desc', 1, 100000));
        $usersData['data'] = $this->Common_model->loadAllEvents($eventType, $eventSearch, 'createdOn', 'desc', $data['page'], $data['limit']);

        $data['paginationData'] = isset($usersData['data']) ? $usersData['data'] : array();
        $total_pages = round($usersData['count'] / $data['limit']);

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


    public function details($eventId)
    {
        $data['title'] = 'Event lists';
        $this->load->model('Common_model');
        $data['event_details'] = $this->Common_model->loadEvent($eventId);
        $data['upcoming_events'] = $this->upcoming_events;
        $this->template->load('layout', 'event/details', $data);
    }


    public function create()
    {
        if (!isset($_SESSION['user']) || (isset($_SESSION['user']['180creditUserType']) && $_SESSION['user']['180creditUserType'] != 1 )) {
            redirect('service-provider/login');
        }
        $data['title'] = 'Create event';
        $data['upcoming_events'] = $this->upcoming_events;
        $this->template->load('layout', 'event/create', $data);
    }


    public function store_event()
    {
        if (!isset($_SESSION['user']) || (isset($_SESSION['user']['180creditUserType']) && $_SESSION['user']['180creditUserType'] != 1 )) {
            redirect('service-provider/login');
        }
        $datetimes = $this->input->post('datetimes');
        $datetimesArray = explode(" - ", $datetimes);
        $startDateTime = explode(" ", $datetimesArray[0]);
        $startDate = date('Y-m-d', strtotime(str_replace('-', '/', $startDateTime[0])));
        $startTime = implode(" ", array($startDateTime[1], $startDateTime[2]));
        $date = DateTime::createFromFormat('H:i A', $startTime);
        $startFormattedTime = $date->format('H:i:s');
        $endDateTime = explode(" ", $datetimesArray[1]);
        $endDate = date('Y-m-d', strtotime(str_replace('-', '/', $endDateTime[0])));
        $endTime = implode(" ", array($endDateTime[1], $endDateTime[2]));
        $date = DateTime::createFromFormat('H:i A', $endTime);
        $endFormattedTime = $date->format('H:i:s');

        $loginModal = $this->load->model('Login_model');
        $state = $this->input->post('state');
        $stateId = 0;
        if (!empty($state) && $state != '') {
            $stateDetails = $this->Login_model->getDataByCondition('state', "name like '%{$state}%'", true);
            if(isset($stateDetails->id)){
                $stateId = $stateDetails->id;
            }
        }
        $path = 'assets/events';
        if (!is_dir(FCPATH . $path)) {
            mkdir($path, 0777, true);
        }

        $user = $_SESSION['user'];

        if (isset($_FILES['profile_image']['name']) && !empty($_FILES['profile_image']['name'])) {
            $fileName = $path . '/' . time() . '.' . pathinfo($_FILES['profile_image']['name'])['extension'];
            move_uploaded_file($_FILES['profile_image']['tmp_name'], FCPATH . $fileName);
        }
        // $oldImage =$this->input->post('old_profile_image');
        $this->db->reconnect();
        $insert_user_stored_proc = "CALL saveEvent(
			0, 
			{$this->input->post('event_type')},
			{$this->db->escape($this->input->post('event_title'))},
			{$this->db->escape($fileName)},
			{$this->db->escape($this->input->post('site_link'))},
			'{$startDate}',
			'{$startFormattedTime}',
			'{$endDate}',
			'{$endFormattedTime}',
			{$this->db->escape($this->input->post('venue'))},
			{$this->db->escape($this->input->post('address'))},
			{$this->db->escape($this->input->post('city'))},
			{$stateId},
			{$this->db->escape($this->input->post('postal_code'))},
			{$this->db->escape($this->input->post('event_description'))},
			{$this->db->escape($this->input->post('cost'))},
			{$user['userId']},
			{$this->db->escape($this->input->post('timezone'))},
			{$this->input->post('target_audience')}
			)";
        $this->db->query($insert_user_stored_proc);
        $this->db->close();
        $this->session->set_flashdata('success', "done");
        redirect('/events');
    }
}