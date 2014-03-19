<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
    $this->load->helper('form','html','url');
    $this->load->library('form_validation');
     
    }
  public function index(){
      $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
            
        );
      $this->form_validation->set_rules('userid','username','trim|required|min_length[6]|max_length[12]|is_unique[tb_user.userid]');
      $this->form_validation->set_rules('fname','first name','trim|required');
      $this->form_validation->set_rules('mname','middle name','trim|required');
      $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|is_unique[tb_user.email]');
      $this->form_validation->set_rules('password','password','trim|required|matches[passconf]');
      $this->form_validation->set_rules('passconf','password confirmation','trim|required');
      
      if($this->form_validation->run()==FALSE){
       $this->load->view('register_form');
      }
 else {
      $this->load->model('model_form');
      $username=$this->input->post('userid');
      $fname=$this->input->post('fname');
      $mname=$this->input->post('mname');
      $password=md5($this->input->post('password'));
      $email=$this->input->post('email');
      
      $this->load->library('email',$config);
      $this->email->set_newline("\r\n");
      $this->email->from('pgis@gmail.com','PGIS TEAM');
      $this->email->to($email);
      $this->email->subject('Activate your account');
      $message='<html>
                 . <head><title></title></head>
                    <body>';
      $message .='<p> Dear'.' '.$username.'</p>';
      $message .='<p> Thanks for registaring and please <strong><a href="http://localhost/PGIS/index.php/register/email_validation">click here</a></strong> to activate yoour account';
      $message .='<p> PGIS TEAM</p>';
      $message .='</body>';
      $message .='</html>';
      $this->email->message($message);
      if(@$this->email->send()){
      $data['smg']=$username;
      $this->load->view('registration_confirmation',$data);
      $this->model_form->model_form_db($username,$fname,$mname,$password,$email);
      }else{
      $this->load->view('network_error1');
      }
      }
  }
  function email_validation() {
      $this->load->model('model_form');
      $email= $this->session->userdata('email');
      $validated=  $this->model_form->activate_account($email);
      if($validated){
       
      }  else {
      $data['error_message']='<font color=blue><p align=center>Successify registered </p><p align=center>You can login now.!</p></font>';
      $this->load->view('clogin',$data);
      }
  }
  function passconfig(){
       $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
            
        );
      $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|xss_clean');
      if($this->form_validation->run()===FALSE){
         $this->load->view('forget_pass');
          }  else{
           $this->load->model('model_form');
           $email=  $this->input->post('email');
           $result=$this->model_form->password_recovery($email);
           if($result){
           $this->load->library('email',$config);
           $this->email->set_newline("\r\n");
           $this->email->from('pgisteam@gmail.com','PGIS TEAM');
           $this->email->to($email);
           $this->email->subject('PASSWORD RECOVERY');
           $message='<html>
                    <head><title></title></head>
                    <body>';
           $message.='<p>Dear'.' '.$email.'</p>';
           $message.='<p>To recover your password please <strong><a href="  http://localhost/PGIS/index.php/register/password_lost ">click here</a></strong> to retrive lost password</p>';
           $message.='<p>Thanks !!!!</p>';
           $message.='<p>PGIS TEAM</p>';
           $message.='</body>';
           $message.='</html>';
           $this->email->message($message);
           if(@$this->email->send()){
           $data['error_message']='<font color=blue>E-mail sent !!</font>';
           $this->load->view('forget_pass',$data);
           }  else {
               $this->load->view('network_error');   
           }
          }
          else{
           $data['error_message']='<font color=red>Invalid email</font>';
           $this->load->view('forget_pass',$data);
         }
        
          }
         }
         function password_lost(){
             $this->form_validation->set_rules('email','E-mail','required|valid_email|xss_clean');
             $this->form_validation->set_rules('npassword','New password','trim|required|matches[passwordconf]|xss_clean');
             $this->form_validation->set_rules('passwordconf','Confirmation password','trim|required|xss_clean');
               if($this->form_validation->run()===FALSE){
                   $this->load->view('password_retrival'); 
               } else {
                   $email=  $this->input->post('email');
                   $npassword=  md5($this->input->post('npassword'));
                   $query="select email,userid from tb_user where email='{$email}' limit 1";
                   $result=$this->db->query($query);
                   $row=$result->row();
                   if($result->num_rows()===1&& $row->userid){
                    $this->load->model('model_form'); 
                    $this->model_form->update_password($email,$npassword);
                    $data['error_message']='<font color=blue><p align=center>Successify updated: </p><p align=center>You can login now.!</p></font>';
                    $this->load->view('clogin',$data);
                   }  else {
                     $data['error_message']='<font color=red><p align=center>invalid email...!! </p></font>';
                    $this->load->view('password_retrival',$data);  
                   }
               }
             }
             
        function retrieve_actv(){
           $query = $this->db->query('SELECT activation_code FROM tb_user'); 
            
        }
}
  

         

         
  
  


