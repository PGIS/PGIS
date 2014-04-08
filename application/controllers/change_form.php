<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Change_form extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form','html','url'));
        $this->load->library(array('form_validation','session'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }
    }
    function index() {
      
        if ($this->session->userdata('user_role')=='applicant') {
              $this->load->view('application/chang_pwd'); 
        }elseif ($this->session->userdata('user_role')=='Admision staff') {
            $this->load->view('Admision/chang_pwd'); 
        }elseif ($this->session->userdata('user_role')=='Finance staff') {
            $this->load->view('finance/chang_pwd'); 
        }elseif ($this->session->userdata('user_role')=='administrator') {
            $this->load->view('admin/chang_pwd');
    }
    }
    function change() {
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('opassword','Old password','trim|required|xss_clean');
        $this->form_validation->set_rules('npassword','New password','trim|required|matches[cpassword]|xss_clean');
        $this->form_validation->set_rules('cpassword','Confirm password','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->index();
        }  else {
            $this->load->model('changepass');
            $opassword= md5($this->input->post('opassword'));
            $npassword= md5($this->input->post('npassword'));
            $sn=$this->session->userdata('userid');
            $sql=$this->changepass->change_pwd_db($opassword,$sn);
            if($sql){
              $query=$this->db->query("update tb_user set password='$npassword' where password='{$opassword}' and userid='$sn'");
              if($query){  
              $data['suc_message']='<font color=blue>Password changed successively</font>';
              if ($this->session->userdata('user_role')=='applicant') {
                 $this->load->view('application/chang_pwd',$data); 
                }elseif ($this->session->userdata('user_role')=='Admision staff') {
                    $this->load->view('Admision/chang_pwd',$data);
                }
              }
            }
              else {   
              $data['error_message']='<font color=red>Wrong password</font>';
                if ($this->session->userdata('user_role')=='applicant') {
                 $this->load->view('application/chang_pwd',$data); 
                }elseif ($this->session->userdata('user_role')=='Admision staff') {
                $this->load->view('Admision/chang_pwd',$data); 
                }
                  }
            }
            }
             }
           
           
           
           
           
    

