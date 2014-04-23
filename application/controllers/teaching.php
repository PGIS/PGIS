<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Teaching extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('user_role')==='Teaching staff') {
             redirect('logout');
        }
     }
     function index(){
         $this->load->view('academic/teaching_view');
     }
 }

