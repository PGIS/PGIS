<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Teaching extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
         $this->load->library('form_validation');
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
         $res=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                 ->where(array('supervisor'=>$sn,'status'=>'not replied','read'=>'no'))->get();
         if($res->num_rows()>0){
         return $res;
         }
   }
   function assigned(){
       $sn=  $this->session->userdata('userid');
       $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
               ->where(array('Internal_supervisor'=>$sn,'status'=>'assigned'))->get();
       if($res->num_rows()>0){
           return $res; 
       }  else {
           return FALSE;
       }
   }
     function view($id){
      $res=  $this->db->get_where('tb_student_desert',array('id'=>$id,'status'=>'not replied'));
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
         $this->db->update('tb_student_desert',array('status'=>'replied'));
            foreach ($res->result() as $rec){
                $data=array(
                    'id'=>$rec->id,
                    'registration'=>$rec->registrationID,
                    'document'=>$rec->document
                );
            }
            unset($rec);
       $this->form_validation->set_rules('com','comments','trim|required|xss_clean');
       $this->form_validation->set_rules('desc','Conclusion','trim|required|xss_clean');
       $this->form_validation->set_rules('dtz','Date','trim|required|xss_clean');
       if($this->form_validation->run()===FALSE){
         $this->load->view('academic/teaching_comment',$data);  
       }  else {
           $this->load->model('project_model');
           $header=  $this->input->post('com');
           $content=  $this->input->post('desc');
           $date=  $this->input->post('dtz');
           $reg_id=$row->registrationID;
           $this->project_model->comment($reg_id,$header,$content,$date);
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
   function resert($regist_id){
       $res=  $this->db->get_where('tb_student_desert',array('id'=>$regist_id));
       if($res->num_rows()===1){
           $this->db->where('id',$regist_id);
           $this->db->update('tb_student_desert',array('status'=>'not replied'));
           redirect('teaching');
       }  else {
           return FALSE; 
       }
   }
   function download($reg_id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_student_desert',array('id'=>$reg_id,'read'=>'no'));
       if($res->num_rows()>0){
           $row=$res->row();
           $this->db->where('id',$reg_id);
           $this->db->update('tb_student_desert',array('read'=>'yes'));
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
 }

