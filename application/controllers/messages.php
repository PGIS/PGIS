<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Messages extends CI_Controller{
     private $limit=14;
        function __construct(){
         parent::__construct();
         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
         
         $this->load->helper('form','html','url','array','string');
         $this->load->library('form_validation','session','pagination');
        
        
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
            $data['null']='';
            $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[80]|xss_clean');
            $this->form_validation->set_rules('to', 'Receiver', 'required|max_length[40]|xss_clean');
            $this->form_validation->set_rules('msgbody', 'Message body', 'required|xss_clean');
            $this->form_validation->run();
            
            if(isset($_POST['send'])){
                if($this->form_validation->run() == TRUE){
                  $this->load->model('messaging');
                   Messaging::add_message();
                  
                  $data['sent']='Message sent';
                   if(isset($_POST['tomail'])){
                      
                      $to=$this->find_sender_email($this->input->post('to'));
                      $subject=$this->input->post('subject');
                      $message=$this->input->post('msgbody');
                      $data['toemail']=$this->send_email($to, $subject, $message);
                      
                   }
                }
                
            }
           
         $this->load->view('composemsg',$data);
        }
        
        function downlod_admsil(){
            $this->load->helper('download');
           $data['donlf']='Admssion letter has been downloaded';
           $dat = file_get_contents("attachments/admission_letter/".$this->session->userdata('userid').".pdf");
           
            $name = 'admission_letter.pdf';
            force_download($name, $dat);
            $this->load->view('application/submitmsg',$data);
        }
     
        
        function find_sender_email($to){
            $this->db->select('email');
           $query = $this->db->get_where('tb_user', array('userid' => $to),1);
            foreach ($query->result() as $email){
                return $email->email;
            }
            
        }
        
        function send_email($to,$subject,$message){
            $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
        );
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('pgis@gmail.com','PGIS TEAM');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
        if($this->email->send()){
           return 'message sent to email'; 
        }else{
            return 'not sent to email';
        }
        }
      
        function creating_pagination(){
            $this->load->model('admision_model');
            $count= Admision_model::count_all();
            $config['base_url'] = site_url('messages/index');
            $config['total_rows'] = $count;
            $config['per_page'] = $this->limit; 
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config); 
  
        }  
 }