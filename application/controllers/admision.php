<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of admision
 *
 * @author emanoble
 */
class Admision extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array'));
        $this->load->library(array('session'));
        $this->load->helper('directory');
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Admision staff') {
             redirect('logout');
        }
    }
    
    function index(){
        
        $query1 = $this->db->get_where('tb_app_personal_info', array('submited' => 'yes'));
        $data['query']=$query1->result();
        $this->load->view('Admision/admision',$data);
    }
    function applicant_details($userid){
        

        $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$userid));
         foreach ($query->result() as $row) {
                $data = array(
                    'userid'=>$row->userid,
                    'Ucollege' => $row->college,
                    'Ucourse' => $row->prog_name,
                    'prog_mod'=>$row->prog_mode,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'datebirth' => $row->dob,
                    'country' => $row->cob,
                    'nationalt' => $row->nationality,
                    'perm_addres' => $row->parm_address,
                    'disability' => $row->disability,
                    'disab_natur' => $row->disab_nature,
                    'landlin' => $row->landline_no,
                    'mobil' => $row->mobile_no,
                    'fax' => $row->fax_no,
                    'email' => $row->email
                );
               
            } unset($row);
             $this->load->view('Admision/applicant_detail',$data);
    }
  
        
    }

