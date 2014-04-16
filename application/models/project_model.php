<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Project_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function project_form($project_id,$project_title,$project_description){
         $array_data=array(
             'registration_id'=>$project_id,
             'project_title'=>$project_title,
             'project_description'=>$project_description
         );
         $query=  $this->db->get_where('tb_project',array('registration_id'=>$project_id));
         if($query->num_rows()===1){
             $this->db->where('registration_id',$project_id);
             $this->db->update('tb_project',$array_data);
         }  else {
             $this->db->insert('tb_project',$array_data);    
         }
     }
 }

