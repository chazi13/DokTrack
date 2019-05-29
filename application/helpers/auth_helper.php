<?php
defined('BASEPATH') OR die('No direct script access allowed!');

$CI =& get_instance();

function is_login($is_true = false)
{
    global $CI;
    if (!@$CI->session->is_login && !$is_match) {
        redirect('auth/');
    } elseif ($CI->session->is_login && $is_match) {
        redirect('dashboard');
    }

    return;
}

function is_level($level)
{
    global $CI;
    if ($CI->session->level == $level) {
        return true;
    }

    return false;
}

function redirect_if_level_not($level)
{
    global $CI;
    $is_match = false;
    if (is_array($level)) {
        foreach ($level as $l) {
            if ($CI->session->level == $l) {
                $is_match = true;
            }
        }
    } else {
        $is_match = is_level($level);
    }

    if (!$is_match) {
        redirect('auth/');
    }

    return;
}
