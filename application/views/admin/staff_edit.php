<div class="panel panel-default">
    <div class="panel-heading">Staff Edit</div>
    <div class="panel-body">
    <?php if(isset($succ)){
     echo ''.$succ;
    }?>
<?php 
   $res=$this->db->get_where('tb_user',array('id'=>$taff));
   foreach ($res->result() as $dat){
       
   ?>
   <?php echo form_open('admin_page/staff_edits/'.$dat->userid.'/'.$taff,array('id'=>'load'));?>
    <table class="table table-striped">
        <tr>
            <td><label>Username:</label>
                <?php echo form_error('us','<div class="error">','</div>');?>
            <input name="us" class="form-control" value="<?php echo ''.$dat->userid;?>"></td>
        </tr>
        <tr>
            <td><label>Designation:</label>
                <?php echo form_error('ds','<div class="error">','</div>');?>
            <input name="ds" class="form-control" value="<?php echo ''.$dat->designation;?>"></td>
        </tr>
        <tr>
            <td><label>Email-address:</label>
                <?php echo form_error('em','<div class="error">','</div>');?>
            <input type="text" name="em" class="form-control input-sm" value="<?php echo''.$dat->email?>"></td>
        </tr>
        <tr>
           
            <td><button class=" btn btn-success btn-xs pull-right" name="save"><span class="glyphicon glyphicon-save"></span> update</button></td>
        </tr>
    </table>
<?php echo form_close()?>
 <?php
   }
   ?>
</div>
</div>
<script>
    $('#load').submit(function(e){
        e.preventDefault();
        var datz=$(this).serializeArray();
        var url=$(this).attr('action');
        datz.push({"name": "save", "value": " "});
        $.post(url,datz,function(data){
            $('.colo').html(data);
        });
    });
</script>


