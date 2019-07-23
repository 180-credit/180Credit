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
}