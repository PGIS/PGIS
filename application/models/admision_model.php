<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admision_model extends CI_Model{
    
      function __construct() {
        parent::__construct();
       
    }
    function admit($appid,$addid,$user,$course,$suname,$othername,$nationality,$depart){
        $message=array(
                  'addmissionID'=>$addid,
                  'app_id'=>$appid,
                  'userid'=>$user
              );
        $messa=array(
            'registrationID'=>$addid,
            'applicationID'=>$user,
            'program'=>  strtolower($course),
            'department'=>strtolower($depart),
            'surname'=>$suname,
            'other_name'=>$othername,
            'nationality'=>$nationality
        );
        $messa1=array(
            'applicationID'=>$user,
            'program'=>  strtolower($course),
            'department'=>  strtolower($depart),
            'surname'=>$suname,
            'other_name'=>$othername,
            'nationality'=>$nationality
        );
        $querying = $this->db->get_where('tb_admision', array('app_id' => $appid));
        if($querying->num_rows()==0){
              $this->db->insert('tb_admision',$message);
        }
      $querying2 = $this->db->get_where('tb_student', array('applicationID' => $user));
      if($querying2->num_rows()==0){
              $this->db->insert('tb_student',$messa);
        }else{
            $this->db->where('applicationID', $user);
            $this->db->update('tb_student',$messa1);
        }
    }
    
    function verify_form($userid){
        $dat = array(
               'appl_status' => 'yes'
            );
        $this->db->where('userid',$userid);
      $this->db->update('tb_app_personal_info',$dat); 
    }
    
    function count_all(){
         $array = array('submited' => 'yes');
         $array1 = array('appl_status' => 'no');
         $this->db->from('tb_app_personal_info');
         $this->db->where($array);
         $this->db->where($array1);
        $query = $this->db->count_all_results();
        return $query;
    }
    function count(){
         $array = array('appl_status' => 'yes');
         $this->db->from('tb_app_personal_info');
         $this->db->where($array);
         
         $query = $this->db->count_all_results();
        return $query;
    }
    function fulladmsion(){
        $data = array(
               'designation' => 'Student'
            );
        $this->db->where('userid', $this->session->userdata('userid'));
        $this->db->update('tb_user', $data); 
    }
    
    function admisionCrt($filename){
        $data = array(
               'admision_criteria' => $filename
            );
        $res=  $this->db->get_where('tb_system_setting',array('admision_criteria'=>$filename));
        if($res->num_rows()===1){
         $this->db->update('tb_system_setting', $data);  
        }  else {
         $this->db->insert('tb_system_setting',$data);   
        }
    }
    
    function recommendation($id){
        
        $mydata1 = array
            (
            'userid' => $id,
            'recomendation' => $this->input->post('rec'),
            'comment' => $this->input->post('reason'),
            'level' => 'department'
        );
        $check = array(
            'userid' => $id,
            'level' => 'department'
        );
        $query = $this->db->get_where('tb_admission_recomendation',$check);

        if ($query->num_rows() == 1) {
            $this->db->where($check);
            $this->db->update('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully Updated</div>';
        } else {
            $this->db->insert('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully recorded</div>';
        }
    }
    
    
      function recommendationCol($id){
        
        $mydata1 = array
            (
            'userid' => $id,
            'recomendation' => $this->input->post('rec'),
            'comment' => $this->input->post('reason'),
            'level' => 'college'
        );
        $check = array(
            'userid' => $id,
            'level' => 'college'
        );
        $query = $this->db->get_where('tb_admission_recomendation',$check);

        if ($query->num_rows() == 1) {
            $this->db->where($check);
            $this->db->update('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully Updated</div>';
        } else {
            $this->db->insert('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully recorded</div>';
        }
    }
    
    function recommendationPg($id){
        
        $mydata1 = array
            (
            'userid' => $id,
            'recomendation' => $this->input->post('rec'),
            'comment' => $this->input->post('reason'),
            'level' => 'directorate'
        );
        $check = array(
            'userid' => $id,
            'level' => 'directorate'
        );
        $query = $this->db->get_where('tb_admission_recomendation',$check);

        if ($query->num_rows() == 1) {
            $this->db->where($check);
            $this->db->update('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully Updated</div>';
        } else {
            $this->db->insert('tb_admission_recomendation', $mydata1);
            echo '<div class="alert alert-success">Successfully recorded</div>';
        }
    }
    
    function applicationFoward($id){
        $check = array(
            'userid' => $id
        );
        $mydata1=array('depchek'=>'yes');
         $this->db->where($check);
         $this->db->update('tb_app_personal_info', $mydata1);
    }
    
    function applicationFowardCol($id){
        $check = array(
            'userid' => $id
        );
        $mydata1=array('colcheck'=>'yes');
         $this->db->where($check);
         $this->db->update('tb_app_personal_info', $mydata1);
    }
    
    function applicationFowardPg($id){
        $check = array(
            'userid' => $id
        );
        $mydata1=array('pgcheck'=>'yes');
         $this->db->where($check);
         $this->db->update('tb_app_personal_info', $mydata1);
    }
}
