<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Seminary extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
    }

    public function index(){
          $this->form_validation->set_rules('day', 'seminar_day', 'required');
          $this->form_validation->set_rules('hr', 'seminar_hour', 'required');
          if ($this->form_validation->run() == FALSE){
	  $this->load->view('academic/seminar_reg');
      }else{
              $this->load->model('seminar_register');
               $day = $this->input->post('day1');
               $hr = $this->input->post('data');
               $cos=  $this->input->post('day');
               $id=  $this->session->userdata('');
               $this->seminar_register->insert_seminar($day,$hr);
               $data['smg']='<font> Thanks you have already registered your time</font>';
               $this->load->view('academic/seminar',$data);
               
      }  
        }

          }

