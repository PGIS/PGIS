<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <?php
        $res=$this->db->select('*')->from('tb_examiner_desert')->join('tb_project','tb_project.registration_id = tb_examiner_desert.registrationID')
                ->join('tb_student','tb_student.registrationID = tb_project.registration_id')->where('pr_id',$feed)->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                echo '<div class="label-info"> Feedback For :  '.' '.$row->surname.'  '.$row->other_name.'  '.'('.$row->registrationID.')'.'</div>';
            }
        }
        ?>
    </div>
    <div class="col-lg-7 col-lg-offset-2">
<div class="panel panel-default">
<div class="panel-heading"><label>Examiner Feedback</label></div>
<div class="panel-body">
    <?php
    if(isset($success)){
        echo '<div class="alert fade in">'
        . '<a type="button" class="close" data-dismiss="alert">&timesb;</a>'
          . '<div>'.$success.'</div>'
         . '</div>';
    }
    ?>
    <?php echo form_open_multipart('internal/comment/'.$feed,array('id'=>'jay'));?>
        <table class="table table-condensed pull-left">
            <tr><td>Comments</td><td><?php echo form_error('com','<div class="error">','</div>');?><textarea  class="form-control" name="com"></textarea></td></tr>
            <tr><td>Conclusion</td><td><?php echo form_error('desc','<div class="error">','</div>');?><input type="text" class="form-control" cols="3" name="desc"></td></tr>
            <tr><td>Date</td><td><?php echo form_error('dtz','<div class="error">','</div>');?></label><input class="form-control datepicker" name="dtz" value="<?php echo date('m/d/Y');?>"></td></tr>
            <tr><td>Feedback Document<label>(Option*)</label></td><td><input type="file" name="userfile"></td></tr>
            <tr><td></td><td><button class="btn btn-primary btn-xs" name="save"><span class="glyphicon glyphicon-comment"></span> grade</button></td></tr>
        </table>
    <?php echo form_close();?>
        </div>
</div>
<script>
    $('.datepicker').datepicker();
</script>
</div>
</div>
<?php include_once 'footer.php';?>
