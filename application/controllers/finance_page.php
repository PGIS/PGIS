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
        $this->form_validation->set_rules('amnt','Amount','trim|required|xss_clean');
        $this->form_validation->set_rules('rescpt','Receipt','trim|required|xss_clean');
        $this->form_validation->set_rules('amnt1','Student amount','trim|required|xss_clean');
        $this->form_validation->set_rules('rescpt1','Student receipt','trim|required|xss_clean');
        $this->form_validation->set_rules('pay_details','Payment details','trim|required|xss_clean');
        $this->form_validation->set_rules('date_payment','Date of payment','trim|required|xss_clean');
        $this->form_validation->set_rules('dor','Registration date','trim|required|xss_clean');
        $this->form_validation->set_rules('dob','Beginning date','trim|required|xss_clean');
        $this->form_validation->set_rules('doc','Completion date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
        $this->load->view('registration/finance_view',$data);
        }  else {
            $this->load->model('finance_model');
            $application_id=  $this->session->userdata('userid');
            $registration=  $this->input->post('reg_fees');
            $rgistration_amount=  $this->input->post('amnt');
            $registration_receipt=  $this->input->post('rescpt');
            $studentship=  $this->input->post('stdship');
            $studentship_amount=  $this->input->post('amnt1');
            $studentship_receipt=  $this->input->post('rescpt1');
            $payment=  $this->input->post('pay_details');
            $payment_date=  $this->input->post('date_payment');
            $date_register=  $this->input->post('dor');
            $date_begine=  $this->input->post('dob');
            $date_complete=  $this->input->post('doc');
            $imageName=  pg_escape_string($_FILES['image']['name']);
            $imageData=  pg_escape_bytea(file_get_contents($_FILES['image']['tmp_name']));
            $imageType=  pg_escape_string($_FILES['image']['type']);
            if(substr($imageType, 0,5)==='image'){
            $this->finance_model->finance_insert($application_id,$registration,$rgistration_amount,$registration_receipt,$studentship,$studentship_amount,$studentship_receipt,
            $payment,$payment_date,$date_register,$date_begine,$imageName,$date_complete,$imageData); 
            $data['result']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' for your registration.! please keep visiting while your form is still processing.</font>';
            $this->load->view('registration/finance_view',$data);
            }  else {
            $data['results']='<font>Sorry'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' that file is not required. Try again.!</font>';
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


