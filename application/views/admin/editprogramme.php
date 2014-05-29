<div id='succmesg'></div>
<form id="predit">  

    <table class="table">

        <tr>
            <td colspan="2">
                Programme name<?php echo form_error('coursename', '<i class="error">', '</i>'); ?>
                <input type="text" class="form-control" id="cuname" name="coursename" required
                       value="<?php echo $pname; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2"> 
                College found
                <input type="text" class="form-control" id="coname" name="foundcollage" required
                       value="<?php echo $pcollege; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Department 
                <input type="text" class="form-control" id="depart" name="department" required
                       value="<?php echo $pdepart; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Programme  Duration
                <input type="text" class="form-control" id="durati" name="durati" required
                       value="<?php echo $pduration; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Tanzanian programme fee <?php echo form_error('normfee', '<div class="error">', '</div>'); ?>

                <div class="form-group input-group">
                    <input type="text" class="form-control" id="fee" name="normfee" required
                           value="<?php echo $tzfee; ?>">
                    <span class="input-group-addon">Tsh</span>
                </div>
            </td>
            <td>
                Non-Tanzania programme fee <?php echo form_error('forefee', '<div class="error">', '</div>'); ?>

                <div class="form-group input-group">
                    <input type="text" class="form-control" id="fee" name="forefee" required
                           value="<?php echo $nontzfee; ?>">
                    <span class="input-group-addon">USD</span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="edit" class="btn btn btn-info btn-sm" id="submit">Save changes</button>
                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
            </td>

        </tr>

    </table> 
</form>
<script>

    $("#predit").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo site_url('admin_page/courseadd'); ?>";
        var fdata = $('#predit').serializeArray();
        fdata.push({"name": "edit", "value": ""});
        $.post(url, fdata, function(data) {
            $('#succmesg').html(data);
        });
    });
</script>