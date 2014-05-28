<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ErrorPage extends CI_Controller{
    private $limit=10,$offset=0;
    
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('url','array','string'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
       
    }
    
    function index(){
        $this->load->view('errorsInfo');
    }
}