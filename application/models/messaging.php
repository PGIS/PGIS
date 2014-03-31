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
          
          $message=array(
                  'sender'=>$sender,
                  'receiver'=>  $this->input->post('to'),
                  'message_body'=>  $this->input->post('msgbody'),
                  'subject'=> $this->input->post('subject')
              );
        $this->db->insert('tb_messeges',$message);
      }
}