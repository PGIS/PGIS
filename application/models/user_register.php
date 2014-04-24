<?php

/*model for user registration into the system
 * 
 */
class User_register extends CI_Model{
    
    var $userid ='';
    var $fname ='';
    var $mname ='';
    var $password ='';
    var $email ='';
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insert_user(){
        $this->userid = $_POST['username'];
        $this->fname   = $_POST['fname']; 
        $this->mname = $_POST['mname'];
        $this->password = $_POST['password'];
        $this->email = $_POST['email'];
        $this->db->insert('tb_user', $this);
    }
}
 