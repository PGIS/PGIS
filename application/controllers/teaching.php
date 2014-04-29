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
         $data['record']=  $this->posted_project();
         $this->load->view('academic/teaching_view',$data);
      } 
     function posted_project(){
         $sn=  $this->session->userdata('userid');
         $res=  $this->db->get_where('tb_student_desert',array('supervisor'=>$sn,'status'=>'not replied'));
         if($res->num_rows()>0){
         return $res;
         }
   }
   function view($reg_id){
      $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'status'=>'not replied'));
      if($res->num_rows()===1){
          foreach ($res->result() as $row){
              $magic_here=array(
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
     if($res->num_rows()===1){
         $this->db->where('registrationID',$reg_id);
         $this->db->update('tb_student_desert',array('status'=>'replied'));
          foreach ($res->result() as $row){
              $magic_here=array(
                  'registration'=>$row->registrationID,
                  'document'=>$row->document
              );
          }
          unset($row);
          return $magic_here;
      }
   }
   function comment($reg_id){
       $data=  $this->comment_view($reg_id);
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
           $this->project_model->comment($reg_id,$header,$content,$date);
           $data['success']='<p class="alert alert-success">Comment has sent.!</p>';
           $this->load->view('academic/teaching_comment',$data);
       }
   }
   function replied(){
       $res=  $this->db->get_where('tb_student_desert',array('status'=>'replied'));
       if($res->num_rows()>0){
           $data['replied']=$res;
           $this->load->view('academic/teaching_replied',$data);
       }  else {
            $data['noreplied']='<p class="alert alert-warning">No one has been replied</p>';
             $this->load->view('academic/teaching_replied',$data);
       }
   }
   function resert($regist_id){
       $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$regist_id));
       if($res->num_rows()===1){
           $this->db->where('registrationID',$regist_id);
           $this->db->update('tb_student_desert',array('status'=>'not replied'));
           redirect('teaching');
       }  else {
           return FALSE; 
       }
   }
 }

