<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admision
 *
 * @author emanoble
 */
class Financehistory extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form', 'html', 'url', 'array', 'string', 'directory'));
        $this->load->library(array('form_validation', 'session', 'javascript', 'pagination'));
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'Finance staff') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->view('finance/financedetail');
    }

    function historyfinance($reg) {
      
         $data['history']=  $this->academicyear($reg);
         $data['requiredAmnt']=  $this->findRequiredAmmount($reg);
         $data['regno']=$reg;
         $this->load->view('finance/paymenthistory',$data);
    }
    function academicyear($reg){
       $this->db->distinct();
       $this->db->select('academic_year')->from('tb_finance')->where('registration_id',$reg);
       $q = $this->db->get();
       return $q;
    }
    function findRequiredAmmount($reg){
        $this->db->select('*');
        $this->db->where('registrationID', $reg); 
        $this->db->from('tb_student');
        $this->db->join('tb_programmes', 'tb_programmes.programme_name = tb_student.program');
        $myquer = $this->db->get();
        if($myquer->num_rows()>0){
            foreach ($myquer->result() as $det){
                if($det->nationality=='tanzanian'){
                    $ammount=$det->tz_fee + 95000;
                    return $ammount;
                }else{
                  $ammount=$det->non_tz_fee+85;
                    return $ammount;  
                }
            }
        }  else {
            
        }
    }
   }
