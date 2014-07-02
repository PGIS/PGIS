<div>
    <div class="well well-sm">Student Information</div>
    <?php
    $res=$this->db->select('*')->from('tb_examiner_desert')->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID')
            ->where(array('pr_id'=>$st))->get();
     foreach ($res->result() as $row){
    ?>
    <div class="alert-info">
        <table class="table">
            <tr><td>Dissertation Title: <?php echo $row->project_title;?></td></tr>
            <tr><td>Internal Supervisor: <?php echo $row->Internal_supervisor;?></td></tr>
            <tr><td>Internal Examiner: <?php echo $row->internal_examiner;?></td></tr>
            <tr><td>Second Internal Supervisor: <?php echo $row->sec_internal_supervisor;?></td></tr>
            <tr><td>External Examiner: <?php echo $row->external_examiner;?></td></tr>
            <tr><td></td></tr>
        </table>
    </div>
    <?php
     }?>
</div>

