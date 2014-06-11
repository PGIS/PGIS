<?php
    $s=''.strtotime(date("n/j/Y"));
    $qx = $this->db->get_where('tb_event_extend', array('registration_ID' => $regid));
    $qx1 = $this->db->get_where('tb_event_extend', array('registration_ID' => $regid,'status >'=>$s));
    $qx2 = $this->db->get_where('tb_event_freez', array('registration_ID' => $regid,'status'=>NULL));
    $qx3 = $this->db->get_where('tb_event_postpone', array('registration_ID' => $regid,'status'=>NULL));
    
    if($qx1->num_rows()>0){
        $skip=TRUE;
    }
     if($qx2->num_rows()>0){
        $skip=TRUE;
    }
    if($qx3->num_rows()>0){
        $skip=TRUE;
    }
    
    if($qx->num_rows()==0){
        $desc='first extension';
    }elseif ($qx->num_rows()==1) {
         $desc='second extension';
    }elseif ($qx->num_rows()==2) {
         $desc='third extension';
    }elseif ($qx->num_rows()==3) {
         $desc='fourth extension';
    }
    elseif($qx->num_rows()==4){
        $quit=TRUE;
    }
    
    if(!isset($quit)&& !isset($skip)){
?>
<div>
    Record extension for <b><?php echo $full_name;?></b>
    <form id="extend">
        <table class="table">
            <tr>
                <td>
                    Extension number
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
                    Extension start date
                    <?php echo form_error('from','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control datepicker" name="from"> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                     Extension end date
                     <?php echo form_error('to','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control datepicker" name="to">
                </td>
            </tr>
            <tr>
                <td>
                    Period (months) 
                </td>
                <td>
                    <?php echo form_error('month','<div class="error">', '</div>'); ?>
                    <select class="form-control" name="month">
                        <?php
                         for($i=1;$i<13;$i++){
                             echo '<option>'.$i.'</option>';
                         }
                        ?>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-info btn-xs">Record extension</button>
               </td>
            </tr>
        </table>
    </form>
  
</div>
<?php    
    }  elseif(isset ($quit)) {
     echo ''
        . '<div class="alert alert-danger">Only four extension is allowed<div>';  
    }elseif(isset ($skip)) {
     echo ''
        . '<div class="alert alert-warning">ACTION NOT PERMITED. please check if there is a pending extension, postponement or freezing<div>';  
    }
    
    ?>
<?php
if($this->session->userdata('user_role')==='head of department'){
    $maurl=site_url('departStudentManage/eventExtension/'.$regid);
}else {
    $maurl=site_url('collegStudentManage/eventExtension/'.$regid);
}
?>
<script>
    $("#extend").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo $maurl; ?>";
        var fdata = $('#extend').serializeArray();
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
