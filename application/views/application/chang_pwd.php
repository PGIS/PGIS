<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div id="login">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Change Password </center></h3>
            </div>
            <div class="panel-body">
              <form class="form-signin"
                    action="<?php echo site_url('change_form/change');?>" method="post">
                <?php if(!empty($error_message)){

                echo '<div class="alert alert-info">'.$error_message.'</div>';}
                 ?>
                  <?php if(!empty($error_mess)){
                 echo '<div class="alert alert-danger">'.$error_mess.'</div>';}
                 ?>

                     <?php echo form_error('opassword','<div class="error">', '</div>'); ?>
                    <input type="password" class="form-control" placeholder="Current password" name="opassword">
                    <?php echo form_error('npassword','<div class="error">', '</div>'); ?>
                    <p><input type="password" class="form-control" placeholder="New password" name="npassword"></p>
                    <?php echo form_error('cpassword','<div class="error">', '</div>'); ?>
                    <p><input type="password" class="form-control" placeholder="Comfirm password" name="cpassword"></p>
                    <button class="subtn btn-large btn-primary" type="submit" name="change">Change</button>
                  </form>
            </div>
         </div>      
    </div>     
</div>

<?php include_once 'footer.php';?>
