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
                        <option>first freezing</option>
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
<script>
    $("#freez").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo site_url('departStudentManage/eventFreezing/'.$regid); ?>";
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
