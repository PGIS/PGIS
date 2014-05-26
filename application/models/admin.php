<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Model {

    private $tb_user = 'tb_user';

    function __construct() {
        parent::__construct();
        //$limit=4;
    }

    public function count_all() {
        return $this->db->count_all($this->tb_user);
    }

    public function list_all() {
        $query = $this->db->query("select * from tb_user");
        return $query->result();
    }

    public function get_paged_list() {
        $this->db->order_by('id', 'asc');
       $list = $this->db->get_where('tb_user', array('designation' => 'applicant'));
        return $list;
    }

    public function save() {
        $person = array(
            'userid' => $this->input->post('userid'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'password' => md5($this->input->post('password')),
            'designation' => $this->input->post('designation'),
            'email' => $this->input->post('email'),
            'enable' => '1'
        );
        $this->db->insert('tb_user', $person);
    }

    public function quit($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

    function addprogramme() {
        $coursename = $this->input->post('coursename');
        $programme = array(
            'programme_name' => $coursename,
            'programme_college' => $this->input->post('foundcollage'),
            'department' => $this->input->post('department'),
            'progr_duration' => $this->input->post('durati'),
            'tz_fee' => $this->input->post('normfee'),
            'non_tz_fee' => $this->input->post('forefee')
        );
        $mquery = $this->db->get_where('tb_programmes', array('programme_name' => $coursename));
        if ($mquery->num_rows() > 0) {
            $this->db->where('programme_name', $coursename);
            $this->db->update('tb_programmes', $programme);
        } else {
            $this->db->insert('tb_programmes', $programme);
        }
    }

    function pgdelete($id) {
        $this->db->where('prog_id', $id);
        $this->db->delete('tb_programmes');
    }
    
    function saveventpost(){
         $event = array(
            'name' => $this->input->post('eventname'),
            'description' => $this->input->post('descrip'),
            'date' => $this->input->post('evedate'),
            'venue' => $this->input->post('venue')
        );
         $this->db->insert('tb_alumni_events', $event);
    }
    function course1($course_code,$seminar_day,$morning_hour,$afternoon_hour,$evening_hour,$venue,$limit){
         $data_array=array(
                 'course'=>$course_code,
                 'seminar_day'=>$seminar_day,
                 'semina_venue'=>$venue,
                 'morning_hour'=>$morning_hour,
                 'afternoon_hour'=>$afternoon_hour,
                 'evening_hour'=>$evening_hour,
                 'max_number'=>$limit
                 );
         $res=  $this->db->get_where('tb_seminar',array('course'=>$course_code));
         if($res->num_rows()===1){
             $this->db->where('course',$course_code);
             $this->db->update('tb_seminar',$data_array);
         }else{
             $this->db->insert('tb_seminar',$data_array);
         }
    }
     function addUserFromExcel($data,$name){
        $list = $this->db->get_where('tb_staff', array('#number' => $name));
        if($list->num_rows()>0){
           $this->db->where('#number', $name);
            $this->db->update('tb_staff', $data); 
        }else{
            $this->db->insert('tb_staff', $data);    
        }
        
    }
    function courseaddz($prog_name,$course_name,$course_code){
         $data_ray=array(
                 'prog_name'=>$prog_name,
                 'course_name'=>$course_name,
                 'course_code'=>$course_code
             );
         $res=  $this->db->get_where('tb_course',array('prog_name'=>$prog_name,'course_code'=>$course_code));
         if($res->num_rows()===1){
             $this->db->where('course_code',$course_code);
             $this->db->update('tb_course',$data_ray);
         }  else {
             $this->db->insert('tb_course',$data_ray);
         }
    }
}
