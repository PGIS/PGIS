<?php

class User_admission_m extends CI_Model {

    private $tb_user = 'tb_user';

    function __construct() {
        parent::__construct();
    }

    public function get_students() {
        $students = $this->db->select('userid');

        $students = $this->db->get_where($this->tb_user, array('designation' => 'applicant'));
        $result = $students->result();

        return $result;
    }

}
