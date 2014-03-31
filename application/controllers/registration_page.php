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
         $data['active']=TRUE;
         unset($data['active1']);
         $this->form_validation->set_rules('dob','Date of begining','trim|required|xss_clean');
         $this->form_validation->set_rules('doc','Date of completion','trim|required|xss_clean');
         $this->form_validation->set_rules('dor','Date of registration','trim|required|xss_clean');
         $this->form_validation->set_rules('post','Postponement','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
          $this->load->view('registration/finance_view',$data);
         }else{
             $this->load->model('finance_model');
             $sn=  $this->session->userdata('userid');
             $date_reg=  $this->input->post('dor');
             $date_begin=  $this->input->post('dob');
             $date_comp=  $this->input->post('doc');
             $postponement=  $this->input->post('post');
             $date_postponement=  $this->input->post('dt');
             $frezing=  $this->input->post('frz');
             $date_frez=  $this->input->post('frzd');
             $date_resume=  $this->input->post('rsud');
             $extension=  $this->input->post('ext');
             $date_ext=  $this->input->post('exdate');
             $period_ext=  $this->input->post('period');
             $regist_fees=  $this->input->post('reg_fees');
             $regist_fee_amount=  $this->input->post('amnt');
             $regist_receiptno=  $this->input->post('rescpt');
             $studentship_fees=  $this->input->post('stdship');
             $studentship_amount=  $this->input->post('amnt1');
             $studentship_receiptno=  $this->input->post('rescpt1');
             $this->finance_model->registration_data($sn,$date_reg,$date_begin,$date_comp,$postponement,$date_postponement,$frezing,
             $date_frez,$date_resume,$extension,$date_ext,$period_ext,$regist_fees,$regist_fee_amount,$regist_receiptno,
             $studentship_fees,$studentship_amount,$studentship_receiptno);
             $this->load->view('registration/finance_view',$data);
             
         }
     }
 }
 