<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of admision
 *
 * @author emanoble
 */
class College_Coordinator extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array','string','directory','file'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='college coordinator') {
             redirect('logout');
        }
    }
    
    function index(){
        
        $data['query']=  $this->uncheckedApp();
        $data['query1']=  $this->checkedApplications();
        $data['active']=TRUE;
        $this->load->view('College/coadmision',$data);
     
    }
    
    function uncheckedApp(){
        $dat = array('submited' => 'yes');
        $dat1 = array('depchek' => 'yes','colcheck' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id','asc');
        $query1 = $this->db->get_where('tb_app_personal_info',$dat);
        return $query1->result();
    }
    
    function welcome(){
        $this->load->view('College/welcome');
    }
    
    function applicant_details($userid){
            
        $data =  $data=$this->appl_detils($userid) +$this->edu($userid)+$this->additional_data($userid);
        $this->load->view('College/applicant_detail',$data);
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
           return $dat;
        }
        }
        
        function checkedApplications(){
           $dat = array('depchek' => 'yes','colcheck' => 'yes');
           $query1 = $this->db->get_where('tb_app_personal_info', $dat);
           return $query1->result();
        }
 
        
        function feedback(){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         if($res->num_rows()>0){
            $data['ret']=$res;
            $this->load->view('College/college_feedback',$data);
         }  else {
             $data['ret']=$res;
             $this->load->view('College/college_feedback',$data);
         }
        
     }
     
     function registerFeedback($id){
         $data=  $this->feedback_put($id);
         $this->form_validation->set_rules('prtype', 'Presentation', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('level', 'Level', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('prdate', 'Presentation date', 'required|max_length[20]|xss_clean|is_unique[tb_verdicts.pr_date]');
         $this->form_validation->set_rules('comments', 'Comments','required|xss_clean');
         $this->form_validation->set_rules('verdict', 'verdict', 'required|xss_clean');
         $this->form_validation->set_rules('panel', 'Panel', 'required|xss_clean');
         if(isset($_POST['save'])){
            if($this->form_validation->run()===FALSE){
              $this->load->view('College/college_presentation_feedback',$data);
            }else{
               $this->load->model('supervisor_model');
               Supervisor_model::saveVerdicts($data['registrationID'],$data['projectid'],$data['supervisor']);
               $data['saved']=TRUE;
               $this->load->view('College/college_presentation_feedback',$data);  
            }
         }else{
            $this->load->view('College/college_presentation_feedback',$data); 
         }
     }
     
     function pr_feed($id){
         $data=  $this->feedback_put($id);
         $this->load->view('College/college_presentation_feedback',$data);
     }
     
     function feedback_put($id){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('registration_id'=>$id))->get();
         if($res->num_rows()===1){
             foreach ($res->result() as $detail){
                 $data_rec=array(
                   'registrationID'=>$detail->registration_id,
                    'project_title'=>$detail->project_title,
                    'project_description'=>$detail->project_description,
                    'supervisor'=>$detail->Internal_supervisor,
                    'surname'=>$detail->surname,
                    'lastname'=>$detail->other_name,
                    'projectid'=>$detail->id  
                 );
             }
             unset($detail);
             return $data_rec;
        }
     }
    public function recent_detail($id){
         $data['recent']=$id;
         $this->load->view('College/college_recent_detail',$data);
     }
     public function recent_detailcollege($id){
         $data['recent']=$id;
         $this->load->view('College/college_recent_detailcollege',$data);
     }
     
        function details($id){
         $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->where('tb_verdicts.ver_id',$id);
            $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
            $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
            $verdic =$this->db->get();
           foreach ($verdic->result()as $ver){
            $data=array(
                    'type'=>$ver->type,
                    'registrationid'=>$ver->registrationID,
                    'level'=>$ver->level,
                    'comments'=>$ver->comment,
                    'verdict'=>$ver->verdicts,
                    'panel'=>$ver->panel,
                    'lname'=>$ver->surname,
                    'sname'=>$ver->other_name,
                    'department'=>$ver->department,
                    'programe'=>$ver->program,
                    'title'=>$ver->project_title,
                    'prdate'=>$ver->pr_date
                );
            }
         $this->load->view('College/student_info',$data);
     }
     
     function downloadpdf($id){
       $this->load->helper('dompdf','file');
            $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->where('tb_verdicts.ver_id',$id);
            $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
            $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
            $verdic =$this->db->get();
             $row=$verdic->row();
           foreach ($verdic->result()as $ver){
            $data=array(
                    'type'=>$ver->type,
                    'registrationid'=>$ver->registrationID,
                    'level'=>$ver->level,
                    'comments'=>$ver->comment,
                    'verdict'=>$ver->verdicts,
                    'panel'=>$ver->panel,
                    'lname'=>$ver->surname,
                    'sname'=>$ver->other_name,
                    'department'=>$ver->department,
                    'programe'=>$ver->program,
                    'title'=>$ver->project_title,
                    'prdate'=>$ver->pr_date
                );
            }
                $doc=$this->load->view('College/studentinfopdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
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
           Admision_model::recommendationCol($id);
       }
    }
    
    function applicationFoward($id){
           $this->load->model('admision_model');
           Admision_model::applicationFowardCol($id);
            $data['query'] = $this->uncheckedApp();
            $data['query1'] = $this->checkedApplications();
            $data['active1'] = TRUE;
            $data['msgfr']=TRUE;
            $this->load->view('College/coadmision', $data);
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
   function forward($registration){
       $data['registration_id']=$registration;
       $res=  $this->db->select('*')->from('tb_project')->join('tb_student',' tb_student.registrationID = tb_project.registration_id')
               ->where(array('registration_id'=>$registration))->get();
       if($res->num_rows()===1){
           $data['forward']=$res;
           $this->load->view('College/forward_toExaminer',$data);
       }
   }
   function feedBackAttach($registId){
       $data['registration_id']=$registId;
       $config['upload_path']= './project_feedback/';
       $config['allowed_types']='pdf|doc|docx';
       $config['overwrite']=TRUE;
       $config['remove_spaces']=FALSE;
       $this->load->library('upload',$config);
       if(!$this->upload->do_upload()){
           $data['error']=  $this->upload->display_errors();
         $this->load->view('College/forward_toExaminer',$data); 
         }  else {
         $this->load->model('supervisor_model');
           $registration_number=  $registId;
           $inserter_name= $this->session->userdata('email');
           $document=  base_url().'project_feedback/'.pg_escape_string($_FILES['userfile']['name']);
           $this->supervisor_model->feedbackAttach($document,$inserter_name,$registration_number);
           $data['success']='<p class="alert alert-success">Document has sent to examiners.!</p>';
           $this->load->view('College/forward_toExaminer',$data); 
          
           }
   }
   function examiners(){
       $data['active']=TRUE;
       $data['internal']=  $this->internal_result();
       $data['external']=  $this->external_result();
       $data['comb']=  $this->combinedBoth();
       $this->load->view('College/examiner_output',$data);
   }
   function internal_result(){
       $this->db->select('*');
       $this->db->from('tb_int_feedback');
       $this->db->join('tb_student','tb_student.registrationID = tb_int_feedback.registration_fedId');
       $this->db->join('tb_examiner_desert','tb_examiner_desert.registrationID = tb_int_feedback.registration_fedId');
       $this->db->where('statud','yes');
       $res=  $this->db->get();
       if($res->num_rows()>0){
           return $res;
       }
   }
   function external_result(){
      $this->db->select('*');
       $this->db->from('tb_ext_feedback');
       $this->db->join('tb_student','tb_student.registrationID = tb_ext_feedback.registration_fedID');
       $this->db->join('tb_examiner_desert','tb_examiner_desert.registrationID = tb_ext_feedback.registration_fedID');
       $this->db->where('status','yes');
       $res=  $this->db->get();
       if($res->num_rows()>0){
           return $res;
       } 
   }
   function combinedBoth(){
        $this->db->select('*');
        $this->db->from('tb_ext_feedback');
        $this->db->join('tb_int_feedback','tb_int_feedback.registration_fedId = tb_ext_feedback.registration_fedID');
        $this->db->join('tb_student','tb_student.registrationID = tb_ext_feedback.registration_fedID');
        $this->db->where(array('status'=>'yes','statud'=>'yes'));
        $res=  $this->db->get();
        if($res->num_rows()>0){
            return $res;
        }
   }
     function internaldownload($id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_int_feedback',array('int_id'=>$id));
       if($res->num_rows()===1){
           $row=$res->row();
           $name=  file_get_contents('project_feedback/'.  substr($row->int_document, 39));
           $data=  substr($row->int_document, 39);
           force_download($data,$name);
       }
   }
   function externaldownload($id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_ext_feedback',array('feed_id'=>$id));
       if($res->num_rows()===1){
           $row=$res->row();
           $name=  file_get_contents('project_feedback/'.  substr($row->ext_document, 39));
           $data=  substr($row->ext_document, 39);
           force_download($data,$name);
       }
   }
   function viewInternalComment($id){
       $data['com']=$id;
       $this->load->view('College/internalComments',$data);
   }
   function viewExternalfd($id){
       $data['comz']=$id;
       $this->load->view('College/externalComments',$data);
   }
   function studentGrade($id){
       $data['grads']=$id;
       $this->load->view('College/studentGraduates',$data);
   }
   function sendMessage($regist){
       $config = array(
            'protocol' => 'smtp',
            'smtp_host'=> 'ssl://smtp.gmail.com',
            'smtp_port'=> 465,
            'mailtype' => 'html',
            'smtp_user'=> 'tuzoengelbert@gmail.com',
            'smtp_pass'=> 'ngelageze',
            'charset' => 'iso-8859-1'
        );
       $data['grads']=$regist;
       $res=  $this->db->select('*')->from('tb_student')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_student.applicationID')
               ->where(array('registrationID'=>$regist))->get();
       if($res->num_rows()===1){
           $row=$res->row();
       $this->form_validation->set_rules('message','Message body','trim|required|xss_clean');
       $this->form_validation->run();
       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");
       $this->email->from('pgis@gmail.com', 'PGIS TEAM');
       if(isset($_POST['save'])){
          if($this->form_validation->run()===FALSE){
              $this->load->view('College/studentGraduates',$data);
          }  else {
              $this->load->model('supervisor_model');
              $message=  $this->input->post('message');
              $email=$row->email;
              $username=$row->userid;
              $number=$row->mobile_no;
              $registration=$regist;
              $sender=  $this->session->userdata('email');
              $this->supervisor_model->toMessage($message,$username,$sender);
              $this->supervisor_model->toAlumni($registration,$email,$number,$username);
              $this->email->to($email);
              $this->email->subject('PGIS MESSAGE');
              $this->email->message($message);
              if(@$this->email->send()){
              $data['success']='<p class="alert alert-info"> You have added this student to alumni</p>'
                         . '<p class="alert alert-success"> Congurations..! you have sent message for PGIS account wishing good success</p>'
                         . '<p class="alert alert-info"> Message has been sent to email account</p>'; 
                 $this->load->view('College/studentGraduates',$data);
              }
          }
       }
   }
   }
   function studentNotGrade($id){
     $data['grads']=$id;
     $this->load->view('College/studentNotGraduates',$data); 
   }
   function sendNotMessage($regist){
     $config = array(
            'protocol' => 'smtp',
            'smtp_host'=> 'ssl://smtp.gmail.com',
            'smtp_port'=> 465,
            'mailtype' => 'html',
            'smtp_user'=> 'tuzoengelbert@gmail.com',
            'smtp_pass'=> 'ngelageze',
            'charset' => 'iso-8859-1'
        );
       $data['grads']=$regist;
       $res=  $this->db->select('*')->from('tb_student')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_student.applicationID')
               ->where(array('registrationID'=>$regist))->get();
       if($res->num_rows()===1){
           $row=$res->row();
       $this->form_validation->set_rules('message','Message body','trim|required|xss_clean');
       $this->form_validation->run();
       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");
       $this->email->from('pgis@gmail.com', 'PGIS TEAM');
       if(isset($_POST['save'])){
          if($this->form_validation->run()===FALSE){
              $this->load->view('College/studentNotGraduates',$data);
          }  else {
              $this->load->model('supervisor_model');
              $message=  $this->input->post('message');
              $email=$row->email;
              $username=$row->userid;
              $sender=  $this->session->userdata('email');
              $this->supervisor_model->toMessage($message,$username,$sender);
              $this->email->to($email);
              $this->email->subject('PGIS MESSAGE');
              $this->email->message($message);
              if(@$this->email->send()){
              $data['success']='<p class="alert alert-success"> Message is sent for his/her PGIS account wishing good success</p>'
                               . '<p class="alert alert-info"> Message has been sent to email account</p>'; 
                 $this->load->view('College/studentNotGraduates',$data);
              }
          }
       }
   }  
   }
 }
