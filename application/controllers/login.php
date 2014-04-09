<?php

if (!defined('BASEPATH'))
    exit('No irect script access allowed');

class login extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if (!isset($_POST['sb'])) {

            $this->load->view('clogin');
        } else {
            $this->form_validation->set_rules('us', 'Username', 'required');
            $this->form_validation->set_rules('pd', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('clogin');
            } else {
                $username = $this->input->post('us');
                $pass = md5($this->input->post('pd'));
                $query = $this->db->get_where('tb_user', array('userid' => $username, 'password' => $pass, 'enable' => '1'));
                $query3 = $this->db->get_where('tb_user', array('userid' => $username, 'password' => $pass, 'enable' => '0'));
                if ($query3->num_rows() == 1) {
                    $data['active'] = '<div class="alert alert-warning">Your Account has not been actvated</div>';
                    $this->load->view('clogin', $data);
                } elseif ($query->num_rows() == 1) {
                    $s_data = array('userid' => $username, 'logged_in' => TRUE);
                    $this->session->set_userdata($s_data);

                    $this->login_verify($username);
                } else {
                    $data['errormsg'] = '<div class="alert alert-danger">Password and Username combination does not match</div>';
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
            $s_data = array('user_role' => 'Student');
            $this->session->set_userdata($s_data);
            redirect('student');
        }
    }

}
