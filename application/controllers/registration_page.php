<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Registration_page extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         $this->output->set_header("Cache-Control:no-store,no-cache,must-revalidate");
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('userid')=='applicant') {
             redirect('logout');
        }
     }
     function student(){
         $data['active2']=TRUE;
         unset($data['active']);
         $this->form_validation->set_rules('dt','Date','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
          $this->load->view('registration/finance_view',$data);
         }else{
             $this->load->model('finance_model');
             $sn=  $this->session->userdata('userid');
             $postponement=  $this->input->post('post');
             $date_postponement=  $this->input->post('dt');
             $postponement_reasons=  $this->input->post('rsp');
             $this->finance_model->registration_data($sn,$postponement,$date_postponement,$postponement_reasons);
             $data['result1']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' for your request.! please keep visiting while your form is still processing.</font>';
             $this->load->view('registration/finance_view',$data);
         }
     }
     function freezing(){
         $data['active3']=TRUE;
         unset($data['active2']);
         $this->form_validation->set_rules('frzd','Freezing date','required|xss_clean');
         $this->form_validation->set_rules('rsud','Resume date','required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('registration/finance_view',$data);
         }else{
             $this->load->model('finance_model');
             $sn=  $this->session->userdata('userid');
             $freezing=  $this->input->post('frz');
             $freez_date=  $this->input->post('frzd');
             $freez_resume=  $this->input->post('rsud');
             $freezing_reasons=  $this->input->post('rsf');
             $this->finance_model->register_remained($sn,$freezing,$freez_date,$freez_resume,$freezing_reasons);
             $data['result2']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' for your request.! please keep visiting while your form is still processing.</font>';
             $this->load->view('registration/finance_view',$data);
         }
     }
     function extension(){
         $data['active4']=TRUE;
         unset($data['active3']);
         $this->form_validation->set_rules('exdate','Extension date','required|xss_clean');
         $this->form_validation->set_rules('period','Month period','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
            $this->load->view('registration/finance_view',$data);
         }  else {
             $this->load->model('finance_model');
              $sn=  $this->session->userdata('userid');
              $extension=  $this->input->post('ext');
              $ext_date=  $this->input->post('exdate');
              $period=  $this->input->post('period');
              $extension_reasons=  $this->input->post('rsex');
              $this->finance_model->register_extension($sn,$extension,$ext_date,$period,$extension_reasons);
              $data['result3']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' for your request.! please keep visiting while your form is still processing.</font>';
              $this->load->view('registration/finance_view',$data);
         }
     }
 }
 
