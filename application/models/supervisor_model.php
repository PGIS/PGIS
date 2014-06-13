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
 }

