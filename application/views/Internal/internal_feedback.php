<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <p class="text text-info">Students to be graded</p>
    </div>
    <div class="col-lg-11">
        <table class="table table-hover table-striped" id="pagez">
            <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DISSERTATION TITLE</th><th>ACTION<b class="caret"></b></th></tr></thead> 
            <tbody>
                <?php
                $this->db->select('*');
                $this->db->from('tb_int_feedback');
                $this->db->join('tb_examiner_desert','tb_examiner_desert.registrationID = tb_int_feedback.registration_fedId');
                $this->db->where(array('internal_examiner'=>$this->session->userdata('email'),'statud'=>'yes'));
                $res=$this->db->get();
                if($res->num_rows()>0){
                    $rows=$res->row();
                if(isset($given)){
                    foreach ($given->result() as $row){
                        echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td><td><button class="btn btn-warning btn-xs" title="Click to Edit"><span class="glyphicon glyphicon-comment"></span> Feedback sent</button></td></tr>';
                    }
                }
                }  else {
                  if(isset($given)){
                    foreach ($given->result() as $row){
                        echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td><td>'.anchor('internal/inputFeedback/'.$row->id,'<button class="btn btn-success btn-xs">feedback</button>').'</td></tr>';
                    }
                }  
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once 'footer.php';?>