<?php 
if(isset($post)){
?>
  <div class="col-md-12">
    <table class="table">
         <tr>
            <td colspan="2" class="success">
                <?php echo 'Student name '.'<b>'.$full_name.'</b>';?>
            </td>
        </tr>
        <tr>
            <td>Postponement date</td>
            <td><?php echo '<b>'.$from.'</b>';?></td>
        </tr>
        <tr>
            <td>Resume date</td>
            <td><?php echo '<b>'.$to.'</b>';?></td>
        </tr>
        <tr>
            <td colspan="2">
                <button onclick="resumePost('<?php echo $regid; ?>')" class="btn btn-xs btn-info">Resume</button>
            </td>
        </tr>
    </table>
</div>  
<?php   
}elseif(isset($frez)) {
?>
  <div class="col-md-12">
    <table class="table">
        <tr>
            <td colspan="2" class="success">
                 <?php echo 'Student name '.'<b>'.$full_name.'</b>';?>
            </td>
        </tr>
        <tr>
            <td>Freezing Date:</td>
            <td><?php echo '<b>'.$from.'</b>';?></td>
        </tr>
        <tr>
            <td>Resumption date:</td>
            <td><?php echo '<b>'.$to.'</b>';?></td>
        </tr>
        <tr>
            <td>
                <td colspan="2">
                <button onclick="resumefrez('<?php echo $regid; ?>')" class="btn btn-xs btn-info">Resume</button>
            </td>
            </td>
        </tr>
    </table>
</div>  
<?php 
}
?>

<script>
 
 
function resumefrez(id) {
    var url = "collegStudentManage/resumemodefr/" + id;
    $.get(url, function(data) {
        $('#events').html(data);
    });
}
    function resumePost(id) {
    var url = "collegStudentManage/resumemode/" + id;
    $.get(url, function(data) {
        $('#events').html(data);
    });
}

</script>
