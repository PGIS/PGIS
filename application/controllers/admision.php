<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of admision
 *
 * @author emanoble
 */
class Admision extends CI_Controller{
    private $limit=10,$offset=0;
    
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array','string','directory'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Admision staff') {
             redirect('logout');
        }
    }
    
    function index(){
        $dat = array( 'submited'=>'yes');
        $dat1 = array( 'appl_status'=>'no'); 
        $this->db->where($dat1);
        $this->db->order_by('app_id','asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        $data['query']=$query1->result();
        $this->load->view('Admision/admision',$data);
     
    }
    
    function applicant_details($userid){
            
        $data =  $data=$this->appl_detils($userid) +$this->edu($userid)+$this->additional_data($userid);
        $this->load->view('Admision/applicant_detail',$data);
    }
    
    
    function edu($id) {
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $id));
   
            foreach ($query->result() as $ro) {
                $data2 = array(
                    'specializ' => $ro->specialization,
                    'high_edu' => $ro->high_edu_attained,
                    'institut' => $ro->institution,
                    'gradu_year' => $ro->year_of_gradu,
                    'gpa' => $ro->gpa,
                    'other_qualification' => $ro->other_qualification,
                    'dof' => $ro->dof,
                    'dot' => $ro->dot,
                    'responsibility' => $ro->nature_of_work,
                    'employer' => $ro->comp_employed,
                    'release' => $ro->comp_release_agre,
                    'position' => $ro->position
                );
                
            }return $data2;
        }
        
       function additional_data($id) {
        $query = $this->db->get_where('tb_referee', array('referee_id' => $id));
        
            foreach ($query->result() as $ro) {
                $value2 = array(
                    'fi_refname' => $ro->first_refname,
                    'se_refname' => $ro->second_refname,
                    'thr_refname' => $ro->Third_refname,
                    'fi_refemail' => $ro->first_email,
                    'se_refemail' => $ro->second_email,
                    'thr_refemail' => $ro->third_email,
                    'spon_mode' => $ro->sponsership_mode,
                    'spon_name' => $ro->sponser_name,
                    'spon_addr' => $ro->sponser_address,
                    'fi_refaddr' => $ro->first_address,
                    'se_refaddr' => $ro->second_address,
                    'thr_refaddr' => $ro->third_address,
                    'fprospec' => $ro->fio_rospectus,
                    'feduca' => $ro->fi_education_trade,
                    'fjournal' => $ro->fi_newspaper,
                    'fwww' => $ro->fi_www,
                    'funiver' => $ro->fi_university,
                    'fother' => $ro->fi_other 
                );
            }
            unset($ro);
        return $value2;  
        }     
        
        
        function  appl_detils($id){
         $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$id));
         foreach ($query->result() as $row) {
                $dat = array(
                    'userid'=>$row->userid,
                    'Ucollege' => $row->college,
                    'Ucourse' => $row->prog_name,
                    'prog_mod'=>$row->prog_mode,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'appid'=>$row->app_id,
                    'datebirth' => $row->dob,
                    'country' => $row->cob,
                    'department'=>$row->department,
                    'nationalt' => $row->nationality,
                    'perm_addres' => $row->parm_address,
                    'disability' => $row->disability,
                    'disab_natur' => $row->disab_nature,
                    'landlin' => $row->landline_no,
                    'mobil' => $row->mobile_no,
                    'fax' => $row->fax_no,
                    'email' => $row->email
                );
           
        }return $dat;
        }
        
        
    function  admit($userid=''){
           $que = $this->db->get_where('tb_app_personal_info', array('userid' => $userid),1);
           if($que->num_rows()==0){
               redirect('admision');
           }
           $data=$this->appl_detils($userid);
          if(isset($_POST['send'])){
           $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[80]|xss_clean');
           $this->form_validation->set_rules('to', 'Receiver', 'required|max_length[40]|xss_clean');
           $this->form_validation->set_rules('msgbody', 'Message body', 'required|xss_clean');
           $this->form_validation->run();
                if($this->form_validation->run() == TRUE){
                    $to=$this->input->post('to');
                  $this->load->model('messaging');
                  Messaging::add_message();
                  $data['sent']='Message sent';
                  if(isset($_POST['tomail'])){
                      $alah=$this->send_email($this->find_sender_email($to), $this->input->post('subject'), $this->input->post('msgbody'),$to);
                      if($alah){
                          $data['toemail']='message sent to email';
                      }else{
                          $data['ntoemail']='not sent to email';
                      }
                  }
                   }
                }
          
        $z = $this->db->count_all('tb_admision')+10;
      
        if($this->count_digit($z)==2){
            $k='000'.$z;
        }elseif ($this->count_digit($z)==3) {
              $k='00'.$z;
        }
        elseif ($this->count_digit($z)==4) {
            $k='0'.$z;
        }elseif ($this->count_digit($z)==5) {
            $k=''.$z;
        }
        $reg= ''.date('Y').'-06-'.$k;
         $this->load->model('admision_model');
            Admision_model::admit($data['appid'],$reg,$userid,$data['Ucourse'],$data['sname'],$data['other_nam'],$data['nationalt'],$data['department']);
            Admision_model::verify_form($userid);
        $this->load->view('Admision/verify_notifi',$data);
        
        }
        
        function count_digit($number) {
            return strlen((string) $number);
        }
        
        
      function sendadmission($userid){
          $data=$this->appl_detils($userid);
          $array = array(
               'admision_letter' => 'sent'
            );
          $data['appsent']='admission letter Sent';
          $this->db->where('app_id', $userid);
          $this->db->update('tb_app_prev_info', $array); 
          $this->load->view('Admision/verify_notifi',$data);
      }
        
        function admitted_applicants(){
           $dat = array( 'appl_status'=>'yes');
           $query1 = $this->db->get_where('tb_app_personal_info', $dat);
           $data['query']=$query1->result();
           $this->load->view('Admision/admited_applicants',$data);
        }
        
        function pending($userid){
              $data=$this->appl_detils($userid);
              $data['userid']=$userid;
              $this->load->model('messaging');
              Messaging::return_to_customer($userid);
              $data['openappl']=TRUE;
              $this->load->view('Admision/denied_appl_message',$data);
        }
        function creating_pdf($userid){
             $data=$this->appl_detils($userid);
             $html = $this->load->view('Admision/admissionletter',$data,TRUE);
		
		$pdf_filename  = $userid.'.pdf';
		$this->load->library('dompdf_lib');
                $this->dompdf_lib->convert_html_to_pdf($html,$userid,$pdf_filename, TRUE);
                 
        }
        function send_email($to,$subject,$message,$file){
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from('pgis@gmail.com','PGIS TEAM');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $path = $this->config->item('server_root');
                $file = $path . './attachments/admission_letter/'.$file.'.pdf';
                $this->email->attach($file);
                if (@$this->email->send()){
                    return TRUE; 
                }  else {
                    return FALSE;
                }
        }
        
        function find_sender_email($to){
            $this->db->select('email');
           $query = $this->db->get_where('tb_user', array('userid' => $to),1);
            foreach ($query->result() as $email){
                return $email->email;
            }
            
        }
    }

