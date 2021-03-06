<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class Internal extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
         $this->load->library(array('form_validation','encrypt'));
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('user_role')!=='internal examiner') {
             redirect('logout');
        }
     }
     function index(){
         $this->db->select('*');
         $this->db->from('tb_examiner_desert');
         $this->db->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID');
         $this->db->join('tb_student','tb_student.registrationID = tb_examiner_desert.registrationID');
         $this->db->where(array('internal_examiner'=>  $this->session->userdata('email')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
          $data['given']=$res;
         $this->load->view('Internal/internal_view',$data);
         }  else {
         $this->load->view('Internal/internal_view');
         }
     }
     function detail($id){
         $data['data']=$id;
         $this->load->view('Internal/internaldetail',$data);
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
     $this->load->view('Internal/internverdicts',$data);
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
                $doc=$this->load->view('Internal/internverdictspdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
     function feedBack(){
         $this->db->select('*');
         $this->db->from('tb_examiner_desert');
         $this->db->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID');
         $this->db->join('tb_student','tb_student.registrationID = tb_examiner_desert.registrationID');
         $this->db->where(array('internal_examiner'=>  $this->session->userdata('email')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
         $data['given']=$res;
         $this->load->view('Internal/internal_feedback',$data);
         }  else {
         $this->load->view('Internal/internal_feedback');
         }
     }
     function inputFeedback($id){
         $data['feed']=$id;
         $this->load->view('Internal/studentFeedback',$data);
     }
     function comment($id){
       $data['feed']=$id;
       $res=  $this->db->get_where('tb_examiner_desert',array('pr_id'=>$id),1);
       $row=$res->row();
       if($res->num_rows()===1){
       $config['upload_path']= './project_feedback/';
       $config['allowed_types']='pdf|doc|docx';
       $config['overwrite']=TRUE;
       $config['remove_spaces']=FALSE;
       $this->load->library('upload',$config);
       $this->form_validation->set_rules('com','comments','trim|required|xss_clean');
       $this->form_validation->set_rules('desc','Conclusion','trim|required|xss_clean');
       $this->form_validation->set_rules('dtz','Date','trim|required|xss_clean');
       if(!($this->upload->do_upload())&&$this->form_validation->run()===FALSE){
           $data['error']=  $this->upload->display_errors();
         $this->load->view('Internal/studentFeedback',$data);  
         }  else {
         $this->load->model('supervisor_model');
         $comment=  $this->input->post('com');
           $conclusion=  $this->input->post('desc');
           $feedbackdate=  $this->input->post('dtz');
           $document=  base_url().'project_feedback/'.pg_escape_string($_FILES['userfile']['name']);
           $regstrationid=$row->registrationID;
           $this->supervisor_model->internal_feedback($document,$regstrationid,$comment,$conclusion,$feedbackdate);
           $data['success']='<p class="alert alert-success">Comment has sent.!</p>';
           $this->load->view('Internal/studentFeedback',$data); 
          
           }
       }
      }
      function inputFeedbackDetails($id){
         $data['back']=$id;
         $this->load->view('Internal/student_inputFeedback',$data);
      }
   }
 
