<?php

class User_admission_c extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array'));
        $this->load->library(array('session'));
        $this->load->helper('directory');
        $this->load->helper('download');
    }
    
    function load_view(){
        
        $this->load->view('user_admission_v');
    }
    
    function do_upload(){
        
        $this->load->view('user_admission_v');
    }
    function do_download($idname){
        
        
        $data = file_get_contents("uploads/emanoble/one.pdf"); // Read the file's contents
        $name = 'dodoso.pdf';
        force_download($name, $data);

    }
    function read_content(){
      
        $this->load->model('user_admission_m');
        $this->user_admission_m->get_students();
        $result=$this->user_admission_m->get_students();
        
        foreach ($result as $row)
{
   echo $row->userid. '</br>';
   
}
    }
    public function load_data(){
        
    }
}