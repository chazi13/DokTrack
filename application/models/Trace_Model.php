<?php
defined('BASEPATH') OR die('No direct script access allowed');

class Trace_Model extends CI_Model
{
    public function get_by($field, $value = '')
    {
        if (is_array($field)) {
            foreach ($field as $k => $v) {
                $this->db->where($k, $v);
            }
        } else {
            $this->db->where($field, $value);
        }
        $data = $this->db->get('trace');
        return $data->result();
    }

    public function insert_trace($data)
    {
        $this->db->insert('trace', $data);
    }
}

