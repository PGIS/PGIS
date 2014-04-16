<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_page extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form', 'html', 'url');
        $this->load->library(array('form_validation', 'pagination', 'table'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'administrator') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->model('admin');
        $data['results'] = $this->admin->get_paged_list()->result();
        $this->load->view('admin/adminList', $data);
    }

    function add() {
        $this->form_validation->set_rules('userid', 'username', 'trim|required|min_length[6]|max_length[12]|is_unique[tb_user.userid]|xss_clean');
        $this->form_validation->set_rules('fname', 'first name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mname', 'middle name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[tb_user.email]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/add_page');
        } else {

            $this->load->model('admin');
            $this->admin->save();
            $data['add'] = '<font color=green>User successively added</font>';
            $this->load->view('admin/add_page', $data);
        }
    }

    function delete($id) {
        $this->load->model('admin');
        $this->admin->quit($id);

        $data['error_message'] = '<font color=blue>successively deleted</font>';
        redirect('admin_page', $data);
    }

    function seminar() {
        $this->form_validation->set_rules('day', 'day', 'required');
        $this->form_validation->set_rules('hr', 'hour', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('seminar_register');
            $day = $this->input->post('day');
            $hour = $this->input->post('hr');
            $this->seminar_register->insert_seminar($day, $hour);
            $data['smg'] = '<font> Thanks you have already registered your time</font>';
            $this->load->view('admin/seminar_reg', $data);
        }
    }
    function addcourse(){
        $this->load->view('admin/addcourse');
    }
}
