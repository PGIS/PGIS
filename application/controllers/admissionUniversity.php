<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admision
 *
 * @author emanoble
 */
class AdmissionUniversity extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory', 'file'));
        $this->load->library(array('form_validation', 'session', 'javascript', 'pagination'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'dvc academic') {
            redirect('logout');
        }
    }

    function index() {

        $data['query'] = $this->uncheckedApp();
        $data['query1'] = $this->checkedApplications();
        $data['active'] = TRUE;
        $this->load->view('University/coadmision', $data);
    }

    function uncheckedApp() {
        $dat = array('submited' => 'yes');
        $dat1 = array('depchek' => 'yes', 'colcheck' => 'yes', 'pgcheck' => 'no', 'unicheck' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id', 'asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }

    function welcome() {
        $this->load->view('University/welcome');
    }

    function applicant_details($userid) {

        $data = $data = $this->appl_detils($userid) + $this->edu($userid) + $this->additional_data($userid);
        $this->load->view('University/applicant_detail', $data);
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
            return $dat;
        }
    }

    function checkedApplications() {
        $dat = array('depchek' => 'yes', 'colcheck' => 'yes', 'pgcheck' => 'yes', 'unicheck' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }

    function admitted_applicants() {
        $dat = array('depchek' => 'yes', 'colcheck' => 'yes', 'pgcheck' => 'yes', 'appl_status' => 'yes', 'unicheck' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        if ($query1->num_rows() > 0) {
            $data['query'] = $query1->result();
        }
        $data['query2'] = $this->rejected_applicants();
        $data['active'] = TRUE;
        $this->load->view('University/admited_applicants', $data);
    }

    function rejected_applicants() {
        $dat = array('depchek' => 'yes', 'colcheck' => 'yes', 'pgcheck' => 'yes', 'appl_status' => 'rejected');
        $query2 = $this->db->get_where('tb_app_personal_info', $dat);
        if ($query2->num_rows() > 0) {
            return $query2->result();
        } else {
            return NULL;
        }
    }

    function recommendation($id) {
        $this->form_validation->set_rules('rec', 'Recommendation', 'required|xss_clean');
        if ($this->input->post('rec') === 'Do not admit') {
            $this->form_validation->set_rules('reason', 'Reason for not admit', 'required|xss_clean|');
        }
        $this->form_validation->run();
        if ($this->form_validation->run() == FALSE) {
            echo form_error('rec', '<div class="error">', '</div>');
            echo form_error('reason', '<div class="error">', '</div>');
        } else {
            $this->load->model('admision_model');
            Admision_model::recommendationUni($id);
        }
    }
    
    function applicationFoward($id){
           $this->load->model('admision_model');
           Admision_model::applicationFowardUni($id);
            $data['query'] = $this->uncheckedApp();
            $data['query1'] = $this->checkedApplications();
            $data['active1'] = TRUE;
            $data['msgfr']=TRUE;
            $this->load->view('University/coadmision', $data);
    }

    
      function viewRecomendation($id){
           echo    ' <div class=" alert-info">
                    <center>UNIVERSITY RECOMMENDATION</center>
                </div>';
                 $cheu = array(
                            'userid' => $id,
                            'level' => 'university'
                          );
                $requu = $this->db->get_where('tb_admission_recomendation',$cheu);
                if($requu->num_rows()>0){
                    foreach ($requu->result() as $rere1u){
                        $recmdtn1u=$rere1u->recomendation;
                        $comment1u=$rere1u->comment;
                    }
                    if($recmdtn1u === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment1u.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
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
