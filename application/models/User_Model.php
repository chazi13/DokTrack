<?php
defined('BASEPATH') OR die('No direct script access allowed');

class User_Model extends CI_Model
{
    public function find_by($field, $value, $return = FALSE)
    {
        $this->db->where($field, $value);
        $data = $this->db->get('users');
        if ($return) {
            return $data->row();
        }
        return $data;
    }

    public function get_by($field, $value)
    {
        $this->db->where($field, $value);
        $data = $this->db->get('users');
        return $data->result();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('users', $data);
        return $result;
    }

    public function update_data($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function remove($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->delete('users');
        return $result;
    }
}

