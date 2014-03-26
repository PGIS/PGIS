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
        $data['active1']=TRUE;
        $this->load->view('registration/finance_view1',$data);  
    }
    public function finance(){
        $this->form_validation->set_rules('regist_id','Registration ID','trim|required|exact_length[13]|alpha_dash|xss_clean');
        $this->form_validation->set_rules('finance_id','Finance ID','trim|requied|xss_clean');
        $this->form_validation->set_rules('pay_no','Payment No','trim|required|xss_clean');
        $this->form_validation->set_rules('pay_details','Payment Details','trim|required|xss_clean');
        $this->form_validation->set_rules('amount','Amount','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('date_payment','Payment date','trim|required|alpha_dash|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('registration/finance_view');
        }else{
            $this->load->model('finance_model');
            $application_id=  $this->session->userdata('userid');
            $registration=  $this->input->post('regist_id');
            $finance_id=  $this->input->post('finance_id');
            $payment_no=  $this->input->post('pay_no');
            $payment_details=  $this->input->post('pay_details');
            $amount=  $this->input->post('amount');
            $date_pay=  $this->input->post('date_payment');
            $imageName= pg_escape_string($_FILES['image']['name']);
            $imageData= (pg_escape_bytea(file_get_contents($_FILES['image']['tmp_name'])));
            $imageType=  pg_escape_string($_FILES['image']['type']);
            if(substr($imageType,0,5)==='image'){
            $this->finance_model->finance_insert($application_id,$registration,$finance_id,$payment_no,$payment_details,$amount,$date_pay,$imageName,$imageData);
            $data['result']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' for registering for studies,You will receive notification soon!.</font>';
            $this->load->view('registration/finance_view',$data);
            }else {
            $data['results']='<font>Oops.! Not a image please try Again.!</font>';
            $this->load->view('registration/finance_view',$data); 
            }
        } 
    }
    function displayImage(){
        $n=  $this->session->userdata('userid');
        $res=  $this->db->query("select * from tb_finance where app_id='$n'");
        foreach ($res->result() as $row){
            $imageData=$row->image;
           // $imageType=$row->name;
            header("content-type:image/jpg");
            echo '<img src="'.$imageData.'">';
           
        }
    }
    }


