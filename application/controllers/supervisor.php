<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class Supervisor extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Supervisor') {
             redirect('logout');
        }
     }
     function index(){
         $data['query']=  $this->index2();
         $data['pending']=  $this->pending();
         $data['active']=TRUE;
         $res=  $this->db->get_where('tb_project',array('status'=>'unassigned'));
          if($res->num_rows()>0){
                $data['records']=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                        ->where(array('status'=>'unassigned'))->get();
                $this->load->view('academic/supervisor_view',$data);
                 }  else {
                  $this->load->view('academic/supervisor_view',$data);   
                 }
     }
     function index2(){
         $res1=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         if($res1->num_rows()>0){
            return $res1;
            }
     }
     public function assign($id){
      $data=  $this->project_display($id);
      $this->load->view('academic/supervisor_assign',$data);
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
     public function data_records() {
         $this->form_validation->set_rules('ext','External supervisor','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('academic/supervisor_assign');
         }  else {
             $id=  $this->session->userdata('id');
             $this->load->model('supervisor_model');
             $external=  $this->input->post('ext');
             $comment=  $this->input->post('cmt');
             $this->supervisor_model->insert_supervisor($id,$external,$comment);
             
         }
     }
     function comments_entry($id){
         $this->form_validation->set_rules('comme','Comments','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('academic/supervisor_assign');
         }  else {
             $comments=  $this->input->post('comme');
             $this->load->model('supervisor_model');
             $this->supervisor_model->insert_update($id,$comments);
             echo '<p class="alert alert-success">Comments posted</p>';
         }
     }
     function pending(){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'pending'))->get();
         if($res->num_rows()>0){
             return $res;
         }
     }
     function presentationFeedback(){
         $this->load->view('academic/desertationlist');
     }
     function registerFeedback($id){
         $data=  $this->getprojecdetail($id);
         $this->form_validation->set_rules('prtype', 'Presentation', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('level', 'Level', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('prdate', 'Presentation date', 'required|max_length[20]|xss_clean|is_unique[tb_verdicts.date]');
         $this->form_validation->set_rules('comments', 'Comments','required|xss_clean');
         $this->form_validation->set_rules('verdict', 'verdict', 'required|xss_clean');
         $this->form_validation->set_rules('panel', 'Panel', 'required|xss_clean');
         if(isset($_POST['save'])){
            if($this->form_validation->run()===FALSE){
              $this->load->view('academic/presentationfeedback',$data);
            }else{
               $this->load->model('supervisor_model');
               Supervisor_model::saveVerdicts($data['registrationID'],$data['projectid'],$data['supervisor']);
               $data['saved']=TRUE;
               $this->load->view('academic/presentationfeedback',$data);  
            }
         }else{
            $this->load->view('academic/presentationfeedback',$data); 
         }
     }
     function getprojecdetail($id){
         $this->db->select('*');
         $this->db->where('registration_id', $id); 
        $this->db->from('tb_project');
        $this->db->join('tb_student', 'tb_student.registrationID = tb_project.registration_id');
        $myquer = $this->db->get();
        if($myquer->num_rows()>0){
            foreach ($myquer->result() as $detail){
                $hedetail=array(
                    'registrationID'=>$detail->registration_id,
                    'project_title'=>$detail->project_title,
                    'project_description'=>$detail->project_description,
                    'supervisor'=>$detail->Internal_supervisor,
                    'surname'=>$detail->surname,
                    'lastname'=>$detail->other_name,
                    'projectid'=>$detail->id
                );
            }return $hedetail;
        }
     }
     function studentVerdicts($id){
         $this->db->select('*');
         $this->db->from('tb_project');
         $this->db->where('registration_id',$id);
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
         
         $this->load->view('academic/superverdlist',$data); 
     }
     function viewVerdicts($pid,$date){
     $this->db->select('*');
     $this->db->from('tb_verdicts');
     $this->db->where('project_id',$pid);
     $this->db->where('tb_verdicts.date',$date);
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
            $data['prdate']=$date;
     $this->load->view('academic/teachinverdics',$data);
    }
 }
     
 
