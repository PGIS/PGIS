<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Admin_page extends CI_Controller{
     private $limit=4;
     
        function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation');
         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('user_role')!='administrator') {
             redirect('logout');
        }
     }
     
    function index($offset=0) {
        $this->load->library('table');
        $this->load->library('pagination');
        $uri_segment=3;
        //$offset=$this->uri->segment('$uri_segment');
        $this->load->model('admin');
     // $data['results']= $this->admin->list_all();
        $data['results']= $this->admin->get_paged_list($this->limit,$offset)->result();
        $cofig['base_url']=  site_url('admin_page/index');
        $cofig['total_rows']=  $this->admin->count_all();
        $cofig['per_page']= $this->limit;
        $cofig['uri_segment']=$uri_segment;
        $this->pagination->initialize($cofig);
        $data['pagination']=$this->pagination->create_links();
        
        $this->load->view('admin/adminList',$data);
       // print_r($data);
    }
    function add(){
      $this->form_validation->set_rules('userid','username','trim|required|min_length[6]|max_length[12]|is_unique[tb_user.userid]|xss_clean');
      $this->form_validation->set_rules('fname','first name','trim|required|xss_clean');
      $this->form_validation->set_rules('mname','middle name','trim|required|xss_clean');
      $this->form_validation->set_rules('designation','designation','trim|required|xss_clean');
      $this->form_validation->set_rules('password','password','trim|required|xss_clean');
      if($this->form_validation->run()===FALSE){
          $this->load->view('admin/add_page');
      }  else {
          
              $this->load->model('admin');
              $this->admin->save();
              $data['add']='<font color=green>User successively added</font>';
              $this->load->view('admin/add_page',$data);
          }
    }
    function delete($id) {
     $this->load->model('admin');
     $this->admin->quit($id);
       
       $data['error_message']='<font color=blue>successively deleted</font>';
       redirect('admin_page',$data);
    }
    function search(){
        if(isset($_POST['sub'])){
        $search=trim($_POST['searchterm']);
         if($search){
        $query="select * from tb_user where fname LIKE '$search%'";
        $result=pg_query($query);
        $num=  pg_num_rows($result);
          if($num){
        echo "<table border=\"\">";
        while($row= pg_fetch_assoc($result)){
            echo "<tr>";
           echo "<td>".$row['id']."</td><td>".$row['fname']."</td><td>".$row['userid']."</td><td>".$row['designation']."</td>";
           echo "</tr>";
        }
        echo"</table>";
        }else{
       echo "not found";
    }
    }else{
 echo "put your search value";  
 }
 }
 }
 }

