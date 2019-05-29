<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login(true);
    }

    public function index()
    {
        return $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_Model', 'user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $check = $this->user->find_by('username', $username, false);
        if ($check->num_rows() == 1) {
            $user_data = $check->row();
            $verify_password = password_verify($password, $user_data->password);
            if ($verify_password) {
                $this->set_session($user_data);
                redirect('dashboard');
            } else {
                $this->error('Login gagal! <br>Password tidak sesuai');
            }
        } else {
            $this->error('Login gagal! <br>User tidak ditemukan');
        }

        redirect('auth/');
    }

    private function set_session($user_data)
    {
        $this->session->set_userdata([
           'user_id' => $user_data->user_id,
           'nama' => $user_data->nama,
           'username' => $user_data->username,
           'is_login' => true
        ]);

        $this->session->set_flashdata('success', 'Selamat Datang ' . $user_data->name);
    }

    private function error($msg)
    {
        $this->session->set_flashdata('error', $msg);
    }
}
