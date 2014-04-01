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
   function unread(){
        $this->load->view('unreadmsg');
   }
   
   function send_sms($userid){
       $data=  $this->appl_detils($userid);
           $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[80]|xss_clean');
           $this->form_validation->set_rules('to', 'Receiver', 'required|max_length[40]|xss_clean');
           $this->form_validation->set_rules('msgbody', 'Message body', 'required|xss_clean');
           $this->form_validation->run();
           
           if(isset($_POST['send'])){
                if($this->form_validation->run() == TRUE){
                  $this->load->model('messaging');
                  Messaging::add_message();
                   Messaging::return_to_customer($userid);
                  $data['sent']='Message sent';
                }
            }
           $data['userid']=$userid;
         $this->load->view('Admision/denied_appl_message',$data);
   }
   
    function  appl_detils($id){
         $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$id));
         foreach ($query->result() as $row) {
                $dat = array(
                    'userid'=>$row->userid,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'appid'=>$row->app_id,
                    'datebirth' => $row->dob,
                    'country' => $row->cob
                );
           
        }return $dat;
        }
        function create_message(){
            $this->load->view('composemsg');
        }
        function send_to_email(){
            
        }
 }