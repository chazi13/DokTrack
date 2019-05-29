<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Template 
{
    public function load($template, $page, $data = [], $return = FALSE)
    {
        $CI =& get_instance();
        $page_data['content'] = $CI->load->view($page, $data, TRUE);
        return $CI->load->view($template, $page_data, $return);
    }
}

