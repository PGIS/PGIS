<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Send_email {

    public function sending_email($to,$subject,$message){
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
        $this->email->to(set_value($to));
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
}
