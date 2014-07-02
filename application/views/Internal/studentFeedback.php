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
            <tr><td></td><td><button class="btn btn-primary" name="save">grade</button></td></tr>
        </table>
    <?php echo form_close();?>
        </div>
<script>
    $('.datepicker').datepicker();
</script>
<script>
    $('#jay').submit(function(e){
        e.preventDefault();
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        formz.push({"name": "save","value": ""});
        $.post(url,formz,function(data){
            $('.feedback').html(data);
        });
    });
</script>
</div>
