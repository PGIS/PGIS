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
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory'));
        $this->load->library(array('form_validation', 'session', 'javascript', 'pagination'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'department coordinator') {
            redirect('logout');
        }
    }

    function index() {
        $dat = array('submited' => 'yes');
        $dat1 = array('appl_status' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id', 'asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        $data['query'] = $query1->result();
        $data['query1'] = $this->checkedApplications();
        $data['active'] = TRUE;
        $this->load->view('Department/coadmision', $data);
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
        $dat = array('appl_status' => 'yes');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
       return $query1->result();
      }

      function presentationFeedback(){
         $this->load->view('Department/desertationlist');
     }
     
      function registerFeedback($id){
         $data=  $this->getprojecdetail($id);
         $this->form_validation->set_rules('prtype', 'Presentation', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('level', 'Level', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('prdate', 'Presentation date', 'required|max_length[20]|xss_clean|is_unique[tb_verdicts.pr_date]');
         $this->form_validation->set_rules('comments', 'Comments','required|xss_clean');
         $this->form_validation->set_rules('verdict', 'verdict', 'required|xss_clean');
         $this->form_validation->set_rules('panel', 'Panel', 'required|xss_clean');
         if(isset($_POST['save'])){
            if($this->form_validation->run()===FALSE){
              $this->load->view('Department/presentationfeedback',$data);
            }else{
               $this->load->model('supervisor_model');
               Supervisor_model::saveVerdicts($data['registrationID'],$data['projectid'],$data['supervisor']);
               $data['saved']=TRUE;
               $this->load->view('Department/presentationfeedback',$data);  
            }
         }else{
            $this->load->view('Department/presentationfeedback',$data); 
         }
     }
     
      function getprojecdetail($id){
         $this->db->select('*');
         $this->db->where('registration_id', $id); 
        $this->db->from('tb_project');
        $this->db->join('tb_student', 'tb_student.registrationID = tb_project.registration_id');
        $myquer = $this->db->get();
        if($myquer->num_rows()>0){
            foreach ($myquer->result() as $detail){
                $hedetail=array(
                    'registrationID'=>$detail->registration_id,
                    'project_title'=>$detail->project_title,
                    'project_description'=>$detail->project_description,
                    'supervisor'=>$detail->Internal_supervisor,
                    'surname'=>$detail->surname,
                    'lastname'=>$detail->other_name,
                    'projectid'=>$detail->id
                );
            }return $hedetail;
        }
     }
     
     function studentVerdicts($id){
         $this->db->select('*');
         $this->db->from('tb_project');
         $this->db->where('id',$id);
         $this->db->join('tb_student','tb_student.registrationID = tb_project.registration_id');
         $ver =$this->db->get();
         foreach ($ver->result() as $list){
             $data=array(
                 'student_id'=>$list->registrationID,
                 'ptitle'=>$list->project_title,
                 'lname'=>$list->surname,
                 'sname'=>$list->other_name,
             );
         }
         
         $this->load->view('Department/superverdlist',$data); 
     }
     
      function viewVerdicts($id){
     $this->db->select('*');
     $this->db->from('tb_verdicts');
     $this->db->where('ver_id',$id);
     $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
     $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
     $verdic =$this->db->get();
     foreach ($verdic->result()as $ver){
         $data=array(
                    'type'=>$ver->type,
                    'registrationid'=>$ver->registrationID,
                    'level'=>$ver->level,
                    'comments'=>$ver->comment,
                    'verdict'=>$ver->verdicts,
                    'panel'=>$ver->panel,
                    'lname'=>$ver->surname,
                    'sname'=>$ver->other_name,
                    'department'=>$ver->department,
                    'programe'=>$ver->program,
                    'title'=>$ver->project_title,
                     'prdate'=>$ver->pr_date
                );
            }
            unset($ver);
     $this->load->view('Department/teachinverdics',$data);
    }
    
     function downloadpdf($id){
       $this->load->helper('dompdf','file');
            $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->where('tb_verdicts.ver_id',$id);
            $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
            $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
            $verdic =$this->db->get();
             $row=$verdic->row();
           foreach ($verdic->result()as $ver){
            $data=array(
                    'type'=>$ver->type,
                    'registrationid'=>$ver->registrationID,
                    'level'=>$ver->level,
                    'comments'=>$ver->comment,
                    'verdict'=>$ver->verdicts,
                    'panel'=>$ver->panel,
                    'lname'=>$ver->surname,
                    'sname'=>$ver->other_name,
                    'department'=>$ver->department,
                    'programe'=>$ver->program,
                    'title'=>$ver->project_title,
                    'prdate'=>$ver->pr_date
                );
            }
                $doc=$this->load->view('Department/teachinverdicspdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
     }
}
