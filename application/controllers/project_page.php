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
          $data=  $this->supervisors();
          $data['after']=  $this->comments_after();
          $data['active']=TRUE;
          $data['actived']=TRUE;
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
          $this->form_validation->set_rules('pis','Username','trim|required|xss_clean');
          $data['records']=  $this->supervisors_view();
          $data['after']=  $this->comments_after();
          $data['active']=TRUE;
           $data['actived']=TRUE;
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
         $data['records']=  $this->supervisors_view();
         $data['active2']=TRUE;
          $data['actived']=TRUE;
         unset($data['active']);
         $config['upload_path']= './project_document/';
         $config['allowed_types']='pdf|doc';
         $config['overwrite']=TRUE;
         $this->load->library('upload',$config);
         if(!$this->upload->do_upload()){
              $this->load->view('academic/project_view',$data);  
          }  else{ 
             $this->load->model('project_model');
             $sn=  $this->session->userdata('registration_id');
             $internal= $this->session->userdata('internal');
             $external= $this->session->userdata('external');
             $date_sub=  $this->input->post('date_sub');
             $document=  base_url().'project_document/'.pg_escape_string($_FILES['userfile']['name']);
             $this->project_model->project_prog($sn,$internal,$external,$document,$date_sub);
             $data['smgsuc']='<p class="alert alert-success">You project has sent.!</p>';
             $this->load->view('academic/project_view',$data); 
            }
      }
            function supervisors(){
                $sn=  $this->session->userdata('registration_id');
                $res=  $this->db->get_where('tb_project',array('registration_id'=>$sn,'status'=>'assigned'));
                if($res->num_rows()===1){
                    foreach ($res->result() as $row){
                        $array_data=array(
                            'supervisor'=>$row->Internal_supervisor,
                            'external'=>$row->external_supervisor
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
             $data['active1']=TRUE;
             $data['actived1']=TRUE;
             $res=  $this->db->get_where('tb_pprogress',array('registrationID'=>$regist_id));
             if($res->num_rows()>0){
                 $this->db->where('registrationID',$regist_id);
                 $this->db->delete('tb_pprogress');
                 $data['delete']='<p class="alert alert-success">Comments deleted..!</p>';
                 $this->load->view('academic/project_view',$data);
             }  else {
                 return FALSE;    
             }
             
         }
         
      }
  

