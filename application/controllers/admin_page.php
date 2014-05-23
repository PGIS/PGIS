<?php if (!defined('BASEPATH')){exit('No direct script access allowed');}

class Admin_page extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'url', 'text','directory','array'));
        $this->load->library(array('form_validation','session','encrypt'));
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
         $data['in']='in';
        $this->form_validation->set_rules('userid', 'username', 'trim|required|min_length[6]|max_length[12]|is_unique[tb_user.userid]|xss_clean');
        $this->form_validation->set_rules('fname', 'first name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mname', 'middle name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|is_unique[tb_user.email]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/add_page',$data);
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

    function course1() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course2() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course3() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course4() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course5() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course6() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
        }
    }
    function course7() {
        $this->form_validation->set_rules('smd', 'Seminar day', 'trim|required|xss_clean');
        $this->form_validation->set_rules('smv', 'Seminar venue', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/seminar_reg');
        } else {
            $this->load->model('admin');
            $seminar_day=  $this->input->post('smd');
            $course_code=  $this->input->post('course');
            $morning_hour=  $this->input->post('smm');
            $evening_hour=  $this->input->post('smme');
            $afternoon_hour=  $this->input->post('sma');
            $venue=  $this->input->post('smv');
            $limit=  $this->input->post('max');
            $this->admin->course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit);
            echo '<p class="alert alert-success"> Thanks you have already registered your time</p>';
            
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
    
    function do_upload(){
         $data['in1']='in';
         $config['upload_path'] = './attachments/';
         $config['allowed_types'] = 'jpg|xlsx|ods|xls|';
         $config['max_size'] = '2048';
         $config['remove_spaces'] = TRUE;
         $config['overwrite'] = true;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
         
         if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('admin/add_page', $data);
        }else{
            $this->exceldata();
            $data['arra']="User's Details where added successful";
             $this->load->view('admin/add_page',$data);
        }
    }
    function exceldata() {
        $this->load->library('excel');
        $inputFileName = './attachments/staff_names.xls';

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            foreach ($rowData as $myrowdata){
                $data2insert=array(
                    '#number'=>$myrowdata[0],
                    'fullName'=>$myrowdata[1].' '.$myrowdata[2],
                    'qualification'=>$myrowdata[3]
                );
                $data= array(
                    'userid' => $myrowdata[0],
                    'password' => md5($myrowdata[2]),
                    'designation' => $myrowdata[5],
                    'email' => $myrowdata[4],
                    'enable' => '1'
                );
               $this->load->model('admin');
               Admin::insertExcell($data,$data['userid']);
               Admin::addUserFromExcel($data2insert,$data2insert['#number']); 
            }
        }
    }

}
