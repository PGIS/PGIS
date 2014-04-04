<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Messaging extends CI_Model{
   
      function __construct() {
        parent::__construct();
      }
     
      function add_message(){
          if($this->session->userdata('user_role')=='Admision staff'){
              $sender=$this->session->userdata('user_role');
          }elseif ($this->session->userdata('user_role')=='administrator') {
            $sender=$this->session->userdata('user_role');
          }  else {
              $sender=$this->session->userdata('userid');
          }
          
          if($this->input->post('to')=='All Applicant'){
              $query = $this->db->get_where('tb_user', array('designation' => "applicant"));
              foreach ($query->result() as $row){
                 $message=array(
                          'sender'=>$sender,
                          'receiver'=>  $row->userid,
                          'message_body'=>  $this->input->post('msgbody'),
                          'subject'=> $this->input->post('subject')
                      );
        $this->db->insert('tb_messeges',$message);     
                } 
              /*sending messages to applicant who ddnt submit the aplication form
               */
          } elseif($this->input->post('to')=='Applicants with un-submitted application') {
              
               $query = $this->db->get_where('tb_app_personal_info', array('submited' => NULL));
                    foreach ($query->result() as $row){
                 $message=array(
                          'sender'=>$sender,
                          'receiver'=>  $row->userid,
                          'message_body'=>  $this->input->post('msgbody'),
                          'subject'=> $this->input->post('subject')
                      );
        $this->db->insert('tb_messeges',$message);     
                } 
                
          }else{
             $message=array(
                  'sender'=>$sender,
                  'receiver'=>  $this->input->post('to'),
                  'message_body'=>  $this->input->post('msgbody'),
                  'subject'=> $this->input->post('subject')
              );
        $this->db->insert('tb_messeges',$message); 
          }
          
      }
      
      function return_to_customer($id){
          $data1=array('submited'=>'');
                $this->db->where('userid',$id);
                $this->db->update('tb_app_personal_info', $data1); 
      }
      
   
}