<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of admision
 *
 * @author emanoble
 */
class Admision extends CI_Controller{
    private $limit=10,$offset=0;
    
    function __construct() {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->load->helper(array('form','html','url','array','string','directory'));
        $this->load->library(array('form_validation','session','javascript','pagination'));
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='Admision staff') {
             redirect('logout');
        }
    }
    
    function index($offset=0){
        
        $dat = array( 'submited'=>'yes');
        $dat1 = array( 'appl_status'=>''); 
        $this->db->where($dat1);
        $this->db->order_by('app_id','asc');
        
        $query1 = $this->db->get_where('tb_app_personal_info', $dat,$this->limit, $offset);
        $data['query']=$query1->result();
        $this->creating_pagination();
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Admision/admision',$data);
     
    }
    
    function applicant_details($userid){
            
        $data =  $data=$this->appl_detils($userid) +$this->edu($userid)+$this->additional_data($userid);
        $this->load->view('Admision/applicant_detail',$data);
    }
    
    
    function edu($id) {
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $id));
   
            foreach ($query->result() as $ro) {
                $data2 = array(
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
                
            }return $data2;
        }
        
       function additional_data($id) {
        $query = $this->db->get_where('tb_referee', array('referee_id' => $id));
        
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
        }     
        
        
        function  appl_detils($id){
         $query = $this->db->get_where('tb_app_personal_info', array('userid' =>$id));
         foreach ($query->result() as $row) {
                $dat = array(
                    'userid'=>$row->userid,
                    'Ucollege' => $row->college,
                    'Ucourse' => $row->prog_name,
                    'prog_mod'=>$row->prog_mode,
                    'sname' => $row->surname,
                    'other_nam' => $row->other_name,
                    'title' => $row->title,
                    'appid'=>$row->app_id,
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
           
        }return $dat;
        }
        
        
    function  admit($userid){
           
           $data=$this->appl_detils($userid);
           
           $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[80]|xss_clean');
           $this->form_validation->set_rules('to', 'Receiver', 'required|max_length[40]|xss_clean');
           $this->form_validation->set_rules('msgbody', 'Message body', 'required|xss_clean');
           $this->form_validation->run();
           
            if(isset($_POST['send'])){
                if($this->form_validation->run() == TRUE){
                  $this->load->model('messaging');
                  Messaging::add_message();
                  $data['sent']='Message sent';
                }
            }
          
        $z = $this->db->count_all('tb_admision')+10;
      
        if($this->count_digit($z)==2){
            $k='000'.$z;
        }elseif ($this->count_digit($z)==3) {
              $k='00'.$z;
        }
        elseif ($this->count_digit($z)==4) {
            $k='0'.$z;
        }elseif ($this->count_digit($z)==5) {
            $k=''.$z;
        }
        $data["reg"]= '2010-04-'.$k;
         $this->load->model('admision_model');
            Admision_model::admit($data['appid'],$data["reg"]);
            Admision_model::verify_form($userid);
        $this->load->view('Admision/verify_notifi',$data);
        
        }
        
        function count_digit($number) {
            return strlen((string) $number);
        }
      
        function creating_pagination(){
            
            $this->load->model('admision_model');
            $count= Admision_model::count_all();
            $config['base_url'] = site_url('admision/index');
            $config['total_rows'] = $count;
            $config['per_page'] = $this->limit; 
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config); 
  
        }
        
        function admitted_applicants($offset=0){
           $dat = array( 'appl_status'=>'yes');
           $query1 = $this->db->get_where('tb_app_personal_info', $dat,$this->limit, $offset);
           /*
            * creating pagination for the admited applicans
            */
            $this->load->model('admision_model');
            $count= Admision_model::count();
            $config['base_url'] = site_url('admision/admitted_applicants');
            $config['total_rows'] = $count;
            $config['per_page'] = $this->limit; 
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
           
           
           $data['query']=$query1->result();
           $this->load->view('Admision/admited_applicants',$data);
        }
        
        function pending($userid){
              $data=$this->appl_detils($userid);
             $data['userid']=$userid;
             $this->load->view('Admision/denied_appl_message',$data);
        }
        function creating_pdf($userid){
            
            $html = '<html>
				<head></head>
				<body>
					<center><h4>UNIVERSITY OF DAR ES SALAAM</h4></center>
                                        <center><h4>OFFICE OF THE DEPUTY VICE CHANCELLOR</h4></center>
                                        <center><h1>ACADEMIC</h1></center>
                                        <p>Dear congratulation for being addmitted to the University of Dar 
                                        collage of information and communicaation technlogy</p>
				</body>
				</html>
				';
		
		$pdf_filename  = $userid.'.pdf';
		$this->load->library('dompdf_lib');
                $this->dompdf_lib->convert_html_to_pdf($html,$userid,$pdf_filename, TRUE);
                 
        }
    }

