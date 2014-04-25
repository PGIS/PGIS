<?php if (!defined('BASEPATH')){exit('No direct script access allowed');}

class Admin_page extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'url', 'text'));
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

    function addcourse() {
        $this->load->view('admin/addcourse');
    }
    function courseadd(){
        $this->form_validation->set_rules('coursename', 'Programme name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('foundcollage', 'programme college', 'trim|required|xss_clean');
        $this->form_validation->set_rules('department', 'department', 'trim|required|xss_clean');
        $this->form_validation->set_rules('durati', 'programme duration', 'trim|required|xss_clean');
        $this->form_validation->set_rules('normfee', 'programme fee', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('forefee', 'programme fee', 'trim|required|numeric|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addcourse');
        } else {
        if(isset($_POST['edit'])){
                $this->load->model('admin');
                Admin::addprogramme();
                echo '<div class="alert alert-success">Changes has been saved<div>';
            } else {
                $this->load->model('admin');
                Admin::addprogramme();
                $data['padded'] = TRUE;
                $this->load->view('admin/addcourse', $data);   
            }
            
        }
    }

    function manageprograme() {
        $this->load->view('admin/manageprogramme');
    }

    function deleteprograme($id) {
        $this->load->model('admin');
        Admin::pgdelete($id);
        $data['prdelete'] = TRUE;
        $this->load->view('admin/manageprogramme', $data);
    }

    function editprograme($prid) {
        $res=  $this->db->get_where('tb_programmes',array('prog_id'=>$prid));
         foreach ($res->result() as $detail){
             $data=array(
                 'pname'=>$detail->programme_name,
                 'pcollege'=>$detail->programme_college,
                 'pdepart'=>$detail->department,
                 'pduration'=>$detail->progr_duration,
                 'tzfee'=>$detail->tz_fee,
                 'nontzfee'=>$detail->non_tz_fee
                 );
         }
        $this->load->view('admin/editprogramme',$data);
    }
    
    function changestudentprogramme(){
        $this->load->view('admin/changeprogramme');
    }
    function changeProgramme(){
        $post=  trim($_POST['chcouname']);
        $find= $this->db->get_where('tb_student',array('registrationID'=> $post));
    if($find->num_rows()>0){
        $data['result']=$find->result();
        $this->load->view('admin/studentprogramme',$data);
    }else{
        echo '<div class="alert alert-warning">'
        . '<span class="glyphicon glyphicon-info-sign"></span> No information found: <b>Choose the correct registration number</b></div>';
    }
        
    }
  }

