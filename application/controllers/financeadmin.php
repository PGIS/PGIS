<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of admision
 *
 * @author emanoble
 */

class Financeadmin extends CI_Controller{
   
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array','string','directory'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Finance staff') {
             redirect('logout');
        }
      }
      
      function  index(){
          $this->load->view('finance/finance');
      }
     function applidetails($userid){
         $data=  $this->usdetail($userid);
          $query = $this->db->get_where('tb_finance_application', array('userid' =>$userid));
                if($query->num_rows()>0){
                    foreach ($query->result() as $rstd){
                          $data['receptno']=$rstd->recept_no;
                          $data['paydate']=$rstd->payment_date;
                          $data['filename']=$rstd->supporting_doc;
                    }
                    $this->load->view('finance/paydetail',$data);
                }else{
                    echo '<p><div class="alert alert-warning">no any information found</div></p>';
                } 
     }
     function usdetail($id){
         $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$id));
         if($query->num_rows()>0){
         foreach ($query->result() as $row) {
                $dat = array(
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title
         );
                return $dat;
         }
        } }
  }