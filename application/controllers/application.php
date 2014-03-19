<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','html','url'));
        $this->load->library(array('form_validation','session'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='applicant') {
             redirect('logout');
        }
    }
    
    function index() {
        if (!$this->session->userdata('logged_in')) {

            redirect('logout');
        } else {
            
            $data1 = $this->show_User_data();
            $data2 = $this->show_user_history();
            $data3 = $this->referee_spon_data();
            $data = $data2 + $data1 + $data3;



            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('course', 'course', 'required|max_length[80]|xss_clean');
            $this->form_validation->set_rules('college', 'The college', 'required|max_length[80]|xss_clean');
            $this->form_validation->set_rules('chkp', 'Program mode', 'required');
            $this->form_validation->run();

            if ($this->form_validation->run() == TRUE) {
                $data['proceed1'] = TRUE;
            } else {
                $data['data'] = '';
            }

            if (isset($_POST['save'])) {
                
                   if(!is_dir('uploads/'.$this->session->userdata('userid'))) {
                mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);

                  }
                $query = $this->db->get_where('tb_app_personal_info', array('userid' => $this->session->userdata('userid')));

                if ($query->num_rows() == 1) {
                    $this->load->model('Application_form');
                    Application_form::update_first();
                    $this->load->view('application/capplication', $data);
                } else {
                    $this->load->model('Application_form');
                    Application_form::insert_first_details();
                    $this->load->view('application/capplication', $data);
                }
            } elseif (isset($_POST['proceed'])) {
                if(!is_dir('uploads/'.$this->session->userdata('userid'))) {
                mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);

                  }
                if ($this->form_validation->run() == FALSE) {

                    $this->load->view('application/capplication', $data);
                } else {
                    $data['proceed1'] = TRUE;
                    $data['active'] = 'active';
                    $query = $this->db->get_where('tb_app_personal_info', array('userid' => $this->session->userdata('userid')));

                    if ($query->num_rows() == 1) {
                        $this->load->model('Application_form');
                        Application_form::update_first();
                        $this->load->view('application/capplication', $data);
                    } else {
                        $this->load->model('Application_form');
                        Application_form::insert_first_details();
                        $this->load->view('application/capplication', $data);
                    }
                }
            } else {
                
                $this->load->view('application/capplication', $data);
            }
        }
    }

    /* Application module function
     * function to collect all user inputs 
     * which were stored in the database
     * this function particulary deals with tb_app_personal_info table
     */

    function show_User_data() {

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        }
        $id = $this->session->userdata('userid');
        $query = $this->db->get_where('tb_app_personal_info', array('userid' => $id));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $value = array(
                    'Ucollege' => $row->college,
                    'Ucourse' => $row->prog_name,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'datebirth' => $row->dob,
                    'country' => $row->cob,
                    'nationalt' => $row->nationality,
                    'perm_addres' => $row->parm_address,
                    'disab_natur' => $row->disab_nature,
                    'landlin' => $row->landline_no,
                    'mobil' => $row->mobile_no,
                    'fax' => $row->fax_no,
                    'email' => $row->email
                );
            } unset($row);
            return $value;
        } else {
            $value = array(
                'Ucollege' => '',
                'Ucourse' => '',
                'sname' => '',
                'other_nam' => '',
                'title' => '',
                'datebirth' => '',
                'country' => '',
                'nationalt' => '',
                'perm_addres' => '',
                'disab_natur' => '',
                'landlin' => '',
                'mobil' => '',
                'fax' => '',
                'email' => ''
            );
            return $value;
        }
    }

    /* Application module function
     * function to collect all user inputs 
     * which were stored in the database
     * this function particulary deals with tb_app_prev_info table
     */

    function show_user_history() {
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        }

        $id = $this->session->userdata('userid');
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $id));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $ro) {
                $value1 = array(
                    'specializ' => $ro->specialization,
                    'high_edu' => $ro->high_edu_attained,
                    'institut' => $ro->institution,
                    'gradu_year' => $ro->year_of_gradu,
                    'gpa' => $ro->gpa,
                    'other_qualification' => $ro->other_qualification,
                    'dof' => $ro->dof,
                    'dot' => $ro->dot,
                    'responsibility' => $ro->nature_of_work,
                    'employer' => $ro->comp_employed,
                    'release' => $ro->comp_release_agre,
                    'position' => $ro->position
                );
            }
            unset($ro);
            return $value1;
        } else {
            $value1 = array(
                'specializ' => '',
                'high_edu' => '',
                'institut' => '',
                'gradu_year' => '',
                'gpa' => '',
                'other_qualification' => '',
                'dof' => '',
                'dot' => '',
                'responsibility' => '',
                'employer' => '',
                'release' => '',
                'position' => ''
            );
            return $value1;
        }
    }

    /* Application module function
     * function to collect all user inputs 
     * which were stored in the database
     * this function particulary deals with tb_referee table
     */

    function referee_spon_data() {
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        }
        $id = $this->session->userdata('userid');
        $query = $this->db->get_where('tb_referee', array('referee_id' => $id));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $ro) {
                $value2 = array(
                    'fi_refname' => "$ro->first_refname",
                    'se_refname' => $ro->second_refname,
                    'thr_refname' => $ro->Third_refname,
                    'fi_refemail' => $ro->first_email,
                    'se_refemail' => $ro->second_email,
                    'thr_refemail' => $ro->third_email,
                    'spon_mode' => $ro->sponsership_mode,
                    'spon_name' => $ro->sponser_name,
                    'spon_addr' => $ro->sponser_address,
                    'fi_refaddr' => $ro->first_address,
                    'se_refaddr' => $ro->second_address,
                    'thr_refaddr' => $ro->third_address,
                    
                    'fprospec' => $ro->fio_rospectus,
                    'feduca' => $ro->fi_education_trade,
                    'fjournal' => $ro->fi_newspaper,
                    'fwww' => $ro->fi_www,
                    'funiver' => $ro->fi_university,
                    'fother' => $ro->fi_other 
                );
            }
            unset($ro);
            return $value2;
        } else {
            $value2 = array(
                'fi_refname' => '',
                'se_refname' => '',
                'thr_refname' => '',
                'fi_refemail' => '',
                'se_refemail' => '',
                'thr_refemail' => '',
                'spon_mode' => '',
                'spon_name' => '',
                'spon_addr' => '',
                'fi_refaddr' => '',
                'se_refaddr' => '',
                'thr_refaddr' => '',
                'fprospec' => '',
                 'feduca' => '',
                'fjournal' => '',
                'fwww' => '',
                'funiver' => '',
                'fother' => '' 
            );
            return $value2;
        }
    }

    /*
     * function fo the persoal information validation
     */

    function personal_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        }
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       
         $data1 = $this->show_User_data();
         $data2 = $this->show_user_history();
         $data3 = $this->referee_spon_data();
         $data = $data2 + $data1 + $data3;

        $this->form_validation->set_rules('surname', 'surname', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('other_name', 'Other name', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('title', 'title', 'required|max_length[10]|xss_clean');
        $this->form_validation->set_rules('datebirth', 'birth date', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('disab', 'disable', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('perm_address', 'Permanet Address', 'required|max_length[30]|xss_clean');
        //$this->form_validation->set_rules('disab_nature', 'disablity', 'required|max_length[100]|');
        $this->form_validation->set_rules('landline', 'landline', '|max_length[20]|xss_clean');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('fax', 'fax', '|max_length[20]|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('coun_birth', 'country', 'required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nation', 'nationality', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('high_acade', 'accademic', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('institution', 'institution', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('graduation', 'graduation', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('specialization', 'specialization', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('gpa', 'PGA', 'required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('other_ac_prof', 'other Accademic Proffession', 'required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('current_employer', 'Employer', '|max_length[80]|xss_clean');
        $this->form_validation->set_rules('responsbility', 'responsbility', '|max_length[255]|xss_clean');
        $this->form_validation->set_rules('to', 'To', '|max_length[20]|xss_clean');
        $this->form_validation->set_rules('from', 'From', '|max_length[20]|xss_clean');
        $this->form_validation->run();
        
         
         $data['proceed1'] = TRUE;
         
           if(isset($_POST['proceed2'])){
               if($this->form_validation->run() == FALSE){
                $this->load->view('application/capplication',$data);   
                  
               }else {
                   $data['proceed2'] = TRUE;
                   $data['active3'] = 'active';
                    $data['active'] = 'active';
                  $this->load->model('Application_form');
                  Application_form::insert_other_info();
                  Application_form::insert_hist_info();
                  $this->load->view('application/capplication',$data);
               }
               
           }elseif(isset($_POST['save'])){
                 $this->load->model('Application_form');
                 Application_form::insert_other_info();
                 Application_form::insert_hist_info();
                $this->load->view('application/capplication',$data);
            }else{
               $this->load->view('application/capplication',$data); 
            }
           }
 
 

    function referee_info() {
        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        }

         $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
            
        );
        $data1 = $this->show_User_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3;

       

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('nm', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nm1', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nm2', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('em', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('em1', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('em2', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('ad', 'Address', 'trim|required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('ad1', 'Address', 'trim|required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('ad2', 'Address', 'trim|required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('chbx1', 'Sponsorship', 'required');
        $this->form_validation->set_rules('namsponsor', 'Sponsor name', 'required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('addr_spons', 'Sponsor adress', 'required|max_length[30]xss_clean|');
        
        
        $this->form_validation->run();
        $data['active3'] = 'active';
        $data['proceed2'] = TRUE;
        $data['proceed1'] = TRUE;
        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('pgis@gmail.com','PGIS TEAM');
        $this->email->to(set_value('em'),set_value('em1'),set_value('em2'));
        $this->email->subject('NOTIFICATION SMS');
        $message='<html>
                      <head><title></title></head>
                      <body>';
        $message .='<p> Dear referee your are have been chosen to be on behalf of the  '.$this->session->userdata('userid'). ' as the referee </p>';
        $message .='<p> Please find the the attached file for more description</p>';
        $message .='<p> Thanks !!</p>';
        $message .='<p> PGIS TEAM</p>';
        $message .='</body>';
        $message .='</html>';
        $this->email->message($message);
        $path=  $this->config->item('server_root');
        $file= $path.'/PGIS/attachments/refereeinfo.txt';
        $this->email->attach($file);
        if(@$this->email->send()){
         if($this->form_validation->run() == TRUE){
        $data['submit']='submit';
        }
        $this->load->model('Application_form');
        Application_form::insert_referee_sponsor_details();
        $this->load->view('application/capplication', $data);
        }  else {
             $this->load->view('network_error');  
        }
    }
    function do_upload(){
   
        $data1 = $this->show_User_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3;
        $data['active0']='active';
        $data['active3'] = 'active';
        $data['proceed1']=TRUE;
       
        $config['upload_path'] = './uploads/'.$this->session->userdata('userid');
	$config['allowed_types'] = 'gif|jpg|png|pdf';
	$config['max_size'] = '1000';
        $config['overwrite'] = FALSE;
        
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
       
        if (!$this->upload->do_upload()){
	   $error = array('error' => $this->upload->display_errors());
           $data=$data+$error;
          $this->load->view('application/capplication', $data);
        }
        else{
            $data['success'] =' Your file was successfully uploaded!';
            $this->load->view('application/capplication', $data);
        }
	
        
    }
    
}
