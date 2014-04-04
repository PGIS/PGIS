<?php


class Seminar_register extends CI_model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function insert_student($username,$sum){
          $data=array(
              'registrationID'=>$username,
              'semina_date'=>$sum
          );
          $res=  $this->db->get('tb_student');
          if ($res->num_rows()===1){
              $this->db->update('tb_student',$data);
          }  else {
              $this->db->insert('tb_student',$data);
          }
          
//        $this->$username =$_POST['registration_id'];
//        $this->$day + $hour =$_POST['seminar_date'];
//        $this->db->insert('tb_student', $this);
    }
}
 
