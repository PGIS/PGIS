<?php

class User_admission_c extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array'));
        $this->load->library(array('session'));
        $this->load->helper('directory');
        $this->load->helper('download');
    }

        

    function do_upload() {

        $this->load->view('user_admission_v');
    }

    function do_download($user, $valuez) {
        $user_name = $this->uri->segment(3);
        $file_name = $this->uri->segment(4);
        $data = file_get_contents("uploads/" . $user_name . '/' . $file_name);
        $name = $file_name;
        force_download($file_name, $data);
    }

    function read_content() {

        $this->load->model('user_admission_m');
        $this->user_admission_m->get_students();
        $result['useridz'] = $this->user_admission_m->get_students();
        $resultz = $this->user_admission_m->get_students();
        $this->load->view('user_admission_v', $result);
    }

}
