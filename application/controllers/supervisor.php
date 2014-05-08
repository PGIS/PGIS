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
      $data['teach']=  $this->teaching();
      $this->load->view('academic/supervisor_assign',$data);
     }
     public function teaching(){
         $res=  $this->db->get_where('tb_user',array('designation'=>'Teaching staff'));
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
             $this->load->view('academic/supervisor_assign');
         }  else {
             $comments=  $this->input->post('comme');
             $this->load->model('supervisor_model');
             $this->supervisor_model->insert_update($id,$comments);
             echo '<p class="alert alert-success">Comments posted</p>';
         }
     }
     function presentationFeedback(){
         $this->load->view('academic/presentationfeedback');
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
 }
     
 
