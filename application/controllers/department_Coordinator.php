<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admision
 *
 * @author emanoble
 */
class Department_Coordinator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory','file'));
        $this->load->library(array('form_validation', 'session', 'javascript', 'pagination'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'department coordinator') {
            redirect('logout');
        }
    }

    function index() {
        
        $data['query'] = $this->uncheckedApp();
        $data['query1'] = $this->checkedApplications();
        $data['active'] = TRUE;
        $this->load->view('Department/coadmision', $data);
    }

    function uncheckedApp(){
        $dat = array('submited' => 'yes');
        $dat1 = array('depchek' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id', 'asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }
    function welcome(){
        $this->load->view('Department/welcome');
    }
    function applicant_details($userid) {

        $data = $data = $this->appl_detils($userid) + $this->edu($userid) + $this->additional_data($userid);
        $this->load->view('Department/applicant_detail', $data);
    }

    function edu($id) {
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $id));

        foreach ($query->result() as $ro) {
            $data2 = array(
                'specializ' => $ro->specialization,
                'high_edu' => $ro->high_edu_attained,
                'institut' => $ro->institution,
                'gradu_year' => $ro->year_of_gradu,
                'gpa' => $ro->gpa,
                'other_qualification' => $ro->other_qualification,
                'dof' => $ro->dof,
                'dot' => $ro->dot,
                'responsibility' => $ro->nature_of_work,
                'employer' => $ro->comp_employed,
                'release' => $ro->comp_release_agre,
                'position' => $ro->position
            );
        }return $data2;
    }

    function additional_data($id) {
        $query = $this->db->get_where('tb_referee', array('referee_id' => $id));

        foreach ($query->result() as $ro) {
            $value2 = array(
                'fi_refname' => $ro->first_refname,
                'se_refname' => $ro->second_refname,
                'thr_refname' => $ro->Third_refname,
                'fi_refemail' => $ro->first_email,
                'se_refemail' => $ro->second_email,
                'thr_refemail' => $ro->third_email,
                'spon_mode' => $ro->sponsership_mode,
                'spon_name' => $ro->sponser_name,
                'spon_addr' => $ro->sponser_address,
                'fi_refaddr' => $ro->first_address,
                'se_refaddr' => $ro->second_address,
                'thr_refaddr' => $ro->third_address,
                'fprospec' => $ro->fio_rospectus,
                'feduca' => $ro->fi_education_trade,
                'fjournal' => $ro->fi_newspaper,
                'fwww' => $ro->fi_www,
                'funiver' => $ro->fi_university,
                'fother' => $ro->fi_other
            );
        }
        unset($ro);
        return $value2;
    }

    function appl_detils($id) {
        $query = $this->db->get_where('tb_app_personal_info', array('userid' => $id));
        foreach ($query->result() as $row) {
            $dat = array(
                'userid' => $row->userid,
                'Ucollege' => $row->college,
                'Ucourse' => $row->prog_name,
                'prog_mod' => $row->prog_mode,
                'sname' => $row->surname,
                'other_nam' => $row->other_name,
                'title' => $row->title,
                'appid' => $row->app_id,
                'datebirth' => $row->dob,
                'country' => $row->cob,
                'department' => $row->department,
                'nationalt' => $row->nationality,
                'perm_addres' => $row->parm_address,
                'disability' => $row->disability,
                'disab_natur' => $row->disab_nature,
                'landlin' => $row->landline_no,
                'mobil' => $row->mobile_no,
                'fax' => $row->fax_no,
                'email' => $row->email
            );
        }return $dat;
    }

    function checkedApplications() {
        $dat = array('depchek' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }

    function presentationFeedback() {
        $this->load->view('Department/desertationlist');
    }

    function registerFeedback($id) {
        $data = $this->getprojecdetail($id);
        $this->form_validation->set_rules('prtype', 'Presentation', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('level', 'Level', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('prdate', 'Presentation date', 'required|max_length[20]|xss_clean|is_unique[tb_verdicts.pr_date]');
        $this->form_validation->set_rules('comments', 'Comments', 'required|xss_clean');
        $this->form_validation->set_rules('verdict', 'verdict', 'required|xss_clean');
        $this->form_validation->set_rules('panel', 'Panel', 'required|xss_clean');
        if (isset($_POST['save'])) {
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('Department/presentationfeedback', $data);
            } else {
                $this->load->model('supervisor_model');
                Supervisor_model::saveVerdicts($data['registrationID'], $data['projectid'], $data['supervisor']);
                $data['saved'] = TRUE;
                $this->load->view('Department/presentationfeedback', $data);
            }
        } else {
            $this->load->view('Department/presentationfeedback', $data);
        }
    }

    function getprojecdetail($id) {
        $this->db->select('*');
        $this->db->where('registration_id', $id);
        $this->db->from('tb_project');
        $this->db->join('tb_student', 'tb_student.registrationID = tb_project.registration_id');
        $myquer = $this->db->get();
        if ($myquer->num_rows() > 0) {
            foreach ($myquer->result() as $detail) {
                $hedetail = array(
                    'registrationID' => $detail->registration_id,
                    'project_title' => $detail->project_title,
                    'project_description' => $detail->project_description,
                    'supervisor' => $detail->Internal_supervisor,
                    'surname' => $detail->surname,
                    'lastname' => $detail->other_name,
                    'projectid' => $detail->id
                );
            }return $hedetail;
        }
    }

    function studentVerdicts($id) {
        $this->db->select('*');
        $this->db->from('tb_project');
        $this->db->where('id', $id);
        $this->db->join('tb_student', 'tb_student.registrationID = tb_project.registration_id');
        $ver = $this->db->get();
        foreach ($ver->result() as $list) {
            $data = array(
                'student_id' => $list->registrationID,
                'ptitle' => $list->project_title,
                'lname' => $list->surname,
                'sname' => $list->other_name,
            );
        }

        $this->load->view('Department/superverdlist', $data);
    }

    function viewVerdicts($id) {
        $this->db->select('*');
        $this->db->from('tb_verdicts');
        $this->db->where('ver_id', $id);
        $this->db->join('tb_student', 'tb_student.registrationID = tb_verdicts.registrationId');
        $this->db->join('tb_project', 'tb_project.id = tb_verdicts.project_id');
        $verdic = $this->db->get();
        foreach ($verdic->result()as $ver) {
            $data = array(
                'type' => $ver->type,
                'registrationid' => $ver->registrationID,
                'level' => $ver->level,
                'comments' => $ver->comment,
                'verdict' => $ver->verdicts,
                'panel' => $ver->panel,
                'lname' => $ver->surname,
                'sname' => $ver->other_name,
                'department' => $ver->department,
                'programe' => $ver->program,
                'title' => $ver->project_title,
                'prdate' => $ver->pr_date
            );
        }
        unset($ver);
        $this->load->view('Department/teachinverdics', $data);
    }

    function downloadpdf($id) {
        $this->load->helper('dompdf', 'file');
        $this->db->select('*');
        $this->db->from('tb_verdicts');
        $this->db->where('tb_verdicts.ver_id', $id);
        $this->db->join('tb_project', 'tb_project.id = tb_verdicts.project_id');
        $this->db->join('tb_student', 'tb_student.registrationID = tb_verdicts.registrationId');
        $verdic = $this->db->get();
        $row = $verdic->row();
        foreach ($verdic->result()as $ver) {
            $data = array(
                'type' => $ver->type,
                'registrationid' => $ver->registrationID,
                'level' => $ver->level,
                'comments' => $ver->comment,
                'verdict' => $ver->verdicts,
                'panel' => $ver->panel,
                'lname' => $ver->surname,
                'sname' => $ver->other_name,
                'department' => $ver->department,
                'programe' => $ver->program,
                'title' => $ver->project_title,
                'prdate' => $ver->pr_date
            );
        }
        $doc = $this->load->view('academic/teachinverdicspdf', $data, TRUE);
        $file = '' . $row->surname . ' ' . $row->other_name . '';
        pdf_create($doc, $file, TRUE);
    }

    function do_upload() {
        $data['query']=  $this->uncheckedApp();
        $data['in1'] = 'in';
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|xlsx|ods|xls|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data['view'] = TRUE;
        if (!$this->upload->do_upload()&&$this->form_validation->run()===FALSE) {
            $data['error'] = $this->upload->display_errors();
            $data['query1'] = $this->checkedApplications();
            $this->load->view('Department/coadmision', $data);
        } else {
           $document=  base_url().'uploads/'.pg_escape_string($_FILES['userfile']['name']);
           $this->load->model('admision_model');
           Admision_model::admisionCrt($document);
           $data['arra'] = "admision criteria file uploaded successfully";
           $this->load->view('Department/coadmision', $data);
        }
    }
    
    function recommendation($id){
        $this->form_validation->set_rules('rec', 'Recommendation', 'required|xss_clean');
        if($this->input->post('rec')==='Do not admit'){
             $this->form_validation->set_rules('reason', 'Reason for not admit', 'required|xss_clean|'); 
        }
        $this->form_validation->run();
       if ($this->form_validation->run() == FALSE) {
           echo form_error('rec','<div class="error">' ,'</div>');
           echo form_error('reason','<div class="error">' ,'</div>');
       }  else {
           $this->load->model('admision_model');
           Admision_model::recommendation($id);
       }
    }

    
    function applicationFoward($id){
           $this->load->model('admision_model');
           Admision_model::applicationFoward($id);
            $data['query'] = $this->uncheckedApp();
            $data['query1'] = $this->checkedApplications();
            $data['active1'] = TRUE;
            $data['msgfr']=TRUE;
            $this->load->view('Department/coadmision', $data);
    }
    
   function viewRecomendation($id){
            echo    ' <div class=" alert-info">
                    <center>DIRECTORATE RECOMMENDATION</center>
                </div>';
                 $che = array(
                            'userid' => $id,
                            'level' => 'directorate'
                          );
                $requ = $this->db->get_where('tb_admission_recomendation',$che);
                if($requ->num_rows()>0){
                    foreach ($requ->result() as $rere1){
                        $recmdtn1=$rere1->recomendation;
                        $comment1=$rere1->comment;
                    }
                    if($recmdtn1 === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment1.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                
              echo  ' <div class=" alert-info">
                    <center>COLLEGE RECOMMENDATION</center>
                </div>';
                 $chec = array(
                            'userid' => $id,
                            'level' => 'college'
                          );
                $reque = $this->db->get_where('tb_admission_recomendation',$chec);
                if($reque->num_rows()>0){
                    foreach ($reque->result() as $reres){
                        $recmdtn2=$reres->recomendation;
                        $comment2=$reres->comment;
                    }
                    if($recmdtn2 === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment2.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                
               echo ' <div class=" alert-info">
                    <center>DEPARTMENT RECOMMENDATION</center>
                </div>';
                 $check = array(
                            'userid' => $id,
                            'level' => 'department'
                          );
                $requery = $this->db->get_where('tb_admission_recomendation',$check);
                if($requery->num_rows()>0){
                    foreach ($requery->result() as $rereslt){
                        $recmdtn=$rereslt->recomendation;
                        $comment=$rereslt->comment;
                    }
                    if($recmdtn === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
   }
}
