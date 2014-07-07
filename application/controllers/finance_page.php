<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Finance_page extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form','url','html');
        $this->load->library('form_validation','session');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        if(!$this->session->userdata('logged_in')){
            redirect('logout');  
        }elseif ($this->session->userdata('user_role')!='Student') {
            redirect('logout'); 
        }
    }
    public function index($se=0,$sf=0){
        $data['se']=$se.'/'.$sf;
        $data['regid']=$this->session->userdata('userid');
        $this->load->view('registration/finance_view1',$data);  
    }
    public function finance(){
          $data=$this->changeinvalid();  
        if(isset($_POST['feesave'])){
            unset($data);
        }
        
        $data['active']=TRUE;
        $config['upload_path']='./upload_docs/';
        $config['allowed_types']='jpg|png|gif|pdf|jpeg';
        $config['overwrite']=TRUE;
        $this->load->library('upload',$config);
        $this->form_validation->set_rules('amnt','Amount','trim|numeric|required|xss_clean');
        $this->form_validation->set_rules('rescpt','Receipt','trim|required|xss_clean');
        $this->form_validation->set_rules('reg_fees','Registration year','trim|required|xss_clean');
        $this->form_validation->set_rules('date_payment','Date of payment','trim|required|xss_clean');
        $this->form_validation->set_rules('pay_mode','Payment mode','trim|required|xss_clean');
        if(!$this->upload->do_upload()||$this->form_validation->run()===FALSE){
           $this->load->view('registration/finance_view',$data);
        }  else {
            $this->load->model('finance_model');
            $registration_id= $this->session->userdata('registration_id');
            $application_id= $this->session->userdata('userid');
            $registration=  $this->input->post('reg_fees');
            $rgistration_amount=  $this->input->post('amnt');
            $registration_receipt=  $this->input->post('rescpt');
            $payment_date=  $this->input->post('date_payment');
            $academic=  $this->input->post('acy');
            $payment=  $this->input->post('pay_mode');
            $imageName= base_url().'upload_docs/'.pg_escape_string($_FILES['userfile']['name']);
            $this->finance_model->finance_insert($registration_id,$registration,$rgistration_amount,$registration_receipt,
            $payment,$payment_date,$imageName,$academic,$application_id);
            $data['result']='<font>Thanks'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' For registration.!</font>';
            $this->load->view('registration/finance_view',$data);
        }
      }
      function show_data(){
          $sn = $this->session->userdata('userid');
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
      function changeinvalid(){
            $this->db->where('registration_id',$this->session->userdata('registration_id'));
            $change=  $this->db->get_where('tb_finance',array('regstatus'=>'rejected'),1);
            if($change->num_rows()>0){
                foreach ($change->result() as $list){
                    $result=array(
                        'recept_no'=>$list->receipt_no,
                        'year'=>$list->payment_details,
                        'amount'=>$list->amount_paid,
                        'modepay'=>$list->mode_payment,
                        'accyear'=>$list->academic_year,
                        'pay_date'=>$list->date_payment
                    );
                }
                return $result;
            }  else {
                return array();  
            }
      }
      
            }
      

