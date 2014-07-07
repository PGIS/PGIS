<?php

if (!defined('BASEPATH'))
    exit('No irect script access allowed');

class HeadDepartment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form', 'html', 'url');
        $this->load->library(array('form_validation', 'encrypt'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'head of department') {
            redirect('logout');
        }
    }

    function index() {
        $data['query'] = $this->index2();
        $data['active'] = TRUE;
        $res = $this->db->select('*')->from('tb_project')->join('tb_student', 'tb_student.registrationID = tb_project.registration_id')
                        ->where(array('status' => 'unassigned'))->get();
        if ($res->num_rows() > 0) {
            $data['records'] = $res;
            $this->load->view('Department/supervisor_view', $data);
        } else {
            $this->load->view('Department/supervisor_view', $data);
        }
    }

    function index2() {
        $res1 = $this->db->select('*')->from('tb_project')->join('tb_student', 'tb_student.registrationID = tb_project.registration_id')
                        ->where(array('status' => 'assigned'))->get();
        if ($res1->num_rows() > 0) {
            return $res1;
        }
    }
    
    public function assign($id){
      $data=  $this->project_display($id);
      $data['teach']=  $this->teaching();
      $this->load->view('Department/supervisor_assign',$data);
     }
     public function teaching(){
         $res=  $this->db->select('*')->from('tb_user')->join('tb_staff','tb_staff.staffId = tb_user.userid')
                 ->where(array('designation'=>'Teaching staff'))->get();
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
                    'lastname'=>$row->other_name
                );
            }
            $this->session->set_userdata($array_data);
            unset($row);
            return $array_data;
      }
     }
       function comments_entry($id){
         $this->form_validation->set_rules('comme','Comments','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('Department/supervisor_assign');
         }  else {
             $comments=  $this->input->post('comme');
             $this->load->model('supervisor_model');
             $this->supervisor_model->insert_update($id,$comments);
             echo '<p class="alert alert-success">Comments posted</p>';
         }
     }
     
      public function record_entry($id){
         $query=  $this->db->get_where('tb_project',array('id'=>$id));
         if($query->num_rows()===1){
         $this->load->model('supervisor_model');
         $email=  $this->input->post('assign');
         $this->supervisor_model->supervisor_assign($id,$email);
         $this->db->where('id',$id);
         $this->db->update('tb_project',array('status'=>'assigned'));
         echo '<p class="alert alert-success">Successifully assigned.</p>';
         }  else {
          echo '<p class="alert alert-danger">Oops something went wrong.</p>'; 
         }
     }
     public function update($id){
        $res=  $this->db->get_where('tb_user',array('id'=>$id),1);
        if($res->num_rows()===1){
            foreach ($res->result() as $dataz){
                $data_array=array(
                    'username'=>$dataz->userid,
                    'firstname'=>$dataz->fname,
                    'secname'=>$dataz->mname,
                    'email'=>$dataz->email,
                );
            }
            unset($dataz);
            return $data_array;
        }  else {
            $data_array=array(
                'username'=>'',
                'firstname'=>'',
                'secname'=>'',
                'email'=>'',
            );
            return $data_array;
        }
     }
     
     function presentationFeedback(){
         $this->load->view('Department/desertationlist');
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
         
         $this->load->view('Department/superverdlist',$data); 
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
     $this->load->view('Department/teachinverdics',$data);
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
                $doc=$this->load->view('Department/teachinverdicspdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
     
     function applicantsAdmission(){
        $dat = array('depchek' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        $data['query1']= $query1->result();
        $this->load->view('Department/depHeadViewAdmission',$data);
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
}
