<?php

/*
 * Model for submiting applicants application form.
 */

class Application_form extends CI_Model {

    var $userid;
    var $prog_name = '';
    var $prog_mode = '';
    var $college = '';
    var $academ_year= '';
    var $department='';
    //other applicant personla information


    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insert_first_details($de) {
        $year= date("Y");
        $this->userid = $this->session->userdata('userid');
        $this->prog_name = strtolower($_POST['course']);
        $this->prog_mode = $_POST['chkp'];
        $this->college = $_POST['college'];
        $this->academ_year=$year.'/'.$year+1;
        $this->department=  $de;
        $this->db->insert('tb_app_personal_info', $this);
    }

    function update_first($de) {
        $year= date("Y");
        $this->userid = $this->session->userdata('userid');
        $this->prog_name = strtolower($_POST['course']);
        $this->prog_mode = $_POST['chkp'];
        $this->college = $_POST['college'];
        $this->academ_year=$year.'/'.$year+1;
        $this->department= $de;
        $this->db->where('userid', $this->session->userdata('userid'));
        $this->db->update('tb_app_personal_info', $this);
    }
    
     
    function insert_other_info($datebirth) {
             
        $mydata = array
            (
            'surname' => $this->input->post('surname'),
            'other_name' => $this->input->post('other_name'),
            'cob' => strtolower($this->input->post('coun_birth')),
            'nationality' => strtolower($this->input->post('nation')),
            'disability' => $this->input->post('disab'),
            'dob' =>   $datebirth,
            'mobile_no' => $this->input->post('mobile'),
            'landline_no' => $this->input->post('landline'),
            'fax_no' => $this->input->post('fax'),
            'parm_address' => $this->input->post('perm_address'),
            'title' => $this->input->post('title'),
            'email' => $this->input->post('email'),
            'disab_nature' => $this->input->post('disab_nature')
        );
        
        $this->db->where('userid', $this->session->userdata('userid'));
        $this->db->update('tb_app_personal_info', $mydata);
    }

    function insert_hist_info() {

        $mydata1 = array
            (
            'app_id' => $this->session->userdata('userid'),
            'dof' => $this->input->post('from'),
            'dot' => $this->input->post('to'),
            'nature_of_work' => $this->input->post('responsbility'),
            'comp_employed' => $this->input->post('current_employer'),
            'position' => $this->input->post('position'),
            'comp_release_agre' => $this->input->post('empp')
        );
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $this->session->userdata('userid')));

        if ($query->num_rows() == 1) {
            $this->db->where('app_id', $this->session->userdata('userid'));
            $this->db->update('tb_app_prev_info', $mydata1);
        } else {
            $this->db->insert('tb_app_prev_info', $mydata1);
        }
    }

    function insert_acca_info() {
        $mydata1 = array
            (
            'app_id' => $this->session->userdata('userid'),
            'specialization' => $this->input->post('specialization'),
            'gpa' => $this->input->post('gpa'),
            'high_edu_attained' => $this->input->post('high_acade'),
            'institution' => $this->input->post('institution'),
            'year_of_gradu' => $this->input->post('graduation'),
            'other_qualification' => $this->input->post('other_ac_prof'),
        );
        $query = $this->db->get_where('tb_app_prev_info', array('app_id' => $this->session->userdata('userid')));
        if ($query->num_rows() == 1) {
            $this->db->where('app_id', $this->session->userdata('userid'));
            $this->db->update('tb_app_prev_info', $mydata1);
        } else {
            $this->db->insert('tb_app_prev_info', $mydata1);
        }
    }

    function insert_referee_sponsor_details() {

        $redata = array(
            'referee_id' => $this->session->userdata('userid'),
            'first_refname' => $this->input->post('nm'),
            'first_email' => $this->input->post('em'),
            'first_address' => $this->input->post('ad'),
            'second_refname' => $this->input->post('nm1'),
            'second_email' => $this->input->post('em1'),
            'second_address' => $this->input->post('ad1'),
            'Third_refname' => $this->input->post('nm2'),
            'third_email' => $this->input->post('em2'),
            'third_address' => $this->input->post('ad2')
        );
        
            $query = $this->db->get_where('tb_referee', array('referee_id' => $this->session->userdata('userid')));
            if ($query->num_rows() == 1) {
                $this->db->where('referee_id', $this->session->userdata('userid'));
                $this->db->update('tb_referee', $redata);
            } elseif ($query->num_rows() == 0) {
                $this->db->insert('tb_referee', $redata);
            }
        
    }

    function insert_addition() {
        $redata = array(
            'referee_id' => $this->session->userdata('userid'),
            'sponser_name' => $this->input->post('namsponsor'),
            'sponser_address' => $this->input->post('addr_spons'),
            'sponsership_mode' => $this->input->post('chbx1'),
            'fio_rospectus' => $this->input->post('fprospec'),
            'fi_education_trade' => $this->input->post('feduca'),
            'fi_www' => $this->input->post('fwww'),
            'fi_newspaper' => $this->input->post('fjournal'),
            'fi_university' => $this->input->post('funiver'),
            'fi_other' => $this->input->post('fother')
        );
        $query = $this->db->get_where('tb_referee', array('referee_id' => $this->session->userdata('userid')));
        if ($query->num_rows() == 1) {
            $this->db->where('referee_id', $this->session->userdata('userid'));
            $this->db->update('tb_referee', $redata);
        } elseif ($query->num_rows() == 0) {
            $this->db->insert('tb_referee', $redata);
        }
    }

    function submiting() {
        $this->submited = "yes";
        $this->db->where('userid', $this->session->userdata('userid'));
        $this->db->update('tb_app_personal_info', $this);
    }

    public function referee_docs($sn, $referee, $intellectual, $thinking, $maturity, $language, $ability) {
        $ref = array(
            'referee_id' => $sn,
            'referee_name' => $referee,
            'intellectual_ability' => $intellectual,
            'thinking_capacity' => $thinking,
            'maturity' => $maturity,
            'english_proficiency' => $language,
            'ability_work' => $ability
        );
        $res = $this->db->get_where('tb_referee_doc', array('referee_name' => $referee));
        if ($res->num_rows() > 0) {
            $this->db->where('referee_name', $referee);
            $this->db->update('tb_referee_doc', $ref);
        } else {
            $this->db->insert('tb_referee_doc', $ref);
        }
    }
    function referee_next($sn,$ref_email,$comment,$recommendation,$weekness,$capability){
        $data_array=array(
            'referee_id'=>$sn,
            'referee_name'=>$ref_email,
            'comment'=>$comment,
            'recommendation'=>$recommendation,
            'app_weekness'=>$weekness,
            'app_capability'=>$capability,
            'status'=>'submitted'
        );
        $res=  $this->db->get_where('tb_referee_doc',array('referee_id'=>$sn,'referee_name'=>$ref_email));
        if($res->num_rows()===1){
            $this->db->where('referee_name',$ref_email);
            $this->db->update('tb_referee_doc',$data_array);
        }
    }
    function redirect_message() {
        $data = array(
            'submited' => 'yes',
        );
        $query = $this->db->get_where('tb_app_personal_info', array('submited' => 'yes', 'userid' => $this->session->userdata('userid')));
        $query1 = $this->db->get_where('tb_app_personal_info', array('userid' => $this->session->userdata('userid')));
        $query2 = $this->db->get_where('tb_app_prev_info', array('app_id' => $this->session->userdata('userid')));
        $query3 = $this->db->get_where('tb_referee', array('referee_id' => $this->session->userdata('userid')));

        if ($query->num_rows() == 1) {
            return 'submited';
        } elseif ($query1->num_rows() == 1) {
            return 'started';
        } elseif ($query2->num_rows() == 1) {
            return 'started';
        } elseif ($query3->num_rows() == 1) {
            return 'started';
        } else {
            return 'notstarted';
        }
    }

}
