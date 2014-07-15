<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AdminAlumni extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'url', 'text'));
        $this->load->library(array('form_validation', 'email', 'table'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'administrator') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->view('admin/alumnievents');
    }

    function saveevent() {
        $this->form_validation->set_rules('eventname', 'Event name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('descrip', 'Descripton', 'trim|required|xss_clean');
        $this->form_validation->set_rules('venue', 'Venue', 'trim|required|xss_clean');
        $this->form_validation->set_rules('evedate', 'Event date', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/alumnievents');
        } else {
            if (isset($_POST['posevents'])) {
                $this->load->model('admin');
                Admin::saveventpost();
                $this->sendtoemail($this->input->post('eventname'),$this->input->post('descrip'));
                $data['posted'] = TRUE;
                $this->load->view('admin/alumnievents', $data);
            }
        }
    }
//sending email toall alumini
    function sendtoemail($subject,$message) {
        $address= $this->db->get('tb_alumni');
        if($address->num_rows()){
        foreach ($address->result() as $list){
            $this->email->clear();
            $this->email->set_newline("\r\n");
            $this->email->to($list->email);
            $this->email->bcc($list->email);
            $this->email->from('pgis@udsm.com');
            $this->email->subject($subject);
            $this->email->message($message);
            if(@$this->email->send()){
               echo 'No internet connection';
            }
            }
            
        }
    }
    function eventManage(){
        $this->load->view('admin/manageevent');
    }
    function eventDelete($id){
        $this->db->where('event_id', $id);
        $this->db->delete('tb_alumni_events');
        $data['remove']='Removed successfuly';
       
        $this->load->view('admin/manageevent',$data);
    }
    function alumniList(){
        $res=  $this->db->select('*')->from('tb_alumni')->join('tb_student','tb_student.registrationID = tb_alumni.registrationID')
                ->get();
        if($res->num_rows()>0){
            $data['alumn']=$res;
            $this->load->view('admin/alumniList',$data);
        }  else {
            $this->load->view('admin/alumniList');
        }
    }
}
