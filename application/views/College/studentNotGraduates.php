<div class="panel panel-default">
    <div class="panel-heading">Final grade for: <?php echo $grads;?></div>
    <div class="panel-body">
        <?php
        if(isset($success)){
            echo ''.$success;
        }
        ?>
        <?php echo form_open('college_Coordinator/sendNotMessage/'.$grads ,array('id'=>'comz'));?>
        <table class="table">
            <tr><td>Send message to all accounts</td></tr>
            <tr><td>Reason(s) For not Graduating</td></tr>
            <tr><td><?php echo form_error('message','<div class="error">','</div>');?><textarea class="form-control" name="message"></textarea></td></tr>
            <tr><td>Date : <?php echo date('m/d/Y');?></td></tr>
            <tr><td><button class="btn btn-success btn-xs" name="save"><span class="glyphicon glyphicon-comment"></span> send message</button> <span class="loads" style="margin-left: 50px;"></span></td></tr>
        </table>
        <?php echo form_close();?>
    </div>
</div>
<script>
    $('#comz').submit(function(event){
        event.preventDefault();
        $('.loads').html('<img src="<?php echo base_url('assets/img/load.gif');?>">');
        var fomx=$(this).serializeArray();
        var url=$(this).attr('action');
        fomx.push({"name": "save","value":" "});
        $.post(url,fomx,function(data){
            setTimeout(function(){
            $('.grads').html(data);
            },2000);
        });
    });
</script>