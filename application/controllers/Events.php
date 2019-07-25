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

        $condition = "eventType={$this->input->post('event_type')} and targetAudience={$this->input->post('target_audience')} and eventTitle like '{$this->input->post('event_title')}' and submittedByUserId={$user['userId']}";
        $eventDetails = $this->Login_model->getDataByCondition('events', $condition, true);

        $condition = "(permissionBitmask & 1) = 1";
        $user_details = (array)$this->Login_model->getDataByCondition('users', $condition, false);
        if(isset($eventDetails->id)){
            foreach ($user_details as $user_detail){
                $linkUrl = base_url('event-details/'.$eventDetails->id);
                $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
                Hello '.ucfirst($user_detail->firstName).',<br><br>  
                A new event has been submitted for approval.<br>  
                Submitted by: '.ucfirst($user['firstName']).' '.ucfirst($user['lastName']).'<br>
                Event: '.ucfirst($this->input->post('event_title')).'<br>
                Link:   <a href="'.$linkUrl.'">'.$linkUrl.'</a><br>
                <br>
                Thank you,<br> 180Credit.com 
                </body>
                </html>';

                $mail_status = $this->SendVerifyMail("donotreply@180credit.com", $user_details->userEmail, "A new event has been submitted.", $html);
                if(isset($user_detail->player_ids) && $user_detail->player_ids != ''){
                    $message = "A new event has been submitted for approval. Submitted by: ";
                    $message .= ucfirst($user['firstName'])." ";
                    $message .= ucfirst($user['lastName']);
                    $headings = "A new event has been submitted.";
                    $this->sendPushNotification($message,explode(',',$user_detail->player_ids),$linkUrl,$headings,base_url($fileName));
                }
            }
        }

        $this->session->set_flashdata('success', "done");
        redirect('/events');
    }


    function SendVerifyMail($from, $email, $subject, $message, $attach = '', $filename = '')
    {
        $data = array(
            'from' => $from,
            'to' => $email,
            'subject' => $subject,
            'html' => $message,
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.mailgun.net/v3/m.180credit.com/messages');
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "api:" . MAIL_API);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);
        curl_close($curl);
        // print_r($result);
        // exit;
        return true;
    }
}