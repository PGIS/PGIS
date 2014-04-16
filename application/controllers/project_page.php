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
          $this->load->model('project_model');
          $this->form_validation->set_rules('prj','Project Title','required|xss_clean');
          $this->form_validation->set_rules('prd','Project Description','required|xss_clean');
          if($this->form_validation->run()===FALSE){
              $this->load->view('academic/project_view');
          }  else {
            $project_id=  $this->session->userdata('registration_id');
            $project_title=  $this->input->post('prj');
            $project_description=  $this->input->post('prd');
            $this->project_model->project_form($project_id,$project_title,$project_description);
          }
      }
  }

