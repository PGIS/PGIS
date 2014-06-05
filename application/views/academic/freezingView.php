<?php
    $qx = $this->db->get_where('tb_event_freez', array('registration_ID' => $regid));
    if($qx->num_rows()==0){
        $desc='first freezing';
    }elseif ($qx->num_rows()==1) {
         $desc='second freezing';
    }elseif($qx->num_rows()==2){
        $quit=TRUE;
    }
    
    if(!isset($quit)){
?>
<div>
    Record Postponement for <b><?php echo $full_name;?></b>
    <form id="freez">
        <table class="table">
            <tr>
                <td>
                    Freezing Description
                </td>
                <td>
                    <?php echo form_error('extnu','<div class="error">', '</div>'); ?>
                    <select class="form-control" name="extnu">
                        <option><?php echo $desc?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Date of freezing
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
                    <button type="submit" class="btn btn-info btn-xs">Record freezing</button>
                </td>
            </tr>
        </table>
    </form>
  
</div>
<?php    
    }  else {
     echo ''
        . '<div class="alert alert-danger">Only two freezing is allowed<div>';  
    }
    
    ?>
<?php
if($this->session->userdata('user_role')==='Supervisor'){
    $maurl=site_url('departStudentManage/eventFreezing/'.$regid);
}else {
    $maurl=site_url('collegStudentManage/eventFreezing/'.$regid);
}
?>
<script>
    $("#freez").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo $maurl; ?>";
        var fdata = $('#freez').serializeArray();
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
