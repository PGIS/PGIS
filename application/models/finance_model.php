<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Finance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function finance_insert($rgistration_id, $registration, $rgistration_amount, $registration_receipt, $payment, $payment_date, $imageName, $academic, $application_id) {
        $array_data = array(
            'registration_id' => $rgistration_id,
            'payment_details' => $registration,
            'amount_paid' => $rgistration_amount,
            'receipt_no' => $registration_receipt,
            'mode_payment' => $payment,
            'date_payment' => $payment_date,
            'suporting_doc' => $imageName,
            'academic_year' => $academic,
            'application_id' => $application_id,
            'regstatus'=> 'unchecked',
            'amount_required'=> $this->findfee($rgistration_id)
        );
        $res = $this->db->get_where('tb_finance', array('receipt_no' => $registration_receipt));
        if ($res->num_rows() == 1) {
            $this->db->where('payment_details', $registration);
            $this->db->update('tb_finance', $array_data);
        } else {
            $result = $this->db->insert('tb_finance', $array_data);
            return $result;
        }
    }

    public function display($year) {
        $this->db->get_where('tb_finance', array('registration_id' => $this->session->userdata('userid'), 'payment_details' => $year));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function show_result() {
        $result = $this->db->get_where('tb_studentReg', array('regist_name' => $this->session->userdata('userid')));
        if ($result->affected_rows() === 1) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function registration_data($sn, $postponement, $date_postponement, $postponement_resons) {
        $reg_data = array(
            'regist_name' => $sn,
            'postponement' => $postponement,
            'date_postponement' => $date_postponement,
            'postponemet_reason' => $postponement_resons
        );
        $res = $this->db->get_where('tb_studentReg', array('regist_name' => $this->session->userdata('userid')));
        if ($res->num_rows() === 1) {

            $this->db->update('tb_studentReg', $reg_data);
        } else {
            $this->db->insert('tb_studentReg', $reg_data);
        }
    }

    public function register_remained($sn, $freezing, $freez_date, $freez_resume, $freezing_reasons) {
        $reg_rem = array(
            'regist_name' => $sn,
            'freezing' => $freezing,
            'date_freezing' => $freez_date,
            'date_resume' => $freez_resume,
            'freezing_reason' => $freezing_reasons
        );
        $result = $this->db->get_where('tb_studentReg', array('regist_name' => $this->session->userdata('userid')));
        if ($result->num_rows() === 1) {
            $this->db->where('regist_name', $this->session->userdata('userid'));
            $this->db->update('tb_studentReg', $reg_rem);
        } else {
            $this->db->insert('tb_studentReg', $reg_rem);
        }
    }

    public function register_extension($sn, $extension, $ext_date, $period, $extension_reasons) {
        $reg_ext = array(
            'regist_name' => $sn,
            'extension' => $extension,
            'date_extension' => $ext_date,
            'month_extension' => $period,
            'extending_reason' => $extension_reasons
        );
        $query = $this->db->get_where('tb_studentReg', array('regist_name' => $this->session->userdata('userid')));
        if ($query->num_rows() === 1) {
            $this->db->where('regist_name', $this->session->userdata('userid'));
            $this->db->update('tb_studentReg', $reg_ext);
        } else {
            $this->db->insert('tb_studentReg', $reg_ext);
        }
    }

    function application_fee($filename) {

        $details = array(
            'userid' => $this->session->userdata('userid'),
            'recept_no' => $this->input->post('receptno'),
            'payment_date' => $this->input->post('paydate'),
            'supporting_doc' => $filename,
            'appl_status' => 'unchecked'
        );
        $query = $this->db->get_where('tb_finance_application', array('userid' => $this->session->userdata('userid')));
        if ($query->num_rows() === 1) {
            if (isset($_POST['save'])) {
                $this->db->where('userid', $this->session->userdata('userid'));
                $this->db->update('tb_finance_application', $details);
            }
        } else {
            if (isset($_POST['save'])) {
                $this->db->insert('tb_finance_application', $details);
            }
        }
    }

    function updateapplfee($userid, $value) {

        if ($value == 'accepted') {
            $this->db->where('userid', $userid);
            $this->db->update('tb_finance_application', array('appl_status' => $value));
        } else {
            $this->db->where('userid', $userid);
            $this->db->update('tb_finance_application', array('appl_status' => 'rejected'));
        }
    }

    function returnformtouser($userid) {
        $array = array('submited' => "no");
        $this->db->where('userid', $userid);
        $this->db->update('tb_app_personal_info', $array);
    }
    
    function updatetutionfee($id, $value,$rec) {

        if ($value =='accepted') {
            $this->db->where('registration_id', $id);
             $this->db->where('receipt_no', $rec);
            $this->db->update('tb_finance', array('regstatus' => $value));
        } else {
            $this->db->where('registration_id', $id);
             $this->db->where('receipt_no', $rec);
            $this->db->update('tb_finance', array('regstatus' => 'rejected'));
        }
    }
    
    //finding the fee amount required for the course
    function findfee($regid){
        $thquery = $this->db->get_where('tb_student', array('registrationID' => $regid),1);
        if($thquery->num_rows()>0){
            foreach ($thquery->result() as $fee){
                $pr=$fee->program;
                $natinality=$fee->nationality;
            }
            $feequery = $this->db->get_where('tb_programmes', array('programme_name' => $pr),1);
            if($feequery->num_rows()>0){
               foreach ($feequery->result() as $pfee){
                   $tz=$pfee->tz_fee;
                   $nontz=$pfee->non_tz_fee;
            }
            if(strtolower($natinality)==='tanzanian'){
                return $tz;
            }  else {
                return $nontz;
            }
            }
        }
    }
}
