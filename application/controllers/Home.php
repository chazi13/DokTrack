<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        is_login(true);
        return $this->load->view('home');
    }

    public function dok()
    {
        $this->load->model('Doc_Model', 'doc');
        $this->load->model('Trace_Model', 'trace');
        $no_agenda = $this->enc->decode($this->input->get('no_agenda'));
        $no_agenda = $no_agenda ? $no_agenda : $this->input->get('no_agenda');

        $data['doc'] = @$this->doc->get_by('no_agenda', $no_agenda)[0];
        $data['trace'] = $this->trace->get_by('doc_id', @$data['doc']->doc_id);

        echo $this->load->view('dok/detail', $data, true);
    }
}

