<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Dok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Doc_Model', 'doc');
        $this->load->model('Trace_Model', 'trace');
    }

    public function index()
    {
        $status = 0;
        if ($this->session->level == 'P2') $status = 1;
        if ($this->session->level == 'PKC') $status = [2, 3];

        $data['docs'] = $this->doc->get_by('status', $status);
        $data['page_title'] = 'Daftar Dokumen';
        
        return $this->template->load('template', 'dok/list', $data);
    }

    public function add()
    {
        $data['page_title'] = 'Daftar Dokumen';
        return $this->template->load('template', 'dok/add', $data);
    }

    public function store()
    {
        redirect_if_level_not('Front Desk');
        $post = $this->input->post();
        $data = [
            'no_agenda' => $post['no_agenda'],
            'no_surat' => $post['no_surat'],
            'perihal' => $post['perihal'],
            'perusahaan' => $post['perusahaan'],
            'status' => 1
        ];

        $result = $this->doc->insert_data($data);
        if ($result) {
            $doc_id = $result;
            $data_trace = [
                'keterangan' => 'Dokumen diterima',
                'user_id' => $this->session->user_id,
                'doc_id' => $doc_id
            ];

            $this->trace->insert_trace($data_trace);
            set_success_msg('Dokumen berhasil ditambahkan!');
        } else {
            set_err_msg('Dokumen gagal ditambahkan!');
        }
        redirect('dok/');
    }

    public function processing()
    {
        redirect_if_level_not('P2');
        $post = $this->input->post();
        $doc_id = $this->enc->decode($post['doc_id']);
        $data = ['status' => 2];

        $result = $this->doc->update_data($data, $doc_id);
        if ($result) {
            $data_trace = [
                'note' => $post['note'],
                'keterangan' => 'Dokumen dalam proses penelitian',
                'user_id' => $this->session->user_id,
                'doc_id' => $doc_id
            ];

            $this->trace->insert_trace($data_trace);
        }
        redirect('dok/');
    }

    public function accepting()
    {
        redirect_if_level_not('PKC');
        $doc_id = $this->enc->decode($this->uri->segment(3));
        $data = ['status' => 3];

        $result = $this->doc->update_data($data, $doc_id);
        if ($result) {
            $check_accept = $this->trace->get_by(['keterangan' => 'Dokumen dalam proses perizinan', 'doc_id' => $doc_id]);
            
            if (count($check_accept) < 1) {
                $data_trace = [
                    'keterangan' => 'Dokumen dalam proses perizinan',
                    'user_id' => $this->session->user_id,
                    'doc_id' => $doc_id
                ];
    
                $this->trace->insert_trace($data_trace);
            }
        }
        return $result;
    }

    public function accept()
    {
        redirect_if_level_not('PKC');
        $post = $this->input->post();
        $doc_id = $this->enc->decode($post['doc_id']);
        $data = ['status' => 4];

        $result = $this->doc->update_data($data, $doc_id);
        if ($result) {
            $data_trace = [
                'note' => $post['note'],
                'keterangan' => 'Dokumen telah di proses dan siap diambil',
                'user_id' => $this->session->user_id,
                'doc_id' => $doc_id
            ];

            $this->trace->insert_trace($data_trace);
            set_success_msg('Dokumen telah disetujui');
        }
        redirect('dok/');
    }

    public function abort()
    {
        redirect_if_level_not(['PKC', 'P2']);
        $post = $this->input->post();
        $doc_id = $this->enc->decode($post['doc_id']);
        $data = ['status' => 5];

        $result = $this->doc->update_data($data, $doc_id);
        if ($result) {
            $data_trace = [
                'note' => $post['note'],
                'keterangan' => 'Dokumen ditolak',
                'user_id' => $this->session->user_id,
                'doc_id' => $doc_id
            ];

            $this->trace->insert_trace($data_trace);
            set_err_msg('Dokumen telah ditolak');
        }
        redirect('dok/');
    }

}

