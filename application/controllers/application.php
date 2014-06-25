<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'url', 'directory','file'));
        $this->load->library(array('form_validation', 'session'));
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        if (!$this->session->userdata('logged_in')) {
            redirect('logout');
        } elseif ($this->session->userdata('user_role') != 'applicant') {
            redirect('logout');
        }
    }

    function index() {
        $this->load->model('Application_form');

        if (Application_form::redirect_message() == 'submited') {
            $data['lisubmited'] = FALSE;
            $this->load->view('application/submitmsg', $data);
        } elseif (Application_form::redirect_message() == 'started') {
            $this->load->view('application/startsmg');
        } else {
            $this->load->view('application/welcomemsg');
        }
    }

    function apply() {

        $this->load->model('Application_form');
        if (Application_form::redirect_message() == 'submited') {
            $data['lisubmited'] = FALSE;
            redirect('application');
        }
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active1'] = TRUE;

        $this->form_validation->set_rules('course', 'course', 'required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('college', 'The college', 'required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('chkp', 'Program mode', 'required');
        if (isset($_POST['chkp'])) {
            if ($_POST['chkp'] == 'other') {
                $this->form_validation->set_rules('checktext', 'Specify program mode', 'required');
            }
        }
        $this->form_validation->run();

        if (isset($_POST['save'])) {

            $query = $this->db->get_where('tb_app_personal_info', array('userid' => $this->session->userdata('userid')));

            if ($query->num_rows() == 1) {
                $this->load->model('Application_form');
                Application_form::update_first($this->mydepartment($_POST['course']));
                $this->load->view('application/capplication', $data);
            } else {
                $this->load->model('Application_form');
                Application_form::insert_first_details($this->mydepartment($_POST['course']));
                $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['savcont'])) {
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('application/capplication', $data);
            } else {

                $data['active2'] = TRUE;
                unset($data['active1']);
                $query = $this->db->get_where('tb_app_personal_info', array('userid' => $this->session->userdata('userid')));

                if ($query->num_rows() == 1) {
                    $this->load->model('Application_form');
                    Application_form::update_first($this->mydepartment($_POST['course']));
                    $this->load->view('application/capplication', $data);
                } else {
                    $this->load->model('Application_form');
                    Application_form::insert_first_details($this->mydepartment($_POST['course']));
                    $this->load->view('application/capplication', $data);
                }
            }
        } else {

            $this->load->view('application/capplication', $data);
        }
    }
    
    function mydepartment($pr){
            $upqury = $this->db->get_where('tb_programmes', array('programme_name' => strtolower($pr)), 1); 
          if($upqury->num_rows() == 1){
                foreach ($upqury->result() as $n){
                   $edata =$n->department;
                   return strtolower($edata);
                }
            }  else {
                return '';
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
                    'prog_mod' => $row->prog_mode,
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
            } unset($row);
            return $value;
        } else {
            $value = array(
                'Ucollege' => '',
                'Ucourse' => '',
                'prog_mod' => '',
                'sname' => '',
                'other_nam' => '',
                'title' => '',
                'datebirth' => '',
                'country' => '',
                'nationalt' => '',
                'perm_addres' => '',
                'disab_natur' => '',
                'disability' => '',
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

    function applifinan_data() {
        $aquery = $this->db->get_where('tb_finance_application', array('userid' => $this->session->userdata('userid')));
        if ($aquery->num_rows() == 1) {
            foreach ($aquery->result() as $mro) {
                $myvalue = array(
                    'receptno' => $mro->recept_no,
                    'paydate' => $mro->payment_date
                );
            }
            return $myvalue;
        } else {
            $myvalue = array(
                'receptno' => '',
                'paydate' => ''
            );
            return $myvalue;
        }
    }

    function referee_spon_data() {
        $id = $this->session->userdata('userid');
        $query = $this->db->get_where('tb_referee', array('referee_id' => $id));
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $ro) {
                $value2 = array(
                    'fi_refname' => $ro->first_refname,
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

        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active2'] = TRUE;

        $this->form_validation->set_rules('surname', 'surname', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('other_name', 'Other name', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('title', 'title', 'required|max_length[10]|xss_clean');
        $this->form_validation->set_rules('datebirth', 'birth date', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('disab', 'disable', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('perm_address', 'Permanet Address', 'required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('landline', 'landline', 'trim|exact_length[10]|numeric|xss_clean|callback_landline_check');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|exact_length[10]|numeric|xss_clean');
        $this->form_validation->set_rules('fax', 'fax', 'min_length[14]|max_length[16]|alpha_dash|xss_clean|callback_fax_check');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[40]|valid_email|xss_clean');
        $this->form_validation->set_rules('coun_birth', 'country', 'required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nation', 'nationality', 'required|max_length[40]|xss_clean');
        $this->form_validation->run();

        if (isset($_POST['savcont'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('application/capplication', $data);
            } else {

                $data['active3'] = TRUE;
                unset($data['active2']);
                $this->load->model('Application_form');
                Application_form::insert_other_info();
                $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['save'])) {
            if($this->form_validation->run() == FALSE){
              $this->load->view('application/capplication', $data);  
            }  else {
            $this->load->model('Application_form');
            Application_form::insert_other_info();
            $this->load->view('application/capplication', $data);
            }
        } elseif(isset($_POST['back'])){
            $data['active1'] = TRUE;
            unset($data['active2']);
            $this->load->view('application/capplication', $data);
        }else {
            $this->load->view('application/capplication', $data);
        }
    }
    function landline_check($str){
        if($str){
           $this->form_validation->set_message('landline_check'); 
            return FALSE;
        }  else {
            return TRUE;
        }
    }
    function fax_check($length){
        if($length){
            $this->form_validation->set_message('fax_check');
            return FALSE;
        }  else {
            return TRUE; 
        }
    }
         function employement() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active3'] = TRUE;


        if (isset($_POST['skip'])) {
            $data['active4'] = TRUE;
            unset($data['active3']);
            $this->load->view('application/capplication', $data);
        } elseif (isset($_POST['save'])) {

            $this->form_validation->set_rules('current_employer', 'Employer', 'required|max_length[80]|xss_clean');
            $this->form_validation->set_rules('responsbility', 'responsbility', 'required|max_length[255]|xss_clean');
            $this->form_validation->set_rules('position', 'position', 'required|max_length[255]|xss_clean');
            $this->form_validation->set_rules('to', 'To', 'required|max_length[20]|xss_clean');
            $this->form_validation->set_rules('from', 'From', 'required|max_length[20]|xss_clean');
            $this->form_validation->run();
             if($this->form_validation->run()===FALSE){
                 $this->load->view('application/capplication', $data);
             }else{
            $this->load->model('Application_form');
            Application_form::insert_hist_info();
            $this->load->view('application/capplication', $data);
             }
        } elseif (isset($_POST['back'])){
            $data['active2'] = TRUE;
            unset($data['active3']);
            $this->load->view('application/capplication', $data);
        }
        else {
            $this->load->view('application/capplication', $data);
        }
    }

    function accademic() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active4'] = TRUE;

        $this->form_validation->set_rules('high_acade', 'accademic', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('institution', 'institution', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('graduation', 'graduation', 'required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('specialization', 'specialization', 'required|max_length[40]|xss_clean');
        $this->form_validation->set_rules('gpa', 'GPA', 'required|exact_length[3]|numeric|xss_clean');
        $this->form_validation->set_rules('other_ac_prof', 'other Accademic Proffession', 'required|max_length[80]|xss_clean');
        $this->form_validation->run();

        if (isset($_POST['savcont'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('application/capplication', $data);
            } else {

                $data['active5'] = TRUE;
                unset($data['active4']);
                $this->load->model('Application_form');
                Application_form::insert_acca_info();
                $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['save'])) {
            if($this->form_validation->run()===FALSE){
               $this->load->view('application/capplication', $data); 
            }else{
            $this->load->model('Application_form');
            Application_form::insert_acca_info();
            $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['back'])) {
                $data['active3'] = TRUE;
                unset($data['active4']);
            $this->load->view('application/capplication', $data);
        } else {
            $this->load->view('application/capplication', $data);
        }
    }

    function referee_info() {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host'=> 'ssl://smtp.gmail.com',
            'smtp_port'=> 465,
            'mailtype' => 'html',
            'smtp_user'=> 'tuzoengelbert@gmail.com',
            'smtp_pass'=> 'ngelageze',
            'charset' => 'iso-8859-1'
        );
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active5'] = TRUE;

        $this->form_validation->set_rules('nm', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nm1', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('nm2', 'Name', 'trim|required|max_length[80]|xss_clean');
        $this->form_validation->set_rules('em', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('em1', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('em2', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('ad', 'Address', 'trim|required|exact_length[10]|numeric|xss_clean');
        $this->form_validation->set_rules('ad1', 'Address', 'trim|required|exact_length[10]|numeric|xss_clean');
        $this->form_validation->set_rules('ad2', 'Address', 'trim|required|exact_length[10]|numeric|xss_clean');
        $this->form_validation->run();
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('pgis@gmail.com', 'PGIS TEAM');
        if (isset($_POST['save'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('application/capplication', $data);
            } else {
        $das=array(set_value('em'), set_value('em1'),  set_value('em2'));
        foreach ($das as $salt){
        $this->email->to($salt);
        $this->email->subject('NOTIFICATION SMS');
        $message = '<html>
                      <head><title></title></head>
                      <body>';
        $message .='<p> Dear '.$salt.' your have been chosen to be on behalf of the  ' . $this->session->userdata('userid') . ' as the referee </p>';
        $message .='<p> Please follow this link to finish your tasks <strong><a href="'.base_url().'index.php/referee_page/referee_form/'.$this->session->userdata('userid').'/'.$salt.'"> click here..!</a></strong></p>';
        $message .='<p> Please find the the attached file for more description</p>';
        $message .='<p> Thanks !!</p>';
        $message .='<p> PGIS TEAM</p>';
        $message .='</body>';
        $message .='</html>';
        $this->email->message($message);
        }
        $path = $this->config->item('server_root');
        $file = $path . './attachments/refereeinfo.txt';
        $this->email->attach($file);
                    
                if (@$this->email->send()) {
                    $this->load->model('Application_form');
                    Application_form::insert_referee_sponsor_details();
                    $yes['smg'] = '<font color=blue>They Email addresses has been sent to their email acount.</font>';
                    $this->load->view('application/capplication', $data, $yes);
                } else {
                    $data['problem'] = 'There is Conectivity problem.Please check the connection and try again letter';
                    $this->load->view('application/capplication', $data);
                }
            }
        } elseif (isset($_POST['savcont'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('application/capplication', $data);
            } else {
        $das=array(set_value('em'), set_value('em1'),  set_value('em2'));
        foreach ($das as $salt){
        $this->email->to($salt);
        $this->email->subject('NOTIFICATION SMS');
        $message = '<html>
                      <head><title></title></head>
                      <body>';
        $message .='<p> Dear '.$salt.' your have been chosen to be on behalf of the  ' . $this->session->userdata('userid') . ' as the referee </p>';
        $message .='<p> Please follow this link to finish your tasks <strong><a href="'.base_url().'index.php/referee_page/referee_form/'.$this->session->userdata('userid').'/'.$salt.'"> click here..!</a></strong></p>';
        $message .='<p> Please find the the attached file for more description</p>';
        $message .='<p> Thanks !!</p>';
        $message .='<p> PGIS TEAM</p>';
        $message .='</body>';
        $message .='</html>';
        $this->email->message($message);
        }
        $path = $this->config->item('server_root');
        $file = $path . './attachments/refereeinfo.txt';
        $this->email->attach($file);
                if (@$this->email->send()) {
                    $data['active6'] = TRUE;
                    unset($data['active5']);
                    $this->load->model('Application_form');
                    Application_form::insert_referee_sponsor_details();
                    $yes['smg'] = '<font color=blue>They Email addresses has been sent to their email acount.</font>';
                    $this->load->view('application/capplication', $data, $yes);
                } else {
                    $data['problem'] = 'There is Conectivity problem.Please check the connection and try again letter';
                    $this->load->view('application/capplication', $data);
                }
            }
        } elseif(isset ($_POST['back'])) {
                    $data['active4'] = TRUE;
                    unset($data['active5']);
            $this->load->view('application/capplication', $data);
        }
        else {
            $this->load->view('application/capplication', $data);
        }
    }

    function addition() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active6'] = TRUE;

        $this->form_validation->set_rules('namsponsor', 'Sponsor name', 'required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('addr_spons', 'Sponsor adress', 'required|max_length[30]xss_clean|');
        $this->form_validation->run();
        if (isset($_POST['savcont'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('application/capplication', $data);
            } else {
                $data['active7'] = TRUE;
                unset($data['active6']);
                $this->load->model('Application_form');
                Application_form::insert_addition();
                $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['save'])) {
            if($this->form_validation->run()===FALSE){
             $this->load->view('application/capplication', $data);   
            }else{
            $this->load->model('Application_form');
            Application_form::insert_addition();
            $this->load->view('application/capplication', $data);
            }
        } elseif (isset($_POST['back'])){
                $data['active5'] = TRUE;
                unset($data['active6']);
            $this->load->view('application/capplication', $data);
        } else {
            $this->load->view('application/capplication', $data);
        }
    }

    function do_upload() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(isset($_POST['save'])){
                $data['active8'] = TRUE;
                unset($data['active7']);
                $this->load->view('application/capplication', $data);
        }elseif (isset($_POST['back'])){
                $data['active6'] = TRUE;
                unset($data['active7']);
            $this->load->view('application/capplication', $data);
        }elseif(!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload1() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error1'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
         } else {
            $data['upload_data1'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload2() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error2'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data2'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload3() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error3'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data3'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload4() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error4'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data4'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload5() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error5'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data5'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }
    function do_upload6() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active7'] = TRUE;
        if (!is_dir('uploads/' . $this->session->userdata('userid'))) {
            mkdir('./uploads/' . $this->session->userdata('userid'), 0777, TRUE);
        }

        $config['upload_path'] = './uploads/' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()) {
            $data['error6'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $data['upload_data6'] = "Uploading was successful";
            $this->load->view('application/capplication', $data);
        }
    }

    function delete($name) {
        $data1 = $this->show_User_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3;
        $data['active7'] = TRUE;

        $fileplace = './uploads/' . $this->session->userdata('userid') . '/' . $name;

        if (file_exists("$fileplace")) {
            $DIRNAME = './uploads/' . $this->session->userdata('userid');
            unlink($DIRNAME . DIRECTORY_SEPARATOR . $name);
            $this->load->view('application/capplication', $data);
        } else {
            $this->load->view('application/capplication', $data);
        }
    }

    function details_preview() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $this->load->view('application/details', $data);
    }

    function submitting() {
        $data1 = $this->show_User_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3;
        $this->load->model('Application_form');
        Application_form::submiting();
        $data['submit'] = 'Your Application has been submitted and the '
                . 'admision process will start soon.please visit your accout regulary to check for '
                . 'admision progress';
        $this->load->view('application/capplication', $data);
    }

    function applifinance() {
        $data1 = $this->show_User_data();
        $data4 = $this->applifinan_data();
        $data2 = $this->show_user_history();
        $data3 = $this->referee_spon_data();
        $data = $data2 + $data1 + $data3 + $data4;
        $data['active8'] = TRUE;

        $this->form_validation->set_rules('receptno', 'Recept number', 'trim|required|exact_length[20]|xss_clean');
        $this->form_validation->set_rules('paydate', 'Payment date', 'required|max_length[20]xss_clean|');
        $this->form_validation->run();

        $config['upload_path'] = './upload_docs/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if(isset($_POST['save'])){
          if (!$this->upload->do_upload() || $this->form_validation->run() == FALSE) {
            $data['uperror'] = $this->upload->display_errors();
            $this->load->view('application/capplication', $data);
        } else {
            $filename = base_url() . 'upload_docs/' . pg_escape_string($_FILES['userfile']['name']);
            
            $this->load->model('Finance_model');
            Finance_model::application_fee($filename);

            $this->load->view('application/capplication', $data);
        }  
        }elseif(isset($_POST['back'])){
             $data['active7'] = TRUE;
             unset($data['active8']);
            $this->load->view('application/capplication', $data); 
        }else{
          $this->load->view('application/capplication', $data);  
        }
        
    }

    function fulladmision() {
        $this->load->model('Admision_model');
        Admision_model::fulladmsion();
        $s_data = array('user_role' => 'Student');
        $this->session->set_userdata($s_data);
        redirect('student/firstin');
    }
    function courses($coll){
      $course= str_replace('%20', ' ',$coll);
      $tquery = $this->db->get_where('tb_programmes', array('programme_college' => $course));
      if($tquery->num_rows()>0){
          foreach ($tquery->result() as $courlist) {
              echo '<option>'.$courlist->programme_name.'</option>';
          }
      }
    }

}
