<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
class ExternalSup extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helpers('form','file','html');
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }  elseif($this->session->userdata('user_role')!=='external supervisor') {
            redirect('logout');
        }
    }
    function index(){
        $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                ->where(array('external_supervisor'=>  $this->session->userdata('email')))->get();
        if($res->num_rows()>0){
            $data['sup']=$res;
            $this->load->view('ExternalSup/externalsup_view',$data);
        }else{
        $this->load->view('ExternalSup/externalsup_view');
        }
    }
    function student($id){
        $data['data']=  $this->posted_project();
        $data['res']=$id;
        $this->load->view('ExternalSup/student_detals',$data);
        
    }
    function posted_project(){
         $res=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                ->where(array('external_supervisor'=>  $this->session->userdata('email')))->get();
         if($res->num_rows()>0){
         return $res;
         }
    }
    function download($reg_id){
       $this->load->helper('download');
       $res=  $this->db->get_where('tb_student_desert',array('st_id'=>$reg_id));
       if($res->num_rows()>0){
           $row=$res->row();
       $data=  file_get_contents('project_document/'.substr($row->document,39));
       $name=  substr($row->document,39);
       force_download($name,$data);
       
       }  else {
           $data['error']='<p class="alert alert-danger">cant download</p>';
            $this->load->view('ExternalSup/student_detals',$data);
       }
   }
   function view($id){
     $res=  $this->db->get_where('tb_student_desert',array('st_id'=>$id,'ext_status'=>'no'));
     if($res->num_rows()>0){
          foreach ($res->result() as $row){
              $magic_here=array(
                  'id'=>$row->st_id,
                  'registration'=>$row->registrationID,
                  'document'=>$row->document
              );
          }
         unset($row);
         $this->load->view('ExternalSup/external_comment',$magic_here);
      }
    }
    function details2($reg_id){
       $data=  $this->details3();
       $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$reg_id,'read'=>'yes'));
       if($res->num_rows()>0){
          $data['look']=$res;
          $this->load->view('ExternalSup/recent_downloads',$data);
       }  
   }
   function comment($id){
       $res=  $this->db->get_where('tb_student_desert',array('st_id'=>$id),1);
       $row=$res->row();
       if($res->num_rows()===1){
               foreach ($res->result() as $rec){
                $data=array(
                    'id'=>$rec->st_id,
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
         $this->load->view('ExternalSup/external_comment',$data);  
         }  else {
          $this->db->where('st_id',$id);
          $this->db->update('tb_student_desert',array('status'=>'replied','read'=>'yes'));
           $this->load->model('project_model');
           $header=  $this->input->post('com');
           $content=  $this->input->post('desc');
           $date=  $this->input->post('dtz');
           $documents=  base_url().'project_feedback/'.pg_escape_string($_FILES['userfile']['name']);
           $reg_id=$row->registrationID;
           $this->project_model->comment($reg_id,$header,$content,$date,$documents);
           $data['success']='<p class="alert alert-success">Comment has sent.!</p>';
           $this->load->view('ExternalSup/external_comment',$data);
          
           }
       
       }
   }
   function project(){
       $res=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                ->where(array('external_supervisor'=>  $this->session->userdata('email'),'ext_status'=>'no'))->get();
       if($res->num_rows()>0){
        $data['data']=$res;
        $this->load->view('ExternalSup/external_layout',$data);
       }  else {
        $this->load->view('ExternalSup/external_layout');   
       }
   }
   function replied(){
      $res=  $this->db->select('*')->from('tb_student_desert')->join('tb_student','tb_student.registrationID = tb_student_desert.registrationID')
                ->where(array('external_supervisor'=>  $this->session->userdata('email'),'ext_status'=>'yes'))->get();
       if($res->num_rows()>0){
        $data['data']=$res;
        $this->load->view('ExternalSup/external_replied',$data);
       }  else {
        $this->load->view('ExternalSup/external_replied');   
       } 
   }
   function verdicts(){
       $this->load->view('ExternalSup/externalverdicts');
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
     $this->load->view('ExternalSup/externverdicts',$data);
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
                $doc=$this->load->view('ExternalSup/externverdictspdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
}
