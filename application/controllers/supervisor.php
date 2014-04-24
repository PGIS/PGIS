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
         $data['active']=TRUE;
         $this->load->library('pagination');
         $this->load->library('table');
            $res=  $this->db->get_where('tb_project',array('status'=>'unassigned'));
            $res1=  $this->db->get_where('tb_project',array('status'=>'assigned'));
             if($res->num_rows()>0){
                 unset($data['active1']);
                 $config['base_url']=  base_url().'index.php/supervisor/index';
                 $config['num_links']=3;
                 $config['per_page']=10;
                 $config['total_rows']=  $this->db->get('tb_project')->num_rows();
                 $this->pagination->initialize($config);
                 $data['records']=  $this->db->get('tb_project',$config['per_page'], $this->uri->segment(3));
                $this->load->view('academic/supervisor_view',$data);
                 }elseif($res1->num_rows()>0){
                 $config['base_url']=  base_url().'index.php/supervisor/index';
                 $config['num_links']=3;
                 $config['per_page']=10;
                 $config['total_rows']=  $this->db->get('tb_project')->num_rows();
                 $this->pagination->initialize($config);
                 $data['query']=  $this->db->get('tb_project',$config['per_page'], $this->uri->segment(3));
                 $this->load->view('academic/supervisor_view',$data); 
                 }
              }
      public function assign($id){
      $data=  $this->project_display($id);
      $this->load->view('academic/supervisor_assign',$data);
     }
     public function project_display($id) {
      $res=$this->db->get_where('tb_project',array('id'=>$id));
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $array_data=array(
                    'id'=>$row->id,
                    'registrationID'=>$row->registration_id,
                    'project_title'=>$row->project_title,
                    'project_description'=>$row->project_description,
                    'internal_supervisor'=>$row->Internal_supervisor
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
 }