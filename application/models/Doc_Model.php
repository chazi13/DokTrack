<?php
defined('BASEPATH') OR die('No direct script access allowed');

class Doc_Model extends CI_Model
{
    public function get_by($field, $value = 0)
    {
        // $this->db->join('trace', 'docs.doc_id = trace.doc_id', 'RIGHT');
        $this->db->select("(SELECT keterangan FROM trace WHERE trace.doc_id = docs.doc_id ORDER BY time DESC limit 0,1) AS keterangan, (SELECT note FROM trace WHERE trace.doc_id = docs.doc_id ORDER BY time DESC limit 0,1) AS note, docs.*");
        if ($value !== 0) {
            if (is_array($value)) {
                foreach ($value as $i => $v) {
                    if ($i == 0) {
                        $this->db->where($field, $v);
                    } else {
                        $this->db->or_where($field, $v);
                    }
                }
            } else {
                $this->db->where($field, $value);
            }
        }

        $data = $this->db->get('docs');
        return $data->result();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('docs', $data);
        if ($result) {
            $doc_id = $this->db->insert_id();
            return $doc_id;
        }
        return $result;
    }

    public function update_data($data, $doc_id)
    {
        $this->db->where('doc_id', $doc_id);
        $result = $this->db->update('docs', $data);
        return $result;
    }

}

