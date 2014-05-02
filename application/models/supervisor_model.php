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
     function insert_update($id,$comments){
         $array=array(
             'comments'=>$comments,
             'status'=>'pending'
         );
         $res=  $this->db->get_where('tb_project',array('id'=>$id));
         if($res->num_rows()===1){
             $this->db->where('id',$id);
             $this->db->update('tb_project',$array);
         }  else {
             return FALSE;
         }
     }
 }

