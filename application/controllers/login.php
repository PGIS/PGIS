<?php if (!defined('BASEPATH'))exit('No irect script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url','email'));
        $this->load->library(array('form_validation','encrypt'));

        if (!isset($_POST['sb'])) {

            $this->load->view('clogin');
        } else {
            $this->form_validation->set_rules('us', 'Username or email', 'trim|required');
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
            }elseif(in_array('Teaching staff',$myArray)){
                $s_data=array('user_role'=>'Teaching staff');
                $this->session->set_userdata($s_data);
                redirect('teaching');
            }elseif(in_array('Finance staff',$myArray)){
                $s_data=array('user_role'=>'Finance staff');
                $this->session->set_userdata($s_data);
                redirect('financeadmin');
            }elseif(in_array('Admision staff',$myArray)){
                $s_data=array('user_role'=>'Admision staff');
                $this->session->set_userdata($s_data);
                redirect('admision');
            }elseif(in_array('administrator',$myArray)){
                $s_data=array('user_role'=>'administrator');
                $this->session->set_userdata($s_data);
                redirect('admin_page');
            }elseif(in_array('external supervisor',$myArray)){
                $s_data=array('user_role'=>'external supervisor');
                $this->session->set_userdata($s_data);
                redirect('college');
            }elseif(in_array('applicant',$myArray)){
                $s_data=array('user_role'=>'applicant');
                $this->session->set_userdata($s_data);
                redirect('application');
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
            }  elseif (strtolower($role)==='teaching staff') {
               redirect('teaching');
            }  elseif (strtolower($role)==='finance staff') {
                redirect();
            }  elseif (strtolower($role)==='admision staff') {
                redirect('financeadmin');
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
    }

