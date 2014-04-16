<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admision_model extends CI_Model{
    
      function __construct() {
        parent::__construct();
       
    }
    function admit($appid,$addid,$user){
        $message=array(
                  'addmissionID'=>$addid,
                  'app_id'=>$appid,
                  'userid'=>$user
              );
        $querying = $this->db->get_where('tb_admision', array('app_id' => $appid));
        if($querying->num_rows()==0){
              $this->db->insert('tb_admision',$message);
        }
      
    }
    
    function verify_form($userid){
        $dat = array(
               'appl_status' => 'yes'
            );
        $this->db->where('userid',$userid);
      $this->db->update('tb_app_personal_info',$dat); 
    }
    
    function count_all(){
         $array = array('submited' => 'yes');
         $array1 = array('appl_status' => 'no');
         $this->db->from('tb_app_personal_info');
         $this->db->where($array);
         $this->db->where($array1);
        $query = $this->db->count_all_results();
        return $query;
    }
    function count(){
         $array = array('appl_status' => 'yes');
         $this->db->from('tb_app_personal_info');
         $this->db->where($array);
         
         $query = $this->db->count_all_results();
        return $query;
    }
    function fulladmsion(){
        $data = array(
               'designation' => 'Student'
            );
        $this->db->where('userid', $this->session->userdata('userid'));
        $this->db->update('tb_user', $data); 
    }
}
