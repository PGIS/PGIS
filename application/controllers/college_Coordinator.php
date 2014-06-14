<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of admision
 *
 * @author emanoble
 */
class College_Coordinator extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array','string','directory'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='college coordinator') {
             redirect('logout');
        }
    }
    
    function index(){
        
        $data['query']=  $this->uncheckedApp();
        $data['query1']=  $this->checkedApplications();
        $data['active']=TRUE;
        $this->load->view('College/coadmision',$data);
     
    }
    
    function uncheckedApp(){
        $dat = array('submited' => 'yes');
        $dat1 = array('depchek' => 'yes','colcheck' => 'no');
        $this->db->where($dat1);
        $this->db->order_by('app_id', 'asc');
        $query1 = $this->db->get_where('tb_app_personal_info', $dat);
        return $query1->result();
    }
    
    
    function applicant_details($userid){
            
        $data =  $data=$this->appl_detils($userid) +$this->edu($userid)+$this->additional_data($userid);
        $this->load->view('College/applicant_detail',$data);
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
        
        
        function  appl_detils($id){
         $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$id));
         foreach ($query->result() as $row) {
                $dat = array(
                    'userid'=>$row->userid,
                    'Ucollege' => $row->college,
                    'Ucourse' => $row->prog_name,
                    'prog_mod'=>$row->prog_mode,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'appid'=>$row->app_id,
                    'datebirth' => $row->dob,
                    'country' => $row->cob,
                    'department'=>$row->department,
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
        
        function checkedApplications(){
           $dat = array('depchek' => 'yes','colcheck' => 'yes');
           $query1 = $this->db->get_where('tb_app_personal_info', $dat);
           return $query1->result();
        }
 
        
        function feedback(){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('status'=>'assigned'))->get();
         if($res->num_rows()>0){
            $data['ret']=$res;
            $this->load->view('College/college_feedback',$data);
         }  else {
             $data['ret']=$res;
             $this->load->view('College/college_feedback',$data);
         }
        
     }
     
     function registerFeedback($id){
         $data=  $this->feedback_put($id);
         $this->form_validation->set_rules('prtype', 'Presentation', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('level', 'Level', 'required|max_length[40]|xss_clean');
         $this->form_validation->set_rules('prdate', 'Presentation date', 'required|max_length[20]|xss_clean|is_unique[tb_verdicts.pr_date]');
         $this->form_validation->set_rules('comments', 'Comments','required|xss_clean');
         $this->form_validation->set_rules('verdict', 'verdict', 'required|xss_clean');
         $this->form_validation->set_rules('panel', 'Panel', 'required|xss_clean');
         if(isset($_POST['save'])){
            if($this->form_validation->run()===FALSE){
              $this->load->view('College/college_presentation_feedback',$data);
            }else{
               $this->load->model('supervisor_model');
               Supervisor_model::saveVerdicts($data['registrationID'],$data['projectid'],$data['supervisor']);
               $data['saved']=TRUE;
               $this->load->view('College/college_presentation_feedback',$data);  
            }
         }else{
            $this->load->view('College/college_presentation_feedback',$data); 
         }
     }
     
     function pr_feed($id){
         $data=  $this->feedback_put($id);
         $this->load->view('College/college_presentation_feedback',$data);
     }
     
     function feedback_put($id){
         $res=  $this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                 ->where(array('registration_id'=>$id))->get();
         if($res->num_rows()===1){
             foreach ($res->result() as $detail){
                 $data_rec=array(
                   'registrationID'=>$detail->registration_id,
                    'project_title'=>$detail->project_title,
                    'project_description'=>$detail->project_description,
                    'supervisor'=>$detail->Internal_supervisor,
                    'surname'=>$detail->surname,
                    'lastname'=>$detail->other_name,
                    'projectid'=>$detail->id  
                 );
             }
             unset($detail);
             return $data_rec;
        }
     }
    public function recent_detail($id){
         $data['recent']=$id;
         $this->load->view('College/college_recent_detail',$data);
     }
     public function recent_detailcollege($id){
         $data['recent']=$id;
         $this->load->view('College/college_recent_detailcollege',$data);
     }
     
        function details($id){
         $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->where('tb_verdicts.ver_id',$id);
            $this->db->join('tb_project','tb_project.id = tb_verdicts.project_id');
            $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
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
         $this->load->view('College/student_info',$data);
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
                $doc=$this->load->view('College/studentinfopdf',$data,TRUE);
                $file=''.$row->surname.' '.$row->other_name .'';
                pdf_create($doc,$file,TRUE);
         
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
           Admision_model::recommendationCol($id);
       }
    }
    
    function applicationFoward($id){
           $this->load->model('admision_model');
           Admision_model::applicationFowardCol($id);
            $data['query'] = $this->uncheckedApp();
            $data['query1'] = $this->checkedApplications();
            $data['active1'] = TRUE;
            $data['msgfr']=TRUE;
            $this->load->view('Department/coadmision', $data);
    }
    
    function viewRecomendation($id){
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
