<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Project_page extends CI_Controller{
      function __construct() {
          parent::__construct();
          $this->load->helper('form','url','html');
          $this->load->library('form_validation');
          if(!$this->session->userdata('logged_in')){
              redirect('logout');
          }elseif ($this->session->userdata('user_role')!='Student') {
              redirect('logout');
        }
      }
      function index(){
          $data1=  $this->supervisors();
          $data2=  $this->check_exist();
          $data=$data1+$data2;
          $data['after']=  $this->comments_after();
          $data['verdicts']=  $this->verdicts();
          $data['active']=TRUE;
          $data['actived1']=TRUE;
          $sn= $this->session->userdata('registration_id');
          $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn));
          if($res->num_rows()===1){
             $data['records']=$res; 
             $this->load->view('academic/project_view',$data);
          }  else {
             $data['smg']='<p class="alert alert-warning">No updates.!</p>';
             $this->load->view('academic/project_view',$data);
          }
          
      }
      function project_insert(){
          $this->form_validation->set_rules('prj','Project Title','required|xss_clean');
          $this->form_validation->set_rules('prd','Project Description','required|xss_clean');
          $this->form_validation->set_rules('pis','Name','trim|required|xss_clean');
          $data['records']=  $this->supervisors_view();
          $data['after']=  $this->comments_after();
          $data['verdicts']=  $this->verdicts();
          $data=  $this->check_exist();
          $data['active']=TRUE;
          $data['actived1']=TRUE;
          if($this->form_validation->run()===FALSE){
              $this->load->view('academic/project_view',$data);
          }  else {
            $this->load->model('project_model');
            $project_id=  $this->session->userdata('registration_id');
            $project_title=  $this->input->post('prj');
            $email=  $this->input->post('pis');
            $project_description=  $this->input->post('prd');
            $this->project_model->project_form($project_id,$project_title,$project_description,$email);
            $data['pg']='<p class="alert alert-success text-center">You project proporsal has sent</p>';
            $this->load->view('academic/project_view',$data);
          }
      }
      function project_progress(){
         $data['after']=  $this->comments_after();
         $data['verdicts']=  $this->verdicts();
         $data['records']=  $this->supervisors_view();
         $data=  $this->check_exist();
         $data['active2']=TRUE;
          $data['actived1']=TRUE;
         unset($data['active']);
         $config['upload_path']= './project_document/';
         $config['allowed_types']='pdf|doc|docx';
         $config['overwrite']=TRUE;
         $config['remove_spaces']=FALSE;
         $this->load->library('upload',$config);
         if(!$this->upload->do_upload()){
             $data['error']=  $this->upload->display_errors();
              $this->load->view('academic/project_view',$data);  
          }  else{ 
             $this->load->model('project_model');
             $sn=  $this->session->userdata('registration_id');
             $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn));
             if($res->num_rows()===1){
              $row=$res->row();
             $internal= $row->Internal_supervisor;
             $external= $row->sec_internal_supervisor;
             $external_sup=$row->external_supervisor;
             $date_sub= date('m/d/Y');
             $document=  base_url().'project_document/'.pg_escape_string($_FILES['userfile']['name']);
             $this->project_model->project_prog($sn,$internal,$external,$document,$date_sub,$external_sup);
             $data['smgsuc']='<p class="alert alert-success">You project has been sent.!</p>';
             $this->load->view('academic/project_view',$data);
             }  else {
               $data['data']='<p class="alert alert-danger">You havent assigned a supervisor</p>';
               $this->load->view('academic/project_view',$data);
             }
            }
         }
            function check_exist(){
             $sn=  $this->session->userdata('registration_id');
             $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn));
             if($res->num_rows()===1){
                 foreach ($res->result() as $row){
                 $array=array(
                     'internal'=>$row->Internal_supervisor,
                     'external'=>$row->sec_internal_supervisor
                 );
             }
             unset($row);
             return $array;
             }  else {
                 $array=array(
                     'external'=>'Not assigned',
                     'internal'=>'You didint select. please select.'
                 );
                 return $array;
             }
            }
            function supervisors(){
                $sn=  $this->session->userdata('registration_id');
                $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn,'status'=>'assigned'));
                if($res->num_rows()===1){
                    foreach ($res->result() as $row){
                        $array_data=array(
                            'supervisor'=>$row->Internal_supervisor,
                            'external'=>$row->sec_internal_supervisor
                        );
                    }
                    unset($row);
                    return $array_data;
                }  else {
                    $array_data=array(
                        'supervisor'=>'You didnt send the project proposal',
                        'external'=>'Not assigned.!'
                    );
                    return $array_data;
                }
            }
          function supervisors_view(){
          $sn= $this->session->userdata('registration_id');
          $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn));
          if($res->num_rows()===1){
             return $res;
          }  else {
             return FALSE;
          }
         }
         function comments_after(){
            $sn=  $this->session->userdata('registration_id');
            $res=  $this->db->get_where('tb_pprogress',array('registrationID'=>$sn));
            if($res->num_rows()>0){
                return $res;  
            }  
         }
         function delete_comments($regist_id){
             $data=  $this->check_exist();
             $data['active1']=TRUE;
             $data['actived1']=TRUE;
             $res=  $this->db->get_where('tb_pprogress',array('registrationID'=>$regist_id));
             if($res->num_rows()>0){
                 $this->db->where('registrationID',$regist_id);
                 $this->db->delete('tb_pprogress');
                 $data['delete']='<p class="alert alert-success">Comments deleted..!</p>';
                 $this->load->view('academic/project_view',$data);
             }  else {
                 $data['delete1']='<p class="alert alert-danger">No comments found..</p>';
                 $this->load->view('academic/project_view',$data);  
             }
             
         }
         function general(){
          $sn= $this->session->userdata('registration_id');
          $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn));
          if($res->num_rows()===1){
              return $res; 
         }  else {
             echo '<p class="alert alert-danger">No</p>';
         }
         }
         function verdicts(){
             $reg_id=  $this->session->userdata('registration_id');
             $res=  $this->db->get_where('tb_verdicts',array('registrationId'=>$reg_id));
             if($res->num_rows()>0){
                 return $res;
             }
         }
         function verdict_view($pid){
            $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->where('tb_verdicts.ver_id',$pid);
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
            
     $this->load->view('academic/teachinverdics',$data);
         }
         function verdicts_viewed(){
             $reg_id=  $this->session->userdata('registration_id');
             $res=  $this->db->get_where('tb_verdicts',array('viewed'=>'yes','registrationId'=>$reg_id));
             if($res->num_rows()>0){
                 return $res;
             }
         }
         function delete($id){
            $res=  $this->db->get_where('tb_verdicts',array('ver_id'=>$id));
            if($res->num_rows()===1){
                $this->db->where('ver_id',$id);
                $this->db->delete('tb_verdict');
                redirect('project_page');
            }
         }
         function download($id){
             $this->load->helper('download');
             $res=  $this->db->get_where('tb_pprogress',array('id'=>$id));
             if($res->num_rows()>0){
                 $row=$res->row();
                 $path=  file_get_contents('project_feedback/'.substr($row->document,39));
                 $data=  substr($row->document,39);
                 force_download($data,$path);
             }
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
             $doc=$this->load->view('academic/teachinverdicspdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
     function staff_search($name=''){
        $res=  $this->db->select('*')->from('tb_staff')->like('staffId',$name,'after')->get();
        if($res->num_rows()>0){
            $row=$res->row();
            echo '<label class="alert-success"> You mean '.' '.$row->fullName.'</label>';
        }  else {
            echo '<label class="alert-danger"> No match found with this '.' '.$name.' '.'name</label>';
        }
     }
   }
  

