<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class Supervisor_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     public function insert_supervisor($id,$external,$comment){
         $data=array(
               'id'=>$id,
               'external_supervisor'=>$external,
               'comments'=>$comment,
               'status'=>'assigned'
           );
           $res=  $this->db->get_where('tb_project',array('id'=>$id));
           if($res->num_rows()===1){
               $this->db->where('id',$id);
               $this->db->update('tb_project',$data);
           }  else {
               return FALSE; 
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
            'date' => $this->input->post('prdate'),
            'comment' => $this->input->post('comments'),
            'verdicts' => $this->input->post('verdict'),
            'panel' => $this->input->post('panel')
            );
         $this->db->insert('tb_verdicts',$mydata);
     }
 }

