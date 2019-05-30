<?php 
defined('BASEPATH') OR die('No direct script access allowed!');

function set_err_msg($msg)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('error', $msg);
}

function set_success_msg($msg)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('success', $msg);
}

function show_alert()
{
    $CI =& get_instance();
    if (@$CI->session->flashdata('error')) {
        echo '<div class="alert alert-danger alert-dismissible fade show d-flex" role="alert">';
        echo '<p> ' . $CI->session->flashdata('error') . ' </p>';
        echo '<button type="button" class="close ml-auto pull-right" data-dismiss="alert" aria-label="Close">' .
                '<span aria-hidden="true">&times;</span>' .
            '</button>' . 
        '</div>';
    } elseif (@$CI->session->flashdata('success')) {
        echo '<div class="alert alert-success alert-dismissible fade show d-flex" role="alert">';
        echo '<p> ' . $CI->session->flashdata('success') . ' </p>';
        echo '<button type="button" class="close ml-auto pull-right" data-dismiss="alert" aria-label="Close">' .
                '<span aria-hidden="true">&times;</span>' .
            '</button>' . 
        '</div>';
    }
}
