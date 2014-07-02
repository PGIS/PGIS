<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <p>Details For: <?php echo $data;?></p>
    </div>
    <table class="table table-striped table-striped" id="tabz">
        <thead class="alert alert-success"><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>VIEW</th><th>ACTION</th></tr></thead>
        <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('tb_verdicts');
    $this->db->join('tb_examiner_desert','tb_examiner_desert.registrationID = tb_verdicts.registrationId');
    $this->db->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId');
    $this->db->where(array('registrationId'=>$data,'internal_examiner'=>$this->session->userdata('email')));
    $res=$this->db->get();
    if($res->num_rows()>0){
        foreach ($res->result() as $row){
            echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.' '.$row->other_name.'</td>'
                    . '<td>'.anchor('internal/viewVerdicts/'.$row->ver_id,'<button class="btn btn-info btn-xs">view feedback</button>').'</td>'
                    . '<td>'.anchor('internal/downloadpdf/'.$row->ver_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Download</button>').'</td></tr>';
        }
    }
    ?>
        </tbody>
    </table>
</div>
<?php include_once 'footer.php';?>