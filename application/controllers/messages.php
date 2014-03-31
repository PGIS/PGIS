<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Messages extends CI_Controller{
    
        function __construct(){
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation','session');
         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }
     }
 function index(){
      $this->load->view('mymessages');
    }
   function opensms($msgid){
       
       $dat1 = array( 'message_id'=>$msgid);
       $dat2 = array( 'status'=>'checked');
       $query1 = $this->db->get_where('tb_messeges', $dat1);
       foreach ($query1->result() as $ro) {
                $data = array(
                    'sender' => $ro->sender,
                    'subject' => $ro->subject,
                    'messabe_body' => $ro->message_body
                );
            }
            
            $this->db->where('message_id', $msgid);
            $this->db->update('tb_messeges', $dat2); 
      $this->load->view('messageopen',$data);
   } 
 }