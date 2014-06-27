<div class="span12">
    <?php if(isset($succ)){
     echo ''.$succ;
    }?>
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
            <td><?php echo form_error('csname','<div class="error">','</div>');?><input type="text" name="csname" class="form-control input-sm" value="<?php echo set_value('csname');?>"></td>
        </tr>
        <tr>
            <td><label>Course Code:</label></td>
            <td><?php echo form_error('cdname','<div class="error">','</div>');?><input type="text" name="cdname" class="form-control input-sm" value="<?php echo set_value('cdname');?>"></td>
        </tr>
        <tr>
            <td colspan="1"></td>
            <td><button class=" btn btn-primary btn-xs pull-right" name="save"><span class="glyphicon glyphicon-upload"></span>submit</button></td>
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
        $('.add').html('<label class="label label-warning">Loading...</label>');
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        formz.push({"name": "save","value": ""});
        $.post(url,formz,function(sms){
            setTimeout(function(){
                $('.add').html(sms);
            },2000);
        });
    });
</script>

