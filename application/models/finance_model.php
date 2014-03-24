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
    }

