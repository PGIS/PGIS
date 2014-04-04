<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Seminary extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
    }

    public function index(){
          $this->form_validation->set_rules('usn', 'Regno', 'required');
          $this->form_validation->set_rules('day', 'day', 'required');
          $this->form_validation->set_rules('hr', 'hour', 'required');
          if ($this->form_validation->run() == FALSE){
	  $this->load->view('academic/seminar');
          }else{
              $this->load->model('seminar_register');
               $username = $this->input->post('usn');
               $day = $this->input->post('day');
               $hour = $this->input->post('hr');
               $sum=$day.', '.$hour;
               $this->seminar_register->insert_student($username,$sum);
               $data['smg']='<font> Thanks you have already registered your time</font>';
               $this->load->view('academic/seminar',$data);
               
      }  
        }

          }

