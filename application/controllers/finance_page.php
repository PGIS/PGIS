<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Finance_page extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form','url','html');
        $this->load->library('form_validation');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        if(!$this->session->userdata('logged_in')){
            redirect('logout');  
        }elseif (!$this->session->userdata('userid')=='Student') {
            redirect('logout'); 
        }
    }
    public function index(){
        $data['active']=TRUE;
        $data1=  $this->finance_detail();
        $data2=  $this->show_data();
        $data=$data1+$data2;
        $this->load->view('registration/finance_view1',$data);  
    }
    public function finance(){
        $data['active']=TRUE;
        $config['upload_path']='./upload_docs/';
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
            $academic=  $this->input->post('acy');
            $payment=  $this->input->post('pay_mode');
            $imageName= base_url().'upload_docs/'.pg_escape_string($_FILES['userfile']['name']);
            $this->finance_model->finance_insert($application_id,$registration,$rgistration_amount,$registration_receipt,
            $payment,$payment_date,$imageName,$academic);
            $data['result']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' For registration.!</font>';
            $this->load->view('registration/finance_view',$data);
        }
      }
      function show_data(){
          $sn=  $this->session->userdata('userid');
          $res=  $this->db->get_where('tb_studentReg',array('regist_name'=>$sn));
          if($res->num_rows()===1){
              foreach ($res->result() as $ro){
                  $array_data=array(
                      'registration_name'=>$ro->regist_name,
                      'postponement'=>$ro->postponement,
                      'postponement_date'=>$ro->date_postponement,
                      'extension'=>$ro->extension,
                      'ext_date'=>$ro->date_extension,
                      'period'=>$ro->month_extension,
                      'freezing'=>$ro->freezing,
                      'freez_date'=>$ro->date_freezing,
                      'resume_date'=>$ro->date_resume,
                      'post_reasons'=>$ro->postponemet_reason,
                      'freez_reasons'=>$ro->freezing_reason,
                      'exte_reasons'=>$ro->extending_reason
                  );
              }
              unset($ro);
              return $array_data;
          }  else {
              $array_data=array(
                  'registration_name'=>'',
                  'postponement'=>'',
                  'postponement_date'=>'',
                  'extension'=>'',
                  'ext_date'=>'',
                  'period'=>'',
                  'freezing'=>'',
                  'freez_date'=>'',
                  'resume_date'=>'',
                  'post_reasons'=>'',
                  'freez_reasons'=>'',
                  'exte_reasons'=>''
              );
              return $array_data;
          }
          
      }
      function finance_detail(){
          $this->load->model('finance_model');
          $sn=  $this->session->userdata('userid');
          $query=  $this->db->get_where('tb_finance',array('registration_id'=>$sn));
          if($query->num_rows()>0){
              foreach ($query->result() as $row){
                  $array=array(
                      'application_id'=>$row->registration_id,
                      'registration_receipt'=>$row->receipt_no,
                      'registration'=>$row->payment_details,
                      'registration_amount'=>$row->amount_paid,
                      'registration_total'=>$row->amount_required,
                      'payment'=>$row->mode_payment,
                      'date_pay'=>$row->date_payment,
                      'support_doc'=>$row->suporting_doc,
                      'academic'=>$row->academic_year
                  );
              }unset($row);
              return $array;
          }else {
              $array=array(
                  'application_id'=>'',
                  'registration_receipt'=>'',
                  'registration'=>'',
                  'registration_amount'=>'',
                  'registration_total'=>'',
                  'payment'=>'',
                  'date_pay'=>'',
                  'support_doc'=>''
             );
             return $array;
          }
      }
      
    }


