<?php if (!defined('BASEPATH'))exit('No irect script access allowed');
 class Supervisor_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     public function insert_supervisor($id,$internal,$external,$comment){
         $data=array(
               'id'=>$id,
               'Internal_supervisor'=>$internal,
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
 }

