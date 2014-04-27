<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AdminAlumni extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'url', 'text'));
        $this->load->library(array('form_validation', 'pagination', 'table'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'administrator') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->view('admin/alumnievents');
    }

    function saveevent() {
        $this->form_validation->set_rules('eventname', 'Event name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('descrip', 'Descripton', 'trim|required|xss_clean');
        $this->form_validation->set_rules('venue', 'Venue', 'trim|required|xss_clean');
        $this->form_validation->set_rules('evedate', 'Event date', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/alumnievents');
        } else {
            if(isset($_POST['posevents'])){
                $this->load->model('admin');
                Admin:: saveventpost();
                $data['posted']=TRUE;
               $this->load->view('admin/alumnievents',$data);
            }
        }
    }

}
