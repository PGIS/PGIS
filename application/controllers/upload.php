<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
    
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
             
             $this->load->view('application/capplication');
             
    }
function do_upload(){
                $data['active7'] = TRUE;
         if(!is_dir('uploads/'.$this->session->userdata('userid'))) {
            mkdir('./uploads/' .$this->session->userdata('userid'), 0777, TRUE);
           }
	   
		$config['upload_path'] = './uploads/'.$this->session->userdata('userid');
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '2048';
		$config['remove_spaces']  = TRUE;
                $config['overwrite'] = true;
		$this->load->library('upload', $config);
                 $this->upload->initialize($config);
        if(! $this->upload->do_upload()){
            $data = array('error' => $this->upload->display_errors());
            $this->load->view('application/capplication', $data);
        }
        else{
                $data['upload_data'] = "Uploading was successful";
                $this->load->view('application/capplication', $data);
        }
	}
function delete($name){
   $fileplace='./uploads/'.$this->session->userdata('userid').'/'.$name;
   
    if(file_exists("$fileplace")){
	$DIRNAME ='./uploads/'.$this->session->userdata('userid');
    unlink($DIRNAME.DIRECTORY_SEPARATOR.$name);
    $this->load->view('application/capplication');
    
      }else{
	$this->load->view('application/capplication');
      }
      
     }
}
