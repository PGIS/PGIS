<?php
    $qx = $this->db->get_where('tb_event_postpone', array('registration_ID' => $regid));
    if($qx->num_rows()==0){
        $desc='first postponement';
    }elseif ($qx->num_rows()==1) {
         $desc='second postponement';
    }elseif($qx->num_rows()==2){
        $quit=TRUE;
    }
    
    if(!isset($quit)){
?>
<div>
    Record Postponement for <b><?php echo $full_name;?></b>
    <form id="postpone">
        <table class="table">
            <tr>
                <td>
                    Postponement Description
                </td>
                <td><?php echo form_error('extnu','<div class="error">', '</div>'); ?>
                    <select class="form-control" name="extnu">
                        <option><?php echo $desc?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Date of postponement
                    <?php echo form_error('from','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control datepicker" name="from"> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                     Date of resumption
                     <?php echo form_error('to','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control datepicker" name="to">
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-info btn-xs">Record postponement</button>
                </td>
            </tr>
        </table>
    </form>
  
</div>
<?php    
    }  else {
     echo ''
        . '<div class="alert alert-danger">Only two posponement is allowed<div>';  
    }
    
    ?>
<?php
if($this->session->userdata('user_role')==='Supervisor'){
    $maurl=site_url('departStudentManage/eventPostpone/'.$regid);
}else {
    $maurl=site_url('collegStudentManage/eventPostpone/'.$regid);
}
?>
<script>
    $("#postpone").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo $maurl; ?>";
        var fdata = $('#postpone').serializeArray();
          fdata.push({"name": "save", "value": ""});
        $.post(url, fdata, function(data) {
            $('#events').html(data);
        });
    });
</script>
<script>
    $(document).ready(function(){ 
        $('.datepicker').datepicker(); 
    });
</script>

