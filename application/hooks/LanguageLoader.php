<?php

class LanguageLoader
{
    function initialize()
    {
        $ci =& get_instance();
        $ci->load->helper('language');

        if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] != 'english') {
            $ci->lang->load(array('events', 'main'), $_SESSION['site_lang']);
        } else {
            $ci->lang->load(array('events', 'main'), 'english');
        }

    }
}