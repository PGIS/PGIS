<div class="ajax"></div>
<div class="span12">
<?php 
   $res=$this->db->get_where('tb_programmes',array('prog_id'=>$add));
   foreach ($res->result() as $dat){
   ?>
   <?php echo form_open('admin_page/courseadds/'.$dat->prog_id,array('id'=>'load'));?>
    <table class="table table-striped">
        <tr>
            <td><label>Programme Name:</label></td>
            <td class="text-primary"><?php echo ''.$dat->programme_name;?></td>
        </tr>
        <tr>
            <td><label>Course Name:</label></td>
            <td><input type="text" name="csname" class="form-control input-sm" required></td>
        </tr>
        <tr>
            <td><label>Course Code:</label></td>
            <td><input type="text" name="cdname" class="form-control input-sm" required></td>
        </tr>
        <tr>
            <td colspan="1"></td>
            <td><button class=" btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-upload"></span>submit</button></td>
        </tr>
    </table>
<?php echo form_close()?>
 <?php
   }
   ?>
</div>
<script>
    $('#load').submit(function(e){
        e.preventDefault();
        $('.ajax').html('<label class="label label-warning">Loading...</label>');
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        $.post(url,formz,function(sms){
            setTimeout(function(){
                $('.ajax').html(sms);
            },2000);
        });
    });
</script>

