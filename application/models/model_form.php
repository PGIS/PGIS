    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_form extends CI_Model{
    public function __construct() {
         parent::__construct();
         
     }
     public function model_form_db($username,$fname,$mname,$password,$email){
        $data=array(
              'userid'=>$username,
               'fname'=>$fname,
               'mname'=>$mname,
               'password'=>$password,
               'email'=>$email
        );
       $this->session->set_userdata($data);
       $this->db->insert('tb_user',$data);
     }
     function activate_account($email) {
     $sql="select email,activation_code from tb_user where email='$email' limit 1";
     $result=  $this->db->query($sql);
     if($result->num_rows()===1){
     $query="update tb_user set enable=1 where email='{$email}'";
     $this->db->query($query);
       }  else {
           return FALSE;  
       }
     }
     function password_recovery($email) {
       $sql="select email,userid from tb_user where email='{$email}' limit 1";
       $result=  $this->db->query($sql);
         $row=$result->row();
        return($result->num_rows()===1&&$row->email)?$row->userid :FALSE;
        
     }
     function update_password($email,$npassword) {
        $sql="update tb_user set password='{$npassword}' where email='{$email}'"; 
        $this->db->query($sql);
        if($this->db->affected_rows()===1){
            return TRUE;  
        }  else {
            return FALSE; 
        }
     }
 }