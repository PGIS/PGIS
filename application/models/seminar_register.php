<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seminar_register extends CI_model {
    
     function __construct(){
        parent::__construct();
    }
    function insert_student($username,$course,$day,$hours,$sn,$venue){
          $data=array(
              'registration_id'=>$username,
              'course'=>$course,
              'semina_day'=>$day,
              'semina_hour'=>$hours,
              'student_name'=>$sn,
              'semina_venue'=>$venue
          );
          $res=  $this->db->get_where('tb_sem_reg',array('registration_id'=>$username,'course'=>$course));
          if ($res->num_rows()===1){
              $this->db->where($data);
              $this->db->update('tb_sem_reg',$data);
          }else {
              $this->db->insert('tb_sem_reg',$data);
          }
          

    }
}
 
