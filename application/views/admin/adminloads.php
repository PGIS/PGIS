<div class="ajaz">
<table class="table table-condensed">
   
    <?php echo form_open('admin_page/form_edit/'.$edit);?>
    <tr><td><label>Username</label><input type="text" name="us" class="form-control" value=""></td></tr>
    <tr><td><label>Email-Address</label><input type="text" name="em" class="form-control" value=""></td></tr>
    <tr><td><button class="btn btn-success btn-xs">update</button></td></tr>
    <?php echo form_close();?>
    
</table>
</div>
