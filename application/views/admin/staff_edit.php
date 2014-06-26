<div class="ajax"></div>
<div class="span12">
<?php 
   $res=$this->db->get_where('tb_user',array('id'=>$taff));
   foreach ($res->result() as $dat){
       
   ?>
   <?php echo form_open('admin_page/staff_edits/'.$dat->userid,array('id'=>'load'));?>
    <table class="table table-striped">
        <tr>
            <td><label>Username:</label>
            <input name="us" class="form-control" value="<?php echo ''.$dat->userid;?>"></td>
        </tr>
        <tr>
            <td><label>Designation:</label>
            <input name="ds" class="form-control" value="<?php echo ''.$dat->designation;?>"></td>
        </tr>
        <tr>
            <td><label>Email-address:</label>
            <input type="text" name="em" class="form-control input-sm" value="<?php echo''.$dat->email?>"></td>
        </tr>
        <tr>
           
            <td><button class=" btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-save"></span> update</button></td>
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
        var datz=$(this).serializeArray();
        var url=$(this).attr('action');
        $.post(url,datz,function(data){
            $('.ajax').html(data);
        });
    });
</script>


