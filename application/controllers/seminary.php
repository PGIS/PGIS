<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seminary extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url','html'));
       $this->load->library('form_validation');
       if(!$this->session->userdata('logged_in')){
           redirect('logout');  
       }elseif ($this->session->userdata('user_role')!='Student') {
           redirect('logout'); 
        }
    }

    public function index(){
      $this->load->view('academic/seminar_reg');
        }
        
    function seminary_form($id) {
        $res=  $this->db->get_where('tb_seminar',array('id'=>$id));
        if($res->num_rows()===1){
          $row=$res->row();
      $this->form_validation->set_rules('smh', 'seminar hour', 'trim|required|xss_clean');
      if($this->form_validation->run() === FALSE){
      echo '<p class="alert alert-danger">Fields cant be empty plz try again</p>';
      }else{
           $this->load->model('seminar_register');
           $day = $this->input->post('smd');
           $hours = $this->input->post('smh');
           $course=  $row->course;
           $venue=$row->semina_venue;
           $sn=  $this->session->userdata('userid');
           $username=  $this->session->userdata('registration_id');
           $this->seminar_register->insert_student($username,$course,$day,$hours,$sn,$venue);
           echo '<p class="alert alert-success">Thanks for registrating to our seminar</p>';
           } 
        }
            
}
function table_data(){
   $this->form_validation->set_rules('day1', 'seminar_day', 'required');
      $this->form_validation->set_rules('day2', 'seminar_hour', 'required');
      if($this->form_validation->run() === FALSE){
      $this->load->view('academic/seminar_reg');
      }else{
           $this->load->model('seminar_register');
           $day = $this->input->post('day2');
           $hours = $this->input->post('data1');
           $course=  $this->input->post('day1');
           $sn=  $this->session->userdata('userid');
           $username=  $this->session->userdata('registration_id');
           $this->seminar_register->insert_student($username,$course,$day,$hours,$sn);
           $data['smg']='<font class="alert alert-success">Thanks for registrating to our seminar</font>';
           $this->load->view('academic/seminar_reg',$data);
           }   
}
function show_semicalender($id){
    $data['record']=$id;
    $this->load->view('academic/seminar_course',$data);
    
}
}

