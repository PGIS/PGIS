<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Finance_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function finance_insert($application_id,$registration,$finance_id,$payment_no,$payment_details,$amount,$date_pay,$imageName,$imageData){
        $array_data=array(
            'app_id'=>$application_id,
            'registration_id'=>$registration,
            'finance_id'=>$finance_id,
            'payment_no'=>$payment_no,
            'payment_detail'=>$payment_details,
            'amount'=>$amount,
            'date_payment'=>$date_pay,
            'name'=>$imageName,
            'image'=>$imageData
        );
        $res=$this->db->get_where('tb_finance',array('app_id'=>  $this->session->userdata('userid')));
        if($res->num_rows()===1){
        $this->db->update('tb_finance',$array_data);
        }  else {
        $result= $this->db->insert('tb_finance',$array_data);
        return $result;  
        }
    }
    public function display(){
        $query=$this->db->get_where('tb_finance',array('app_id'=>  $this->session->userdata('userid')));
        if($this->db->affected_rows()==1){
        return $query->result();
        }  else {
           return FALSE; 
        }
    }
    public function registration_data($sn,$date_reg,$date_begin,$date_comp,$postponement,$date_postponement,$frezing,
            $date_frez,$date_resume,$extension,$date_ext,$period_ext,$regist_fees,$regist_fee_amount,$regist_receiptno,
            $studentship_fees,$studentship_amount,$studentship_receiptno){
        $reg_data=array(
            'regist_name'=>$sn,
            'date_regist'=>$date_reg,
            'date_begin'=>$date_begin,
            'date_compt'=>$date_comp,
            'postponement'=>$postponement,
            'date_postponement'=>$date_postponement,
            'freezing'=>$frezing,
            'date_freezing'=>$date_frez,
            'date_resume'=>$date_resume,
            'extension'=>$extension,
            'date_extension'=>$date_ext,
            'month_extension'=>$period_ext,
            'regist_fees'=>$regist_fees,
            'regist_amount'=>$regist_fee_amount,
            'regist_receipt_no'=>$regist_receiptno,
            'studentship_fees'=>$studentship_fees,
            'studentship_amount'=>$studentship_amount,
            'studentship_receipt_no'=>$studentship_receiptno
        );
        $res=$this->db->get_where('tb_studentReg',array('regist_name'=>  $this->session->userdata('userid')));
        if($res->num_rows()===1){
            $this->db->update('tb_studentReg',$reg_data);
        }else{
            $this->db->insert('tb_studentReg',$reg_data);
        }
    }
    }

