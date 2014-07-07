<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class Supervisor_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     public function insert_supervisor($userid,$internal){
         $data=array(
               'registrationID'=>$userid,
               'internal_examiner'=>$internal,
               'statuz'=>'assigned'
           );
           $res=  $this->db->get_where('tb_examiner_desert',array('registrationID'=>$userid));
           if($res->num_rows()===1){
               $this->db->where('registrationID',$userid);
               $this->db->update('tb_examiner_desert',$data);
           }  else {
               $this->db->insert('tb_examiner_desert',$data);
           }
     }
     function supervisor_assign($id,$email){
         $data_ass=array(
             'Internal_supervisor'=>$email
         );
         $res=  $this->db->get_where('tb_project',array('id'=>$id));
         if($res->num_rows()===1){
             $this->db->where('id',$id);
             $this->db->update('tb_project',$data_ass);
         }  else {
             $this->db->insert('tb_project',$data_ass);    
         }
     }
     function sec_supervisor_assign($id,$email){
         $data_ass=array(
             'sec_internal_supervisor'=>$email,
             'status_by_principle'=>'assigned'
         );
         $res=  $this->db->get_where('tb_project',array('id'=>$id));
         if($res->num_rows()===1){
             $this->db->where('id',$id);
             $this->db->update('tb_project',$data_ass);
         }  else {
             $this->db->insert('tb_project',$data_ass);    
         }
     }
     function saveVerdicts($reg,$projid,$super){
         $mydata = array
            (
             'registrationId'=>$reg,
             'project_id'=>$projid,
             'supervisor'=>$super,
            'type' => $this->input->post('prtype'),
            'level'=> $this->input->post('level'),
            'pr_date' => $this->input->post('prdate'),
            'comment' => $this->input->post('comments'),
            'verdicts' => pg_escape_string($this->input->post('verdict')),
            'panel' => $this->input->post('panel')
            );
         $this->db->insert('tb_verdicts',$mydata);
     }
     function savedCollege($id,$external_exa){
         $data_rec=array(
             'external_examiner'=>$external_exa,
             'ex_status'=>'yes'
         );
         $res=  $this->db->get_where('tb_examiner_desert',array('pr_id'=>$id));
         if($res->num_rows()===1){
             $this->db->where('pr_id',$id);
             $this->db->update('tb_examiner_desert',$data_rec);
         }
     }
     function sevedExternal($id,$external_sup){
         $data_arry=array(
             'external_supervisor'=>$external_sup
         );
      $res=  $this->db->get_where('tb_project',array('id'=>$id));
         if($res->num_rows()===1){
             $this->db->where('id',$id);
             $this->db->update('tb_project',$data_arry);
         }   
     }
     function external_feedback($document,$regstrationid,$comment,$conclusion,$feedbackdate){
         $data_array=array(
             'registration_fedID'=>$regstrationid,
             'ext_document'=>$document,
             'comment'=>$comment,
             'conclusion'=>$conclusion,
             'feedback_date'=>$feedbackdate,
             'status'=>'yes'
         );
         $res=  $this->db->get_where('tb_ext_feedback',array('feedback_date'=>$feedbackdate,'registration_fedID'=>$regstrationid));
         if($res->num_rows()===1){
             $this->db->where(array('feedback_date'=>$feedbackdate,'registration_fedID'=>$regstrationid));
             $this->db->update('tb_ext_feedback',$data_array);
         }  else {
             $this->db->insert('tb_ext_feedback',$data_array);
         }
         
     }
     function internal_feedback($document,$regstrationid,$comment,$conclusion,$feedbackdate){
         $data_array=array(
             'registration_fedId'=>$regstrationid,
             'int_document'=>$document,
             'comment'=>$comment,
             'conclusion'=>$conclusion,
             'feedback_date'=>$feedbackdate,
             'statud'=>'yes'
         );
         $res=  $this->db->get_where('tb_int_feedback',array('feedback_date'=>$feedbackdate,'registration_fedId'=>$regstrationid));
         if($res->num_rows()===1){
             $this->db->where(array('feedback_date'=>$feedbackdate,'registration_fedId'=>$regstrationid));
             $this->db->update('tb_int_feedback',$data_array);
         }  else {
             $this->db->insert('tb_int_feedback',$data_array);
         }
         
     }
     function feedbackAttach($document,$inserter_name,$registration_number){
           $array_data=array(
               'registration_exID'=>$registration_number,
               'ex_document'=>$document,
               'forward_name'=>$inserter_name,
               'ex_status'=>'yes'
           );
           $res=  $this->db->get_where('tb_forward_examiner',array('forward_name'=>$inserter_name,'registration_exID'=>$registration_number));
           if($res->num_rows()===1){
               $this->db->where('registration_exID',$registration_number);
               $this->db->update('tb_forward_examiner',$array_data);
           }  else {
               $this->db->insert('tb_forward_examiner',$array_data);
           }
     }
 }

