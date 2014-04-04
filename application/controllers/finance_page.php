<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Finance_page extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form','url','html');
        $this->load->library('form_validation');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        if(!$this->session->userdata('logged_in')){
            redirect('logout');  
        }elseif (!$this->session->userdata('userid')=='applicant') {
            redirect('logout'); 
        }
    }
    public function index(){
        $this->load->model('finance_model');
        $data['records']=  $this->finance_model->display();
        $data['active']=TRUE;
        $this->load->view('registration/finance_view1',$data);  
    }
    public function finance(){
        $data['active']=TRUE;
        $config['upload_path']='./image/';
        $config['allowed_types']='jpg|png|gif|pdf|jpeg';
        $config['overwrite']=TRUE;
        $this->load->library('upload',$config);
        $this->form_validation->set_rules('amnt','Amount','trim|required|xss_clean');
        $this->form_validation->set_rules('rescpt','Receipt','trim|required|xss_clean');
        $this->form_validation->set_rules('reg_fees','Registration year','trim|required|xss_clean');
        $this->form_validation->set_rules('date_payment','Date of payment','trim|required|xss_clean');
        $this->form_validation->set_rules('pay_mode','Payment mode','trim|required|xss_clean');
        if(!$this->upload->do_upload()||$this->form_validation->run()===FALSE){
           $this->load->view('registration/finance_view',$data);
        }  else {
            $this->load->model('finance_model');
            $application_id=  $this->session->userdata('userid');
            $registration=  $this->input->post('reg_fees');
            $rgistration_amount=  $this->input->post('amnt');
            $registration_receipt=  $this->input->post('rescpt');
            $payment_date=  $this->input->post('date_payment');
            $payment=  $this->input->post('pay_mode');
            $imageName= base_url().'image/'.pg_escape_string($_FILES['userfile']['name']);
            $this->finance_model->finance_insert($application_id,$registration,$rgistration_amount,$registration_receipt,
            $payment,$payment_date,$imageName);
            $data['result']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' For registration.!</font>';
            $this->load->view('registration/finance_view',$data);
        }
      }
    }


