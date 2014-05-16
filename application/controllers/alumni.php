<?php if (!defined('BASEPATH')){
exit('No direct script access allowed');}

class Alumni extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory'));
        $this->load->library(array('form_validation', 'session', 'javascript'));
    }

    function index(){
        $this->load->view('alumni/alumni');
    }
}
