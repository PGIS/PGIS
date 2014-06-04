<div>
    <div class="alert alert-warning">
        You are about to record discontinuation for <b><?php echo $full_name;?></b> 
        with Registration number <b><?php echo $regid;?></b>
        click the link to continue
    </div>
    <a href="">
        <form id="disco">
            <button class="btn btn-xs btn-warning">Discontinue Student</button>
        </form> 
    </a>
</div>
<?php
if($this->session->userdata('user_role')==='Supervisor'){
    $maurl=site_url('departStudentManage/eventdisco/'.$regid);
}else {
    $maurl=site_url('collegStudentManage/eventdisco/'.$regid);
}
?>
<script>
    $("#disco").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo $maurl; ?>";
        var fdata = $('#disco').serializeArray();
          fdata.push({"name": "save", "value": ""});
        $.post(url, fdata, function(data) {
            $('#events').html(data);
        });
    });
</script>