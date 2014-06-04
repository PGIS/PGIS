<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eventmodel extends CI_Model {

    private $tb_user = 'tb_user';

    function __construct() {
        parent::__construct();
        //$limit=4;
    }
    
function recordPostponement($id){
     $event = array(
            'registration_ID' => $id,
            'description' => $this->input->post('extnu'),
            'from' => $this->input->post('from'),
            'to' => $this->input->post('to')
        );
     $query = $this->db->get_where('tb_event_postpone', $event);
     if($query->num_rows()==0){
         $this->db->insert('tb_event_postpone', $event);
     }
   }
   
   function recordFreez($id){
     $event = array(
            'registration_ID' => $id,
            'description' => $this->input->post('extnu'),
            'from' => $this->input->post('from'),
            'to' => $this->input->post('to')
        );
     $query = $this->db->get_where('tb_event_freez', $event);
     if($query->num_rows()==0){
         $this->db->insert('tb_event_freez', $event);
     }
   }
   
   function recordExtension($id){
     $event = array(
            'registration_ID' => $id,
            'description' => $this->input->post('extnu'),
            'from' => $this->input->post('from'),
            'to' => $this->input->post('to'),
            'period' => $this->input->post('month')
        );
     $query = $this->db->get_where('tb_event_extend', $event);
     if($query->num_rows()==0){
         $this->db->insert('tb_event_extend', $event);
     }
   }
   
   function recordDisco($id){
       $event = array(
            'registration_ID' => $id
        ); 
        $query = $this->db->get_where('tb_event_disco', $event);
     if($query->num_rows()==0){
         $this->db->insert('tb_event_disco', $event);
     }
   }
   function findUsername($id){
       $query1 = $this->db->get_where('tb_student', array('registrationID' => $id));
       if($query1->num_rows()>0){
           foreach ($query1->result() as $udt){
              $myuserid=$udt->applicationID;
           }
           echo $myuserid;
        
       }
        
   }
}