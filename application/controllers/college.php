<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class College extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='college principle'){
            redirect('logout');
        }
     }
     function index(){
         $data['query']=  $this->index2();
         $data['query1']=  $this->external_unass();
         $data['ext']=  $this->external_exer();
         $data['active1']=TRUE;
         $this->load->view('College/college_view',$data);   
     }
     function index2(){
         $res1=  $this->db->select('*')->from('tb_examiner_desert')->join('tb_student','tb_student.registrationID = tb_examiner_desert.registrationID')
                 ->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID')->where(array('statuz'=>'assigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            }
     }
     function external_exer(){
         $res1=  $this->db->select('*')->from('tb_examiner_desert')->join('tb_student','tb_student.registrationID = tb_examiner_desert.registrationID')
                 ->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID')->where(array('ex_status'=>'no','statuz'=>'assigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            }
     }
        function external_unass(){
        $res1=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('internal_ex_status'=>'unassigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            } 
     }
       public function recent_detail($id){
         $data['recent']=$id;
         $this->load->view('College/college_recent_detail',$data);
     }
     function studentDetail($id){
         $data['st']=$id;
         $this->load->view('College/studentInfo',$data);
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
         $this->load->view('academic/student_info',$data);
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
                $doc=$this->load->view('academic/studentinfopdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
         function download($id){
         $this->load->helper('download');
         $res=  $this->db->get_where('tb_student_desert',array('id'=>$id));
         if($res->num_rows()===1){
             $row=$res->row();
             $path=  file_get_contents('project_document/'.substr($row->document, 39));
             $name=  substr($row->document, 39);
             force_download($name,$path);
         }
     }
     function feedback(){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         if($res->num_rows()>0){
            $data['ret']=$res;
            $this->load->view('academic/college_feedback',$data);
         }  else {
             $data['ret']=$res;
             $this->load->view('academic/college_feedback',$data);
         }
        
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
              $this->load->view('academic/college_presentation_feedback',$data);
            }else{
               $this->load->model('supervisor_model');
               Supervisor_model::saveVerdicts($data['registrationID'],$data['projectid'],$data['supervisor']);
               $data['saved']=TRUE;
               $this->load->view('academic/college_presentation_feedback',$data);  
            }
         }else{
            $this->load->view('academic/college_presentation_feedback',$data); 
         }
     }
     
     function pr_feed($id){
         $data=  $this->feedback_put($id);
         $this->load->view('academic/college_presentation_feedback',$data);
     }
     function external(){
         $data['query']=  $this->external_unass();
         $this->load->view('College/college_external',$data);
     }
     function extendz($id){
         $res=  $this->db->get_where('tb_project',array('id'=>$id),1);
         foreach ($res->result() as $row){
             $data=array(
                 'registid'=>$row->registration_id
             );
             unset($row);
         $this->load->view('academic/internal_assign',$data);
         }
     }
    function record_entry($id){
         $query=  $this->db->get_where('tb_project',array('id'=>$id));
         if($query->num_rows()===1){
             $row=$query->row();
         $this->load->model('supervisor_model');
         $email=  $this->input->post('assign');
         if($row->Internal_supervisor===$email){
             echo '<p class="alert alert-danger">Already assigned as the first supervisor</p>';
         }  else {
         $this->supervisor_model->sec_supervisor_assign($id,$email);
         $this->db->where('id',$id);
         $this->db->update('tb_project',array('status'=>'assigned'));
         echo '<p class="alert alert-success">Successifully assigned.</p>';
         }
         }else {
          echo '<p class="alert alert-danger">Oops something went wrong.</p>'; 
         }
     }
     function index3(){
         $res1=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status_by_principle'=>'assigned'))->get();
         $res2=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         $res3=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned','status_by_principle'=>'assigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            }elseif ($res2->num_rows()>0) {
             return $res2;
        }elseif ($res3->num_rows()>0) {
            return $res3;
        } 
     }
        function assigned(){
         $data['query']=  $this->index3();
         $data['active']=TRUE;
         $res=   $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                        ->where(array('status_by_principle'=>'unassigned'))->get();
          if($res->num_rows()>0){
                $data['records']= $res;
                $this->load->view('College/college_view_sup',$data);
                 }  else {
                  $this->load->view('College/college_view_sup',$data);   
                 }
     }
     public function assign($id){
      $data=  $this->project_display($id);
      $data['teach']=  $this->teaching();
      $this->load->view('College/college_assign',$data);
     }
 
 public function teaching(){
     $this->db->select('*');
     $this->db->from('tb_user');
     $this->db->join('tb_staff','tb_staff.staffId = tb_user.userid');
     $this->db->like('designation','Teaching staff');
     $res= $this->db->get();
         if($res->num_rows()>0){
             return $res;
          } 
         }
 public function project_display($id) {
      $res=$this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
              ->where(array('id'=>$id))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $array_data=array(
                    'id'=>$row->id,
                    'registrationID'=>$row->registration_id,
                    'project_title'=>$row->project_title,
                    'project_description'=>$row->project_description,
                    'internal_supervisor'=>$row->Internal_supervisor,
                    'surname'=>$row->surname,
                    'lastname'=>$row->other_name,
                    'external_supervisor'=>$row->external_supervisor
                );
            }
            $this->session->set_userdata($array_data);
            unset($row);
            return $array_data;
      }
     }
    function record_internal($userid){
         $query=  $this->db->get_where('tb_project',array('registration_id'=>$userid));
         if($query->num_rows()===1){
             $row=$query->row();
         $this->load->model('supervisor_model');
         $external=  $this->input->post('assign');
         $userid=$row->registration_id;
         $this->supervisor_model->insert_supervisor($userid,$external);
         echo '<p class="alert alert-success">Successifully assigned.</p>';
         }  else {
          echo '<p class="alert alert-danger">Oops something went wrong.</p>'; 
         }
         $this->db->where('registration_id',$userid);
         $this->db->update('tb_project',array('internal_ex_status'=>'assigned'));
     }
     function presentationFeedback(){
         $this->load->view('College/desertationlist');
     }
     function studentVerdicts($id){
         $this->db->select('*');
         $this->db->from('tb_project');
         $this->db->where('id',$id);
         $this->db->join('tb_student','tb_student.registrationID = tb_project.registration_id');
         $ver =$this->db->get();
         foreach ($ver->result() as $list){
             $data=array(
                 'student_id'=>$list->registrationID,
                 'ptitle'=>$list->project_title,
                 'lname'=>$list->surname,
                 'sname'=>$list->other_name,
             );
         }
         
         $this->load->view('College/superverdlist',$data); 
     }
     function viewVerdicts($id){
     $this->db->select('*');
     $this->db->from('tb_verdicts');
     $this->db->where('ver_id',$id);
     $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
     $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
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
            unset($ver);
     $this->load->view('College/teachinverdics',$data);
    }
    
    function applicantsAdmission(){
        $dat = array('depchek' => 'yes','colcheck' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        $data['query1']= $query1->result();
        $this->load->view('College/collegeviewAdmission', $data);
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
   function examinerTest($res){
       $data['rest']=$res;
       $this->load->view('College/recordsExternal',$data);
       }
       function externalAssign($id){
           $data['rest']=$id;
           $this->form_validation->set_rules('examiner','select','trim|required|xss_clean');
           $this->form_validation->run();
           if(isset($_POST['save'])){
               if($this->form_validation->run()===FALSE){
                   $this->load->view('College/recordsExternal',$data);
               }  else {
                 $this->load->model('supervisor_model');
                 $external_exa=  $this->input->post('examiner');
                 $this->supervisor_model->savedCollege($id,$external_exa);
                 $data['smz']='<p class="alert alert-success">Examiner assigned</p>';
                 $this->load->view('College/recordsExternal',$data);
               }
           }
   }
   function externalList($id){
       $data['ext']=$id;
       $this->load->view('College/supervisor_list',$data);
   }
   function externalAllocation($id){
       $data['ext']=$id;
       $this->form_validation->set_rules('super','Select','required|xss_clean');
       $this->form_validation->run();
       if(isset($_POST['save'])){
           if($this->form_validation->run()===FALSE){
               $this->load->view('College/supervisor_list',$data);
           }  else {
               $this->load->model('supervisor_model');
               $external_sup=  $this->input->post('super');
               $this->supervisor_model->sevedExternal($id,$external_sup);
               $data['success']='<p class="alert alert-success">Assigned successifully</p>';
               $this->load->view('College/supervisor_list',$data);
           }
       }
   }
 }   
 
