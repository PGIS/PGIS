<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Project_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function project_form($project_id,$project_title,$project_description,$email){
         $array_data=array(
             'registration_id'=>$project_id,
             'project_title'=>$project_title,
             'project_description'=>$project_description,
             'Internal_supervisor'=>$email,
             'status'=>'unassigned'
         );
         $query=  $this->db->get_where('tb_project',array('registration_id'=>$project_id));
         if($query->num_rows()===1){
             $this->db->where('registration_id',$project_id);
             $this->db->update('tb_project',$array_data);
         }  else {
             $this->db->insert('tb_project',$array_data);    
         }
     }
     function project_prog($sn,$internal,$external,$document,$date_sub){
            $this->set_session();
                 $data=array(
                 'registrationID'=>$sn,
                 'supervisor'=>$internal,
                 'external_examiner'=>$external,
                 'document'=>$document,
                 'submission_date'=>$date_sub
             );
             $this->session->set_userdata($data);
             $query=  $this->db->get_where('tb_student_desert',array('registrationID'=>$sn,'submission_date'=>$date_sub));
              if($query->num_rows()===1){
                  $this->db->where('registrationID',$sn);
                  $this->db->update('tb_student_desert',$data);
              }else{
                  $this->db->insert('tb_student_desert',$data);
              }
     }
     function set_session(){
         $sn=  $this->session->userdata('registration_id');
         $res=  $this->db->select('Internal_supervisor,external_supervisor')->from('tb_project')->where(array('registration_id'=>$sn,'status'=>'assigned'),1)->limit(1)->get();
         $row=$res->row();
         if($res->num_rows()===1){
             $data=array(
                 'internal'=>$row->Internal_supervisor,
                 'external'=>$row->external_supervisor
             );
             $this->session->set_userdata($data);
           }  else {
        return FALSE; 
           }
    }
    function comment($reg_id,$header,$content,$date){
        $ses_array=array(
            'registrationID'=>$reg_id,
            'comments'=>$header,
            'presentation_date'=>$date,
            'conclusion'=>$content
        );
        $res=  $this->db->get_where('tb_pprogress',array('registrationID'=>$reg_id));
        if($res->num_rows()===1){
            $this->db->where('registrationID',$reg_id);
            $this->db->update('tb_pprogress',$ses_array);
        }  else {
            $this->db->insert('tb_pprogress',$ses_array);
        }
    }
 }

