<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $site_data;
    public $upcoming_events;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
        $this->site_data = array('key'=>'value');
        $this->set_upcoming_event();

    }

    private function set_upcoming_event(){
        $this->upcoming_events=$this->Common_model->loadAllEvents(0,'','createdOn','desc',1,3);
    }


    public function sendPushNotification($message,$playerIds,$url,$headings,$img){;


        $content = array(
            "en" => "$message"
        );
        $headings = array(
            "en" => "$headings"
        );
        $fields = array(
            'app_id' => ONESIGNAL_APPID,
//            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'include_player_ids' => $playerIds,
            'url' => $url,
            'contents' => $content,
            'chrome_web_icon' => $img,
            'headings' => $headings
        );
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic '.ONESIGNAL_APPKEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}