<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Alumni extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory'));
        $this->load->library(array('form_validation', 'session', 'javascript'));

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'alumni') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->view('alumni/alumni');
    }

    function updatecontacts() {
        $data =  $this->Fetchcontact();
        $this->load->view('alumni/updatecontacts',$data);
    }

    function Fetchcontact() {
        $id = $this->session->userdata('userid');
        $query = $this->db->get_where('tb_alumni', array('userid' => $id));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $value = array(
                    'email' => $row->email,
                    'phoneno' => $row->mobile1,
                    'phoneno1' => $row->mobile2
                );
            } unset($row);
            return $value;
        }
    }

    function contactsupdating(){
         $data['shw']=TRUE;
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('phone', 'Mobile', 'required|numeric|max_length[11]|xss_clean');
         $this->form_validation->run();
          if ($this->form_validation->run() == FALSE) {
            $data =  $this->Fetchcontact();
            $this->load->view('alumni/updatecontacts',$data);
            } else {
                $this->load->model('eventmodel');
                
                $data =  $this->Fetchcontact();
                $this->load->view('alumni/updatecontacts',$data);
            }
    }
}
