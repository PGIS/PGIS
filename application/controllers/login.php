<?php if (!defined('BASEPATH'))exit('No irect script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url','email'));
        $this->load->library('form_validation');

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
                    $this->login_verify($username);
                } else {
                    $data['errormsg'] = '<div class="alert alert-danger">Password and Username or email combination does not match</div>';
                    $this->load->view('clogin', $data);
                }
            }
        }
    }

    function login_verify($username) {
        $query1 = $this->db->get_where('tb_user', array('userid' => $username, 'designation' => 'administrator'));
        $query2 = $this->db->get_where('tb_user', array('userid' => $username, 'designation' => 'applicant'));
        $query3 = $this->db->get_where('tb_user', array('userid' => $username, 'designation' => 'Admision staff'));
        $query4 = $this->db->get_where('tb_user', array('userid' => $username, 'designation' => 'Finance staff'));
        $query5 = $this->db->get_where('tb_user', array('userid' => $username, 'designation' => 'Student'));
        $query6=  $this->db->get_where('tb_user', array('userid'=> $username,  'designation'=>'Supervisor'));
        $query7=  $this->db->get_where('tb_user', array('userid'=> $username,  'designation'=>'external supervisor'));
        $query8=  $this->db->get_where('tb_user', array('userid'=>  $username, 'designation'=>'Teaching staff'));
        if ($query1->num_rows() == 1) {
            $s_data = array('user_role' => 'administrator');
            $this->session->set_userdata($s_data);
            redirect('admin_page');
        } elseif ($query2->num_rows() == 1) {
            $s_data = array('user_role' => 'applicant');
            $this->session->set_userdata($s_data);
            redirect('application');
        } elseif ($query3->num_rows() == 1) {
            $s_data = array('user_role' => 'Admision staff');
            $this->session->set_userdata($s_data);
            redirect('admision');
        }elseif ($query4->num_rows() == 1) {
            $s_data = array('user_role' => 'Finance staff');
            $this->session->set_userdata($s_data);
            redirect('financeadmin');
        }elseif ($query5->num_rows() == 1) {
           $s_data = array('user_role'=>'Student');
           $this->session->set_userdata($s_data);
           redirect('student/firstin');
        }elseif ($query6->num_rows()===1) {
            $s_data=array('user_role'=>'Supervisor');
            $this->session->set_userdata($s_data);
            redirect('supervisor');
        }elseif ($query7->num_rows()===1) {
            $s_data=array('user_role'=>'extenal supervisor');
            $this->session->set_userdata($s_data);
            redirect('external');
        }elseif ($query8->num_rows()===1) {
            $s_data=array('user_role'=>'Teaching staff');
            $this->session->set_userdata($s_data);
            redirect('teaching');
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
                }
            }return $sdata; 
        }
        
        function findemail($username){
          $upqury = $this->db->get_where('tb_user', array('userid' => $username), 1); 
          if($upqury->num_rows() == 1){
                foreach ($upqury->result() as $n){
                   $edata =$n->email;
                }
            }return $edata; 
        }
    }

