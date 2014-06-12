<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Teaching extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
         $this->load->library(array('form_validation','encrypt'));
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('user_role')!=='Teaching staff') {
             redirect('logout');
        }
     }
     function index(){
         $data['assigned']=  $this->assigned();
         $this->load->view('academic/teaching_assigned',$data);
      }
      function project(){
         $data['record']=  $this->posted_project();
         $this->load->view('academic/teaching_view',$data);
      }
         function posted_project(){
         $sn=  $this->session->userdata('userid');
         $sn1=  $this->session->userdata('email');
         $res=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                 ->where(array('supervisor'=>$sn,'status'=>'not replied'))->get();
         $res1=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                 ->where(array('supervisor'=>$sn1,'status'=>'not replied'))->get();
         if($res->num_rows()>0){
         return $res;
         }elseif ($res1->num_rows()>0) {
         return $res1;
        }
   }
   function assigned(){
       $sn=  $this->session->userdata('userid');
       $sn1=$this->session->userdata('email');
       $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
               ->where(array('Internal_supervisor'=>$sn,'status'=>'assigned'))->get();
       $res1=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
               ->where(array('Internal_supervisor'=>$sn1,'status'=>'assigned'))->get();
       if($res->num_rows()>0){
           return $res; 
       }  elseif($res1->num_rows()>0) {
          return $res1;
       }  
   }
     function view($id){
     $res=  $this->db->get_where('tb_student_desert',array('id'=>$id,'status'=>'not replied'));
            $rd=$res->row();
     if($res->num_rows()>0){
          foreach ($res->result() as $row){
              $magic_here=array(
                  'id'=>$row->id,
                  'registration'=>$row->registrationID,
                  'document'=>$row->document
              );
          }
         unset($row);
         $this->load->view('academic/teaching_comment',$magic_here);
      }
    }
   function comment_view($reg_id){
     $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'status'=>'not replied'));
     if($res->num_rows()>0){
         $this->db->where('registrationID',$reg_id);
         $this->db->update('tb_student_desert',array('status'=>'replied'));
          foreach ($res->result() as $row){
              $magic_here=array(
                  'id'=>$row->id,
                  'registration'=>$row->registrationID,
                  'document'=>$row->document
              );
          }
          unset($row);
          return $magic_here;
      }
   }
   function comment($id){
       $res=  $this->db->get_where('tb_student_desert',array('id'=>$id),1);
            $row=$res->row();
           if($res->num_rows()===1){
         $this->db->where('id',$id);
         $this->db->update('tb_student_desert',array('status'=>'replied','read'=>'yes'));
            foreach ($res->result() as $rec){
                $data=array(
                    'id'=>$rec->id,
                    'registration'=>$rec->registrationID,
                    'document'=>$rec->document
                );
            }
            unset($rec);
       $config['upload_path']= './project_feedback/';
       $config['allowed_types']='pdf|doc|docx';
       $config['overwrite']=TRUE;
       $config['remove_spaces']=FALSE;
       $this->load->library('upload',$config);
       $this->form_validation->set_rules('com','comments','trim|required|xss_clean');
       $this->form_validation->set_rules('desc','Conclusion','trim|required|xss_clean');
       $this->form_validation->set_rules('dtz','Date','trim|required|xss_clean');
       if((!$this->upload->do_upload())&&$this->form_validation->run()===FALSE){
         $data['error']=  $this->upload->display_errors();
         $this->load->view('academic/teaching_comment',$data);  
       }  else {
           $this->load->model('project_model');
           $header=  $this->input->post('com');
           $content=  $this->input->post('desc');
           $date=  $this->input->post('dtz');
           $documents=  base_url().'project_feedback/'.pg_escape_string($_FILES['userfile']['name']);
           $reg_id=$row->registrationID;
           $this->project_model->comment($reg_id,$header,$content,$date,$documents);
           $data['success']='<p class="alert alert-success">Comment has sent.!</p>';
           $this->load->view('academic/teaching_comment',$data);
       
       }
       }
   }
   function replied(){
       $res= $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
               ->where(array('status'=>'replied'))->get();
       if($res->num_rows()>0){
           $data['replied']=$res;
           $this->load->view('academic/teaching_replied',$data);
       }  else {
           $data['noreplied']='<p class="alert alert-warning">No one has been replied</p>';
           $this->load->view('academic/teaching_replied',$data);
       }
   }
   function details2($reg_id){
       $data=  $this->details3();
       $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'read'=>'yes'));
       if($res->num_rows()>0){
          $data['look']=$res;
          $this->load->view('academic/recent_downloads',$data);
       }  
   }
   function details3(){
       $res= $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
               ->where(array('read'=>'yes'))->get();
       if($res->num_rows()>0){
           foreach ($res->result() as $row){
               $data_rec=array(
                   'firstname'=>$row->surname,
                   'othername'=>$row->other_name,
                   'registration'=>$row->registrationID
               );
           }
           unset($row);
          return $data_rec;
       }
   }
           
   function download($reg_id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_student_desert',array('id'=>$reg_id));
       if($res->num_rows()>0){
           $row=$res->row();
       $data=  file_get_contents('project_document/'.substr($row->document,39));
       $name=  substr($row->document,39);
       force_download($name,$data);
       
       }  else {
           $data['error']='<p class="alert alert-danger">cant download</p>';
            $this->load->view('academic/teaching_view',$data);
       }
   }
   function details($reg_id){
       $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'read'=>'yes'));
       if($res->num_rows()>0){
          $data['look']=$res;
          $this->load->view('academic/teaching_detail',$data);
       }  else {
          $data['error']='<p class="alert alert-info">No recent project</p>';
          $this->load->view('academic/teaching_detail',$data);
       }
   }
   function donforce($reg_id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'read'=>'yes'));
       if($res->num_rows()>0){
           $row=$res->row();
       $data=  file_get_contents('project_document/'.substr($row->document,39));
       $name=  substr($row->document,39);
       force_download($name,$data);
   }
 }
 function verdicts(){
     $this->load->view('academic/teachinglistverdi');
 }
 function viewVerdicts($pid){
     $this->db->select('*');
     $this->db->from('tb_verdicts');
     $this->db->where('ver_id',$pid);
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
                    'title'=>$ver->project_title
                );
            }
            unset($ver);
     $this->load->view('academic/teachinverdics',$data);
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
    
    function viewDetail($id){
        $data['regid']=$id;
       $this->load->view('academic/assigeneStudentdetails',$data); 
    }
 }
 

