<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class College extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='external supervisor'){
            redirect('logout');
        }
     }
     function index(){
         $data['query']=  $this->index2();
         $data['active1']=TRUE;
         $this->load->view('academic/college_view',$data);   
     }
     function index2(){
         $res1=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            }
     }
     public function recent_detail($id){
         $data['recent']=$id;
         $this->load->view('academic/college_recent_detail',$data);
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
     function download($id){
         $this->load->helper('download');
         $res=  $this->db->get_where('tb_student_desert',array('registrationID'=>$id));
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
 }
     
 