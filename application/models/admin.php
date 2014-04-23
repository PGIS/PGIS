<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Model{
    private $tb_user='tb_user';
            function __construct() {
        parent::__construct();
        //$limit=4;
    }
    public function count_all() {
        return $this->db->count_all($this->tb_user);
    }
    public function list_all() {
        $query=  $this->db->query("select * from tb_user");
        return $query->result();
    }
    public function get_paged_list() {
        $this->db->order_by('id','asc');
        return $this->db->get($this->tb_user); 
    }
    public function save(){
        $person=array(
                  'userid'=>$this->input->post('userid'),
                  'fname'=>  $this->input->post('fname'),
                  'mname'=>  $this->input->post('mname'),
                  'password'=> md5($this->input->post('password')),
                  'designation'=>  $this->input->post('designation'),
                  'email'=>  $this->input->post('email'),
                  'enable'=>'1'
              );
        $this->db->insert('tb_user',$person);
    }
    public function quit($id){
        $this->db->where('id',$id);
        $this->db->delete('tb_user');
    }
    function addprogramme(){
        $coursename=$this->input->post('coursename');
        $programme=array(
                  'programme_name'=>$coursename,
                  'programme_college'=>  $this->input->post('foundcollage'),
                  'department'=>  $this->input->post('department'),
                  'progr_duration'=> $this->input->post('durati'),
                  'tz_fee'=>  $this->input->post('normfee'),
                  'non_tz_fee'=>  $this->input->post('forefee')
              );
        $mquery = $this->db->get_where('tb_programmes', array('programme_name' => $coursename));
        if($mquery->num_rows()>0){
              $this->db->where('programme_name',$coursename);
              $this->db->update('tb_programmes', $programme); 
        }else{
            $this->db->insert('tb_programmes',$programme);
        }
    }
    function pgdelete($id){
        $this->db->where('prog_id',$id);
        $this->db->delete('tb_programmes');
    }
}

