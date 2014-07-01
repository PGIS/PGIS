<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admision
 *
 * @author emanoble
 */
class Financeadmin extends CI_Controller {

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
        $this->load->view('finance/finance');
    }
    
    function welcome(){
        $this->load->view('finance/welcome');
    }

    function applidetails($userid) {
        $data = $this->usdetail($userid);
        $data['id'] = $userid;
        $query = $this->db->get_where('tb_finance_application', array('userid' => $userid));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rstd) {
                $data['receptno'] = $rstd->recept_no;
                $data['paydate'] = $rstd->payment_date;
                $data['filename'] = $rstd->supporting_doc;
            }
            $this->load->view('finance/paydetail', $data);
        } else {
            echo '<p><div class="alert alert-warning">no any information found</div></p>';
        }
    }

    function registrdetails($userid,$recn) {
        $data = $this->usdetail($this->finduserid($userid));
        $data['regno'] = $userid;
        $this->db->where('receipt_no', $recn); 
        $query = $this->db->get_where('tb_finance', array('registration_id' => $userid));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rstd) {
                $data['rectno'] = $rstd->receipt_no;
                $data['paytdate'] = $rstd->date_payment;
                $data['filname'] = $rstd->suporting_doc;
                $data['amountpaid'] = $rstd->amount_paid;
                $data['paymode'] = $rstd->mode_payment;
                $data['amntreq'] = $rstd->amount_required;
            }
            $this->load->view('finance/regpaydetail', $data);
        }
    }

    function usdetail($id) {
        $query = $this->db->get_where('tb_app_personal_info', array('userid' => $id));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $dat = array(
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'nationality'=>$row->nationality
                );
                return $dat;
            }
        }
    }

    function finduserid($id) {
        $quer = $this->db->get_where('tb_admision', array('addmissionID' => $id));
        if ($quer->num_rows() > 0) {
            foreach ($quer->result() as $row) {
                $dat = $row->userid;
            }return $dat;
        }
    }

    function verifyappfee($userid, $value) {
        $this->load->model('finance_model');
        Finance_model::updateapplfee($userid, $value);
        if ($value == 'rejected') {
            Finance_model::returnformtouser($userid);
        }
        echo '<div class="alert alert-success">The infomation is already processed</div>';
    }

    function tutionfeeverify($id, $value,$recto) {
        echo $recto;
       $this->load->model('finance_model');
      Finance_model::updatetutionfee($id, $value,$recto);
    }

}
