<?php
class LanguageLoader
{
    function initialize()
    {
        $ci =& get_instance();
        $ci->load->helper('language');

        if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] != 'english') {
            $ci->lang->load(array('events'), $_SESSION['site_lang']);
        } else {
            $ci->lang->load(array('events'), 'english');
        }

    }
}