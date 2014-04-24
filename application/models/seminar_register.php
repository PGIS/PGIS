<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seminar_register extends CI_model {
    
     function __construct(){
        parent::__construct();
    }
    function insert_student($username,$course,$day,$hours,$sn){
          $data=array(
              'registration_id'=>$username,
              'course'=>$course,
              'seminar_day'=>$day,
              'semina_hour'=>$hours,
              'semina_id'=>$sn
          );
          $res=  $this->db->get_where('tb_seminar',array('registration_id'=>$username,'course'=>$course));
          if ($res->num_rows()===1){
              $this->db->where($data);
              $this->db->update('tb_seminar',$data);
          }else {
              $this->db->insert('tb_seminar',$data);
          }
          

    }
}
 
