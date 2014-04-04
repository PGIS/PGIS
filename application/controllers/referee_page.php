<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Referee_page extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
         $this->load->library('form_validation');
     }
     public function index(){
     $this->load->view('application/referee_docu'); 
     }
    public function referee_doc(){
    if(isset($_POST['sb'])){
    $this->form_validation->set_rules('addcoment','Addition comment','required');
    if($this->form_validation->run()===FALSE){
    $this->load->view('application/referee_docu');
    }else{
        $this->load->model('application_form');
        $sn=  $this->input->post('app_id');
        $referee=  $this->input->post('referee_id');
        $intellectual=  $this->input->post('edit');
        $thinking=  $this->input->post('edit1');
        $maturity=  $this->input->post('edit2');
        $language=  $this->input->post('edit3');
        $ability=  $this->input->post('edit4');
        $comment=  $this->input->post('addcoment');
        $result=  "select * from tb_referee where referee_id='$sn'";
        $res=$this->db->query($result);
        if($res->num_rows()===1){
        $this->application_form->referee_doc($sn,$referee,$intellectual,$thinking,$maturity,$language,$ability,$comment);
        $data['smg']='<font>Dear '.' <b>'.ucfirst(strtolower(addslashes($referee))).'</b> Thanks for your coorparation.!</font>';
        $this->load->view('application/referee_docu',$data);
        }  else {
        $data['smg1']='<font>Dear '.' <b>'.ucfirst(strtolower(addslashes($referee))).'</b> That applicant does not exists to our records please check caerfully and try again.!</font>';
        $this->load->view('application/referee_docu',$data);
        }
    }  
    }elseif (isset($_POST['sb1'])) {
        if($this->form_validation->run()===FALSE){
    $this->load->view('application/referee_docu');
    }else{
        $this->load->model('application_form');
        $sn=  $this->input->post('app_id');
        $referee=  $this->input->post('referee_id');
        $intellectual=  $this->input->post('edit');
        $thinking=  $this->input->post('edit1');
        $maturity=  $this->input->post('edit2');
        $language=  $this->input->post('edit3');
        $ability=  $this->input->post('edit4');
        $comment=  $this->input->post('addcoment');
        $result=  "select * from tb_referee where referee_id='$sn'";
        $res=$this->db->query($result);
        if($res->num_rows()===1){
        $this->application_form->referee_doc($sn,$referee,$intellectual,$thinking,$maturity,$language,$ability,$comment);
        $this->quit();
        }  else {
        $data['smg1']='<font>Dear '.' <b>'.ucfirst(strtolower(addslashes($referee))).'</b> That applicant does not exists to our records please check caerfully and try again.!</font>';
        $this->load->view('application/referee_docu',$data);
        }
    }
    }
}
public function quit(){
     echo '<p align="center" style="padding-top:40px;"><b class="alert alert-info">Bye you have done your task.!</b></p>';
}
function pdf(){
    $this->load->helper('dompdf','file');
    $data="You are here plse stay calm";
    pdf_create($data);
}
 }

