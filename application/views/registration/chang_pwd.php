<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div id="login">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Change Password </center></h3>
            </div>
           <div class="panel-body">
                <table class="table">
                    <form class="form-signin"
                        action="<?php echo site_url('change_form/change');?>" method="post">
                    <?php if(!empty($suc_message)){

                    echo '<div class="alert alert-success">'.$suc_message.'</div>';}
                     ?>
                      <?php if(!empty($error_message)){
                     echo '<div class="alert alert-danger">'.$error_message.'</div>';}
                     ?>
                        <tr>
                            <td>
                                Current password
                                <?php echo form_error('opassword','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                               <input type="password" class="form-control " placeholder="Current password" name="opassword" required > 
                            </td>
                        </tr>
                        <tr>
                            <td>New Password
                            <?php echo form_error('npassword','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                              <input type="password" class="form-control" placeholder="New password" name="npassword">  
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm password
                            <?php echo form_error('cpassword','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                                <input type="password" class="form-control" placeholder="Comfirm password" name="cpassword">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="subtn btn-large btn-primary" type="submit" name="change">Change</button>
                            </td>
                        </tr>
                    
                  </form>
                 </table>
            </div>
         </div>      
    </div>     
</div>

<?php include_once 'footer.php';?>
