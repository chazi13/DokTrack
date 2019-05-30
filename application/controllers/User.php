<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_level_not('Admin');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $enc_level = $this->uri->segment('3');
        $data['level'] = $this->enc->decode($enc_level);
        $data['users'] = $this->user->get_by('level', $data['level']);
        $data['page_title'] = 'Daftar User';
        $data[strtolower(str_replace(' ', '_', $data['level'])) . '_active'] = 'active';
        return $this->template->load('template', 'users/list', $data);
    }

    public function add()
    {
        $enc_level = $this->uri->segment('3');
        $data['level'] = $this->enc->decode($enc_level);
        $data['page_title'] = 'Tambah User';
        $data[strtolower(str_replace(' ', '_', $data['level'])) . '_active'] = 'active';
        return $this->template->load('template', 'users/add', $data);
    }

    public function store()
    {
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'level' => $post['level']
        ];

        $result = $this->user->insert_data($data);
        if ($result) {
            set_success_msg('User ' . $post['level'] . ' berhasil ditambahkan!');
        } else {
            set_success_msg('User ' . $post['level'] . ' gagal ditambahkan!');
        }
        
        redirect('user/index/' . $this->enc->encode($post['level']));
    }

    public function edit()
    {
        $enc_user_id = $this->input->get('uid');
        $user_id = $this->enc->decode($enc_user_id);
        $data['user'] = $this->user->find_by('user_id', $user_id, true);

        $data['level'] = $data['user']->level;
        $data['page_title'] = 'Edit User';
        $data[strtolower(str_replace(' ', '_', $data['level'])) . '_active'] = 'active';
        return $this->template->load('template', 'users/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $user_id = $this->enc->decode($post['user_id']);
        $data = [
            'nama' => $post['nama'],
            'username' => $post['username'],
        ];

        if ($post['password']) {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $result = $this->user->update_data($data, $user_id);
        if ($result) {
            set_success_msg('User ' . $post['level'] . ' berhasil diupdate!');
        } else {
            set_success_msg('User ' . $post['level'] . ' gagal diupdate!');
        }
        
        redirect('user/index/' . $this->enc->encode($post['level']));
    }

    public function destroy()
    {
        $enc_user_id = $this->input->get('uid');
        $user_id = $this->enc->decode($enc_user_id);
        $data['user'] = $this->user->find_by('user_id', $user_id, true);
        $data['level'] = $data['user']->level;

        $result = $this->user->remove($user_id);
        if ($result) {
            set_success_msg('User ' . $data['level'] . ' berhasil dihapus!');
        } else {
            set_success_msg('User ' . $data['level'] . ' gagal dihapus!');
        }
        
        redirect('user/index/' . $this->enc->encode($data['level']));
    }
}

