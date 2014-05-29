<?php include 'include/header.php';?>

<div id="page-wrapper">
     <div class="col-md-8 col-lg-offset-2">
    <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Create Your Account <span class="glyphicon glyphicon-user"></span></center></h3>
            </div>
            <div class="panel-body">
                <div class='col-md-12'>
                    <table class="table">
                        <?php echo form_open('register',array('class'=>'form-horizontal')); ?>
                        <tr>
                            <td class="col-md-4">
                                Username
                                <?php echo form_error('userid','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                                <input type="text" name="userid" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                              <?php echo form_error('password','<div class="error">', '</div>'); ?>  
                            </td>
                            <td>
                              <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                              Confirm Password  
                            </td>
                            <td>
                                <input type="password" class="form-control" name="passconf" placeholder="Confirm Password" value="<?php echo set_value('passconf'); ?>"/> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                               <?php echo form_error('email','<div class="error">', '</div>'); ?> 
                            </td>
                            <td>
                               <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Create Account" class="btn btn-sm btn-info"/>  
                            </td>
                        </tr>
                         <?php form_close();?>
                    </table>
            </div>
            </div>
         </div>
     </div>
</div><!-- /#page-wrapper -->

<?php include 'include/footer.php';?>	
