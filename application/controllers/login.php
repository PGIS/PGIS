<?php if (!defined('BASEPATH'))exit('No irect script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url','email'));
        $this->load->library(array('form_validation','encrypt'));

        if (!isset($_POST['sb'])) {

            $this->load->view('clogin');
        } else {
            $this->form_validation->set_rules('us', 'Username or email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pd', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('clogin');
            } else {
                $pass = md5($this->input->post('pd'));
                if(valid_email($this->input->post('us'))){
                    $email=$this->input->post('us');
                    $username=  $this->findusername($email);
                    $query = $this->db->get_where('tb_user', array('email' => $email, 'password' => $pass, 'enable' => '1'));
                    $query3 = $this->db->get_where('tb_user', array('email' => $email, 'password' => $pass, 'enable' => '0'));
                    
                }else{
                $username = $this->input->post('us');
                $email=  $this->findemail($username);
                $query = $this->db->get_where('tb_user', array('userid' => $username, 'password' => $pass, 'enable' => '1'));
                $query3 = $this->db->get_where('tb_user', array('userid' => $username, 'password' => $pass, 'enable' => '0'));
                
                }
                if ($query3->num_rows() == 1) {
                    $data['active'] = '<div class="alert alert-warning">Your Account has not been actvated</div>';
                    $this->load->view('clogin', $data);
                } elseif ($query->num_rows() == 1) {
                    $s_data = array('userid' => $username, 'logged_in' => TRUE,'email'=>$email);
                    $this->session->set_userdata($s_data);
                    $this->departmentsession($username);
                    $this->studentsession($username);
                    $this->supervisorDepartment($username);
                    $this->detailLogiSession($username);
                    
                } else {
                    $data['errormsg'] = '<div class="alert alert-danger">Password and Username or email combination does not match</div>';
                    $this->load->view('clogin', $data);
                }
            }
        }
    }

        function studentsession($id){
            $qury = $this->db->get_where('tb_admision', array('userid' => $id), 1);
            if($qury->num_rows() == 1){
                foreach ($qury->result() as $ip){
                   $sdata = array('registration_id' =>$ip->addmissionID ); 
                   $this->session->set_userdata($sdata);
                }
            } 
        }
        function departmentsession($id){
            $res=  $this->db->get_where('tb_student',array('applicationID'=>$id),1);
            if($res->num_rows()===1){
                foreach ($res->result() as $row){
                    $sess_data=array(
                        'program'=>$row->program,
                        'department'=>$row->department
                    );
                    $this->session->set_userdata($sess_data);
                }
            }
        }
         function findusername($email){
          $usqury = $this->db->get_where('tb_user', array('email' => $email), 1); 
          if($usqury->num_rows() == 1){
                foreach ($usqury->result() as $un){
                   $sdata =$un->userid;
                   return $sdata;
                }
            } 
        }
        
        function findemail($username){
          $upqury = $this->db->get_where('tb_user', array('userid' => $username), 1); 
          if($upqury->num_rows() == 1){
                foreach ($upqury->result() as $n){
                   $edata =$n->email;
                   return $edata;
                }
            } 
        }
       
        function detailLogiSession($username){
             $detquery = $this->db->get_where('tb_user', array('userid' => $username), 1);
             if($detquery->num_rows() == 1){
                foreach ($detquery->result() as $n){
                   $edata =$n->designation;
                }
            } 
            $myArray = explode(',', $edata);
            $this->redirectto($myArray);
        }
        
        function redirectto($myArray){
            $role=array('roles'=>$myArray);
            $this->session->set_userdata($role);
            
            if(in_array('Supervisor',$myArray)){
                $s_data=array('user_role'=>'Supervisor');
                $this->session->set_userdata($s_data);
                redirect('supervisor'); 
            }elseif(in_array('department coordinator',$myArray)){
                $s_data=array('user_role'=>'department coordinator');
                $this->session->set_userdata($s_data);
                redirect('department_Coordinator/welcome');
            }elseif(in_array('postgraduate director',$myArray)){
                $s_data=array('user_role'=>'postgraduate director');
                $this->session->set_userdata($s_data);
                redirect('directorPgis/welcome');
            }elseif(in_array('head of department',$myArray)){
                $s_data=array('user_role'=>'head of department');
                $this->session->set_userdata($s_data);
                redirect('headDepartment');
            }elseif(in_array('Teaching staff',$myArray)){
                $s_data=array('user_role'=>'Teaching staff');
                $this->session->set_userdata($s_data);
                redirect('teaching');
            }elseif(in_array('Finance staff',$myArray)){
                $s_data=array('user_role'=>'Finance staff');
                $this->session->set_userdata($s_data);
                redirect('financeadmin/welcome');
            }elseif(in_array('dvc academic',$myArray)){
                $s_data=array('user_role'=>'dvc academic');
                $this->session->set_userdata($s_data);
                redirect('admissionUniversity');
            }elseif(in_array('administrator',$myArray)){
                $s_data=array('user_role'=>'administrator');
                $this->session->set_userdata($s_data);
                redirect('admin_page');
            }elseif(in_array('college principle',$myArray)){
                $s_data=array('user_role'=>'college principle');
                $this->session->set_userdata($s_data);
                redirect('college');
            }elseif(in_array('applicant',$myArray)){
                $s_data=array('user_role'=>'applicant');
                $this->session->set_userdata($s_data);
                redirect('application');
            }elseif(in_array('college coordinator',$myArray)){
                $s_data=array('user_role'=>'college coordinator');
                $this->session->set_userdata($s_data);
                redirect('college_Coordinator');
            }elseif (in_array('external examiner', $myArray)) {
                $s_data=array('user_role'=>'external examiner');
                $this->session->set_userdata($s_data);
                redirect('external');
            }elseif (in_array('internal examiner', $myArray)) {
                $s_data=array('user_role'=>'internal examiner');
                $this->session->set_userdata($s_data);
                redirect('internal');
            }elseif (in_array('external supervisor', $myArray)) {
                $s_data=array('user_role'=>'external supervisor');
                $this->session->set_userdata($s_data);
                redirect('externalSup');
            }elseif(in_array('Student',$myArray)){
                $s_data=array('user_role'=>'Student');
                $this->session->set_userdata($s_data);
                redirect('student');
            }elseif(in_array('alumni',$myArray)){
                $s_data=array('user_role'=>'alumni');
                $this->session->set_userdata($s_data);
                redirect('alumni');
            }elseif(in_array('blocked',$myArray)){
               $data['errormsg'] = '<div class="alert alert-danger">Your Account has been Blocked for some reasons</div>';
                    $this->load->view('clogin', $data);
            }
        }
        
        function changeRole($myrole){
            $this->load->library('encrypt');
            $this->session->unset_userdata('user_role');
            $newrole = $this->encrypt->decode(str_replace('_', '/',$myrole));
            $s_data=array('user_role'=>$newrole);
            $this->session->set_userdata($s_data);
            $this->redirectChangedrole($newrole);
        }
        
        function redirectChangedrole($role){
            if(strtolower($role)==='supervisor'){
                redirect('supervisor'); 
            }elseif (strtolower($role)==='teaching staff') {
               redirect('teaching');
            }elseif (strtolower($role)==='finance staff') {
                redirect();
            }elseif (strtolower($role)==='admision staff') {
                redirect('financeadmin');
            }elseif ($role==='head of department') {
                redirect('headDepartment');
            }elseif ($role==='internal examiner') {
                redirect('internal');
        }
        }
        function supervisorDepartment($username){
            $detquery = $this->db->get_where('tb_user', array('userid' => $username), 1);
             if($detquery->num_rows() == 1){
                foreach ($detquery->result() as $n){
                   $edata =$n->designation;
                }
            } 
            $myArray = explode(',', $edata);
            
            if(in_array('Supervisor',$myArray)){
                $this->fetchDepartment($username);
            }elseif(in_array('department coordinator',$myArray)){
                $this->fetchDepartment($username);
            }elseif(in_array('head of department',$myArray)){
                $this->fetchDepartment($username);
            }
        }
        
        function fetchDepartment($username){
            $query = $this->db->get_where('tb_staff', array('staffId' => $username),1);
            if($query->num_rows()>0){
                foreach ($query->result() as $dep){
                    $mydep=$dep->Sdepartment;
                }
                 $s_data=array('mydepartment'=>$mydep);
                $this->session->set_userdata($s_data);
            }
        }
        function ajaxcheck($username=''){
            $res=  $this->db->get_where('tb_user',array('userid'=>$username),1);
            if($res->num_rows()===1){
                echo '<label class="alert-success">username exist <span class="glyphicon glyphicon-ok"></span></label>';
            }  else {
                echo '<label class="alert-danger">username not exist</label>';
            }
        }
        function ajaxpassord($password=''){
            $res=  $this->db->get_where('tb_user',array('password'=>md5($password)),1);
            if($res->num_rows()>0){
                echo '<label class="alert-success">password exist <span class="glyphicon glyphicon-ok"></span></label>';
            }  else {
                echo '<label class="alert-danger">password not exist</label>';
            }
        }
        
    }

