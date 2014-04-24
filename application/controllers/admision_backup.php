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
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Admision staff') {
             redirect('logout');
        }
    }
    
    function index(){
        $data1 = $this->applicant_details();
        $data=$data1;
        $this->load->view('Admision/admision',$data);
    }
    function applicant_details(){
        
	$userid=$this->session->userdata('userid');
	
        $query = $this->db->get_where('tb_app_personal_info', array('userid' => $userid));
         foreach ($query->result() as $row) {
                $value = array(
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
                return $value;
            } unset($row);
            
    }
  
        
    }

