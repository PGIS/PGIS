<?php

if (!defined('BASEPATH'))
    die();

class Frontpage extends CI_Controller {

    public function index() {

        $this->load->view('home');
    }

    function howtoapply() {
        $this->load->view('howtoapply');
    }

}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
