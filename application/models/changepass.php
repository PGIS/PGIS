<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Changepass extends CI_Model{
    function isLogged() {
    return $this->session->userdata('userid');
    }
    function change_pwd_db($opassword,$n) {
        if($this->isLogged()){
           $query=$this->db
                    ->where('password',$opassword)
                    ->where('userid',$n) 
                    ->limit(1)
                    ->get('tb_user');
            if($query->num_rows()==1){
                return $query->row();
            }
        }  else {
            return FALSE;
        }
    }
}

