<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admision
 *
 * @author emanoble
 */
class DirectorPgis extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory','file'));
        $this->load->library(array('form_validation', 'session', 'javascript', 'pagination'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role')!= 'postgraduate director') {
            redirect('logout');
        }
    }

    function index() {

        $data['query'] = $this->uncheckedApp();
        $data['query1'] = $this->checkedApplications();
        $data['active'] = TRUE;
        $this->load->view('Directorate/coadmision', $data);
    }

    function uncheckedApp() {
        $dat = array('submited' => 'yes');
        $dat1 = array('depchek' => 'yes', 'colcheck' => 'yes','pgcheck' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id', 'asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }
    
    function welcome(){
        $this->load->view('Directorate/welcome');
    }
    function applicant_details($userid) {

        $data = $data = $this->appl_detils($userid) + $this->edu($userid) + $this->additional_data($userid);
        $this->load->view('Directorate/applicant_detail', $data);
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

    function appl_detils($id) {
        $query = $this->db->get_where('tb_app_personal_info', array('userid' => $id));
        foreach ($query->result() as $row) {
            $dat = array(
                'userid' => $row->userid,
                'Ucollege' => $row->college,
                'Ucourse' => $row->prog_name,
                'prog_mod' => $row->prog_mode,
                'sname' => $row->surname,
                'other_nam' => $row->other_name,
                'title' => $row->title,
                'appid' => $row->app_id,
                'datebirth' => $row->dob,
                'country' => $row->cob,
                'department' => $row->department,
                'nationalt' => $row->nationality,
                'perm_addres' => $row->parm_address,
                'disability' => $row->disability,
                'disab_natur' => $row->disab_nature,
                'landlin' => $row->landline_no,
                'mobil' => $row->mobile_no,
                'fax' => $row->fax_no,
                'email' => $row->email
            );
            return $dat;
        }
    }

    function checkedApplications() {
        $dat = array('depchek' => 'yes','colcheck' => 'yes', 'pgcheck' => 'yes','appl_status'=>'no');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }

    
    function recommendation($id){
        $this->form_validation->set_rules('rec', 'Recommendation', 'required|xss_clean');
        if($this->input->post('rec')==='Do not admit'){
             $this->form_validation->set_rules('reason', 'Reason for not admit', 'required|xss_clean|'); 
        }
        $this->form_validation->run();
       if ($this->form_validation->run() == FALSE) {
           echo form_error('rec','<div class="error">' ,'</div>');
           echo form_error('reason','<div class="error">' ,'</div>');
       }  else {
           $this->load->model('admision_model');
           Admision_model::recommendationPg($id);
       }
    }
    
    function applicationFoward($id){
           $this->load->model('admision_model');
           Admision_model::applicationFowardPg($id);
            $data['query'] = $this->uncheckedApp();
            $data['query1'] = $this->checkedApplications();
            $data['active1'] = TRUE;
            $data['msgfr']=TRUE;
            $this->load->view('Directorate/coadmision', $data);
    }
    
    function viewRecomendation($id){
            echo    ' <div class=" alert-info">
                    <center>DIRECTORATE RECOMMENDATION</center>
                </div>';
                 $che = array(
                            'userid' => $id,
                            'level' => 'directorate'
                          );
                $requ = $this->db->get_where('tb_admission_recomendation',$che);
                if($requ->num_rows()>0){
                    foreach ($requ->result() as $rere1){
                        $recmdtn1=$rere1->recomendation;
                        $comment1=$rere1->comment;
                    }
                    if($recmdtn1 === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment1.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                
              echo  ' <div class=" alert-info">
                    <center>COLLEGE RECOMMENDATION</center>
                </div>';
                 $chec = array(
                            'userid' => $id,
                            'level' => 'college'
                          );
                $reque = $this->db->get_where('tb_admission_recomendation',$chec);
                if($reque->num_rows()>0){
                    foreach ($reque->result() as $reres){
                        $recmdtn2=$reres->recomendation;
                        $comment2=$reres->comment;
                    }
                    if($recmdtn2 === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment2.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                
               echo ' <div class=" alert-info">
                    <center>DEPARTMENT RECOMMENDATION</center>
                </div>';
                 $check = array(
                            'userid' => $id,
                            'level' => 'department'
                          );
                $requery = $this->db->get_where('tb_admission_recomendation',$check);
                if($requery->num_rows()>0){
                    foreach ($requery->result() as $rereslt){
                        $recmdtn=$rereslt->recomendation;
                        $comment=$rereslt->comment;
                    }
                    if($recmdtn === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
   }
   
     function admitted_applicants(){
          $dat = array('depchek' => 'yes','colcheck' => 'yes', 'pgcheck' => 'yes','appl_status'=>'yes');
           $query1 = $this->db->get_where('tb_app_personal_info', $dat);
           if($query1->num_rows()>0){
            $data['query']=$query1->result();   
           }
           $data['query2']=  $this->rejected_applicants();
           $data['active']=TRUE;
           $this->load->view('Directorate/admited_applicants',$data);
        }
        
        function rejected_applicants(){
          $dat = array('depchek' => 'yes','colcheck' => 'yes', 'pgcheck' => 'yes','appl_status'=>'rejected');
           $query2 = $this->db->get_where('tb_app_personal_info', $dat);
            if($query2->num_rows()>0){
            return $query2->result();  
           }  else {
               return NULL;
           }
        }
        
         function  admit($userid=''){
           $que = $this->db->get_where('tb_app_personal_info', array('userid' => $userid),1);
           if($que->num_rows()==0){
               redirect('directorPgis');
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
        $this->load->view('Directorate/verify_notifi',$data);
        
        }
        
        function count_digit($number) {
            return strlen((string) $number);
        }
        
         function creating_pdf($userid){
             $data=$this->appl_detils($userid);
             $html = $this->load->view('Directorate/admissionletter',$data,TRUE);
		
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
        
        function sendadmission($userid){
          $data=$this->appl_detils($userid);
          $array = array(
               'admision_letter' => 'sent'
            );
          $data['appsent']='admission letter Sent';
          $this->db->where('app_id', $userid);
          $this->db->update('tb_app_prev_info', $array); 
          $this->load->view('Directorate/verify_notifi',$data);
      }
      
      function pending($userid){
              $data=$this->appl_detils($userid);
              $data['userid']=$userid;
              $this->load->model('admision_model');
              Admision_model::rejectapplicant($userid);
              $this->load->view('Directorate/denied_appl_message',$data);
        }
        
        function rejectsms($userid=''){
             $que = $this->db->get_where('tb_app_personal_info', array('userid' => $userid),1);
           if($que->num_rows()==0){
               redirect('directorPgis');
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
                      $alah=$this->rejsend_email($this->find_sender_email($to), $this->input->post('subject'), $this->input->post('msgbody'),$to);
                      if($alah){
                          $data['toemail']='message sent to email';
                      }else{
                          $data['ntoemail']='not sent to email';
                      }
                  }
                   }
                }
                
                $this->load->view('Directorate/denied_appl_message',$data);
        }
        
         function rejsend_email($to,$subject,$message,$file){
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from('pgis@gmail.com','PGIS TEAM');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->attach($file);
                if (@$this->email->send()){
                    return TRUE; 
                }  else {
                    return FALSE;
                }
        }
}
