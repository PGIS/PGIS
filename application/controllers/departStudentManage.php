<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class DepartStudentManage extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library(array('form_validation','encrypt'));
         if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Supervisor') {
             redirect('logout');
        }
     }
     
     function index(){
          $this->load->view('academic/studentpProgress');   
                
        }
        function eventPostpone($id){
             $this->validateiId($id);
             $data= $this->getStudentDetails($id);
             $data['regid']=$id;
              $this->form_validation->set_rules('extnu', 'description', 'required|max_length[30]|xss_clean');
              $this->form_validation->set_rules('from', 'From', 'required|max_length[20]|xss_clean');
              $this->form_validation->set_rules('to', 'to', 'required|max_length[20]|xss_clean');
              $this->form_validation->run();
             if(isset($_POST['save'])){
                if($this->form_validation->run() == TRUE){
                   $this->load->model('eventmodel');
                  Eventmodel::recordPostponement($id); 
                  echo '<div class="alert alert-success">Event succesfull recorded</div>';
                } else{
                    $this->load->view('academic/postponeView',$data); 
                    }
             }else{
                $this->load->view('academic/postponeView',$data);   
             }
             
        }
        
        function eventdisco($id){
             $this->validateiId($id);
             $data= $this->getStudentDetails($id);
             $data['regid']=$id;
              if(isset($_POST['save'])){
                  $this->load->model('eventmodel');
                    Eventmodel::recordDisco($id); 
                    echo '<div class="alert alert-success">Event succesfull recorded</div>';
              }  else {
                $this->load->view('academic/discoView',$data);    
              }
               
        }
        
        function eventExtension($id){
             $this->validateiId($id);
             $data=  $this->getStudentDetails($id);
             $data['regid']=$id;
             $this->form_validation->set_rules('extnu', 'description', 'required|max_length[30]|xss_clean');
             $this->form_validation->set_rules('from', 'From', 'required|max_length[20]|xss_clean');
             $this->form_validation->set_rules('to', 'to', 'required|max_length[20]|xss_clean');
             $this->form_validation->set_rules('month', 'month', 'required|numeric|max_length[20]|xss_clean');
             $this->form_validation->run();
             if(isset($_POST['save'])){
                 if($this->form_validation->run() == TRUE){
                    $this->load->model('eventmodel');
                    Eventmodel::recordExtension($id); 
                    echo '<div class="alert alert-success">Event succesfull recorded</div>';
                 } else {
                  $this->load->view('academic/extensionView',$data);      
                 }
             }  else {
                  $this->load->view('academic/extensionView',$data);   
             }
             
        }
        
        function eventResume($id){
            $query = $this->db->get_where('tb_event_postpone', array('registration_ID' => $id));
            $query1 = $this->db->get_where('tb_event_freez', array('registration_ID' => $id));
             if($query->num_rows()>0){
                 
             }elseif($query->num_rows()>0){
                 
             }else{
                 echo 'No postponement or Freezing to resume';
             }
             
        }
        
        function eventFreezing($id){
              $this->validateiId($id);
              $data= $this->getStudentDetails($id);
              $data['regid']=$id;
              $this->form_validation->set_rules('extnu', 'description', 'required|max_length[30]|xss_clean');
              $this->form_validation->set_rules('from', 'From', 'required|max_length[20]|xss_clean');
              $this->form_validation->set_rules('to', 'to', 'required|max_length[20]|xss_clean');
              $this->form_validation->run();
              
             if(isset($_POST['save'])){
                if($this->form_validation->run() == TRUE){
                    $this->load->model('eventmodel');
                    Eventmodel::recordFreez($id); 
                    echo '<div class="alert alert-success">Event succesfull recorded</div>';
                }else{
                    $this->load->view('academic/postponeView',$data); 
                }  
             }else{
                $this->load->view('academic/freezingView',$data);   
             }
              
        }
        
        function getStudentDetails($id){
            $query = $this->db->get_where('tb_student', array('registrationID' =>$id));
            foreach ($query->result() as $stdetil){
               $dat = array(
                    'full_name' => $stdetil->surname.' '.$stdetil->other_name
                   ); 
                   return $dat;
            }
        }
        
        function validateiId($id){
            $query = $this->db->get_where('tb_student', array('registrationID' =>$id));
            if($query->num_rows()==0){
                redirect('departStudentManage');
            }
        }
}