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
     public function referee_form($sn,$ssn){
        $res= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$sn,'first_email'=>$ssn))->get();
        $res1= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$sn,'second_email'=>$ssn))->get();
        $res2= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$sn,'third_email'=>$ssn))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
            $this->load->view('application/referee_docu',$array);
        }elseif ($res1->num_rows()===1) {
           foreach ($res1->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
            $this->load->view('application/referee_docu',$array); 
        }elseif ($res2->num_rows()===1) {
          foreach ($res2->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
            $this->load->view('application/referee_docu',$array);  
        }  else {
            echo'<p class="alert alert-danger">No such email exist..</p>';
            
        }
     }

     public function referee_doc($applicant,$ssn){
        $res= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'first_email'=>$ssn))->get();
        $res1= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'second_email'=>$ssn))->get();
        $res2= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'third_email'=>$ssn))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
          }elseif ($res1->num_rows()===1) {
           foreach ($res1->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
             
        }elseif ($res2->num_rows()===1) {
          foreach ($res2->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$ssn;
             
    $this->form_validation->set_rules('edit','radio button','required');
    if($this->form_validation->run()===FALSE){
    $this->load->view('application/referee_docu',$array);
    }else{
        $this->load->model('application_form');
        $sn=  $applicant;
        $referee=  $ssn;
        $intellectual=  $this->input->post('edit');
        $thinking=  $this->input->post('edit1');
        $maturity=  $this->input->post('edit2');
        $language=  $this->input->post('edit3');
        $ability=  $this->input->post('edit4');
        $this->application_form->referee_docs($sn,$referee,$intellectual,$thinking,$maturity,$language,$ability);
        echo '<p class="alert alert-info">Thanks for your coorparation.!plz continue</p>';
    }  
 }
}
function next($applicant,$email_ref){
    $res= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'first_email'=>$email_ref))->get();
        $res1= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'second_email'=>$email_ref))->get();
        $res2= $this->db->select('*')->from('tb_referee')->join('tb_app_personal_info','tb_app_personal_info.userid = tb_referee.referee_id')
                ->where(array('referee_id'=>$applicant,'third_email'=>$email_ref))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$email_ref;
          }elseif ($res1->num_rows()===1) {
           foreach ($res1->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$email_ref;
             
        }elseif ($res2->num_rows()===1) {
          foreach ($res2->result() as $row){
                $array=array(
                    'applicant'=>$row->referee_id,
                    'surname'=>$row->surname,
                    'others'=>$row->other_name,
                    'college'=>$row->college,
                    'depertment'=>$row->prog_name
                    
                );
            } 
            unset($row);
            $array['ref']=$email_ref;
            $this->form_validation->set_rules('talents','Capability','trim|required|xss_clean');
            $this->form_validation->set_rules('recommendation','Recommendation','trim|required|xss_clean');
            $this->form_validation->set_rules('addcoment','Comment','trim|required|xss_clean');
            if($this->form_validation->run()===FALSE){
            $this->load->view('application/referee_docu',$array);
            }  else {
            $this->load->model('application_form');
            $sn=$applicant;
            $ref_email=$email_ref;
            $comment=  $this->input->post('addcoment');
            $recommendation=  $this->input->post('recommendation');
            $capability=  $this->input->post('talents');
            $weekness=  $this->input->post('weekness');
            $this->application_form->referee_next($sn,$ref_email,$comment,$recommendation,$weekness,$capability);
            echo '<p class="alert alert-success">inserted</p>';
    }
    
    }
}
function pdf(){
    $this->load->helper('dompdf','file');
    $data="You are here plse stay calm";
    pdf_create($data);
}
 }

