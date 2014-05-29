<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Supervisor_event extends CI_Controller{
         function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library(array('form_validation','encrypt'));
         $this->load->model('supervisor_event_model');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('userid')=='Supervisor') {
             redirect('logout');
        }
     }
     public function index(){
         $this->load->view('academic/supervisor_calendar_view');
     }
     public function display_cal($year=null,$month=null){
         if(!$year){
            $year=  date('Y'); 
         }
         if(!$month){
            $month=  date('m'); 
         }
         $sn=  $this->session->userdata('userid');
         $day= $this->input->post('day');
         $data=  $this->input->post('data');
         if($day ){
          $this->supervisor_event_model->add_calendar_data($sn,"$year-$month-$day",$data); 
         }
        $data['calendar']=$this->supervisor_event_model->calendar($year,$month);
        $this->load->view('academic/supervisor_calendar_view',$data);
          
     }
 }



