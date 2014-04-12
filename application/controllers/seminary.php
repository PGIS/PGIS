<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seminary extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url','html'));
       $this->load->library('form_validation');
       if(!$this->session->userdata('logged_in')){
           redirect('logout');  
       }elseif ($this->session->userdata('user_role')!='Student') {
           redirect('logout'); 
        }
    }

    public function index(){
      $this->load->view('academic/seminar_reg');
        }
        
    function seminary_form() {
      $this->form_validation->set_rules('day', 'seminar_day', 'required');
      $this->form_validation->set_rules('day1', 'seminar_hour', 'required');
      if($this->form_validation->run() === FALSE){
      $this->load->view('academic/seminar_reg');
      }else{
           $this->load->model('seminar_register');
           $day = $this->input->post('day1');
           $hours = $this->input->post('data');
           $course=  $this->input->post('day');
           $sn=  $this->session->userdata('userid');
           $username=  $this->session->userdata('registration_id');
           $this->seminar_register->insert_student($username,$course,$day,$hours,$sn);
           $data['smg']='<font class="alert alert-success">Thanks for registrating to our seminar</font>';
           $this->load->view('academic/seminar_reg',$data);
           }  
            
}
}

