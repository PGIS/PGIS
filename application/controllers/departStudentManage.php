<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class DepartStudentManage extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library(array('form_validation','encrypt'));
         if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')==='Supervisor') {
             
        }elseif ($this->session->userdata('user_role')==='head of department') {
             
        }  else {
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
                  $this->findUsername($id);
                  $this->load->model('eventmodel');
                    Eventmodel::recordDisco($id); 
                    
                    echo '<div class="alert alert-success">Event succesfull recorded</div>';
              }  else {
                $this->load->view('academic/discoView',$data);    
              }
               
        }
        
        function findUsername($id){
            $query1 = $this->db->get_where('tb_student', array('registrationID' => $id));
            if($query1->num_rows()>0){
                foreach ($query1->result() as $udt){
                 $myuserid=$udt->applicationID;
                }
                $des='blocked';
                    $mydata = array(
                       'designation' => $des
                    );

        $this->db->where('userid', $myuserid);
        $this->db->update('tb_user', $mydata); 
                
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
            $query = $this->db->get_where('tb_event_postpone', array('registration_ID' => $id,'status'=>NULL));
            $query1 = $this->db->get_where('tb_event_freez', array('registration_ID' => $id,'status'=>NULL));
            $data= $this->getStudentDetails($id);
            if($query->num_rows()>0){
                 $data+=$this->getresumedetailpost($id);
                  $data['regid']=$id;
                 $data['post']=TRUE;
                 $this->load->view('academic/resume',$data); 
             }elseif($query1->num_rows()>0){
                 $data+=$this->getresumedetailfreez($id);
                  $data['regid']=$id;
                  $data['frez']=TRUE;
                  $this->load->view('academic/resume',$data);
             }else{
                 echo '<div class="alert alert-warning">No any Postponement or Freezing to resume<div>';
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
        
        function viewEventRecord($evnt){
           if($evnt=='Freezing'){
               $data['info']='freezing';
               $data['myquer']= $this->viewEventfreezing(); 
               $this->load->view('academic/eventView',$data);
               
           }elseif ($evnt=='Postponement') {
               $data['info']='postponement';
               $data['myquer']= $this->viewEventPostpone(); 
               $this->load->view('academic/eventView',$data);
            
           }elseif ($evnt=='Discontinue') {
               $data['info']='Discontinue';
               $data['myquer']= $this->viewEventDisco(); 
               $this->load->view('academic/eventView',$data);
               
           }elseif ($evnt=='Extension') {
                $data['info']='extension';
                $data['myquer']= $this->viewEventExtend(); 
                $this->load->view('academic/eventView',$data);
           }
           
        }
        
        function viewEventfreezing(){
            $this->db->select('*');
            $this->db->where('status',NULL);
            $this->db->from('tb_event_freez');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_freez.registration_ID');
            $my = $this->db->get();
            return $my;
        }
        
        function viewEventPostpone(){
            $this->db->select('*');
             $this->db->where('status',NULL);
            $this->db->from('tb_event_postpone');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_postpone.registration_ID');
            $my = $this->db->get();
            return $my;
        }
        
        function viewEventDisco(){
            $this->db->select('*');
            $this->db->from('tb_event_disco');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_disco.registration_ID');
            $my = $this->db->get();
            return $my;
        }
        
        function viewEventExtend(){
            $this->db->select('*');
            $this->db->where('status',NULL);
            $this->db->from('tb_event_extend');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_extend.registration_ID');
            $my = $this->db->get();
            return $my;
        }
      
        function fetchRecordedPost($id){
            $data['id']=$id;
            $this->db->select('*');
            $this->db->where('registration_ID', $id);
             $this->db->where('status', NULL);
            $this->db->from('tb_event_postpone');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_postpone.registration_ID');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'id'=>$stde->registrationID,
                        'description' => $stde->description,
                        'from' => $stde->from,
                        'to' => $stde->to 
                    );
                }
                $data=$detail;
                $data+=$this->getStudentDetails($id);
                $data['info']='postponement';
               $this->load->view('academic/eventViewRecord',$data);
            }  else {
               
            }
           
        }
        
         function fetchRecordedExt($id){
            $data['id']=$id;
            $this->db->select('*');
            $this->db->where('registration_ID', $id);
            $this->db->from('tb_event_extend');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_extend.registration_ID');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'id'=>$stde->registrationID,
                        'description' => $stde->description,
                        'from' => $stde->from,
                        'to' => $stde->to,
                        'period'=>$stde->period
                    );
                }
                $data=$detail;
                $data+=$this->getStudentDetails($id);
                $data['info']='extension';
               $this->load->view('academic/eventViewRecord',$data);
            }  else {
               
            }
           
        }
        
        function fetchRecordedFreez($id){
            $data['id']=$id;
            $this->db->select('*');
            $this->db->where('registration_ID', $id); 
            $this->db->where('status', NULL); 
            $this->db->from('tb_event_freez');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_freez.registration_ID');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'id'=>$stde->registrationID,
                        'description' => $stde->description,
                        'from' => $stde->from,
                        'to' => $stde->to
                    );
                }
                $data=$detail;
                $data+=$this->getStudentDetails($id);
                $data['info']='freezing';
               $this->load->view('academic/eventViewRecord',$data);
            }  else {
               
            }
           
        }
        
         function fetchRecordedDisco($id){
            $data['id']=$id;
            $this->db->select('*');
            $this->db->where('registration_ID', $id); 
            $this->db->from('tb_event_disco');
            $this->db->join('tb_student', 'tb_student.registrationID = tb_event_disco.registration_ID');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'recorded_date' => $stde->recorded_date
                    );
                }
                $data=$detail;
                $data+=$this->getStudentDetails($id);
                $data['info']='Discontinue';
               $this->load->view('academic/eventViewRecord',$data);
            }  else {
               
            }
           
        }
        
        function getresumedetailpost($id){
           $this->db->select('*');
            $this->db->where('registration_ID', $id); 
            $this->db->where('status',NULL); 
            $this->db->from('tb_event_postpone');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'description' => $stde->description,
                        'from' => $stde->from,
                        'to' => $stde->to 
                    );
                }
                return $detail; 
        }
        }
        
        function getresumedetailfreez($id){
           $this->db->select('*');
            $this->db->where('registration_ID', $id); 
            $this->db->where('status',NULL); 
            $this->db->from('tb_event_freez');
            $posquer = $this->db->get();
            if($posquer->num_rows()>0){
                foreach ($posquer->result() as $stde){
                    $detail=array(
                        'description' => $stde->description,
                        'from' => $stde->from,
                        'to' => $stde->to 
                    );
                }
                return $detail; 
        }
        }
        function resumemode($id){
           $data = array(
               'status' => 'resumed',
            );
             $this->db->where('registration_ID', $id);
             $this->db->where('status', NULL);
             $this->db->update('tb_event_postpone', $data); 
             echo '<div class="alert alert-success">successfull updated</div>';

        }
        function resumemodefr($id){
           $data = array(
               'status' => 'resumed',
            );
             $this->db->where('registration_ID', $id);
             $this->db->where('status', NULL);
             $this->db->update('tb_event_freez', $data); 
             echo '<div class="alert alert-success">successfull updated</div>';
        }
        }
