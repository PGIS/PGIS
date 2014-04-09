<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  class Student extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','html','url','directory'));
        $this->load->library(array('form_validation','session'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Student') {
             redirect('logout');
        }
  }

  function index(){
      $this->load->view('registered/welcome');
  }
  function firstin(){
      $data['firstin']=TRUE;
       $this->load->view('registered/welcome',$data);
  }
 }