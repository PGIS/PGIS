<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('admin_page/add'); ?>">Add user</a></li>
     </ol>
    <div id="" class="col-md-10 col-lg-offset-1">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Add User</center></h3>
            </div>
            <div class="panel-body">
                 <?php echo form_open('admin_page/add',array('name'=>'myform','class'=>'form-signin'));?>
                <table class="table">
                 <?php if(!empty($add)){ 
                    echo '<div class="alert alert-success">'.$add.'</div>';} ?>
                    <tr>
                        <td>Username
                        </td>
                        <td>
                            <?php echo form_error('userid','<div class="error">', '</div>');?>
                            <p> 
                                <?php echo form_input(array('name'=>'userid','placeholder'=>'Username','class'=>'form-control'));?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>First name</td>
                        <td><?php echo form_error('fname','<div class="error">', '</div>'); ?> 
                            <p><?php echo form_input(array('name'=>'fname','placeholder'=>'First name','class'=>'form-control'));?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Middle name</td>
                        <td><?php echo form_error('mname','<div class="error">', '</div>'); ?> 
                            <?php echo form_input(array('name'=>'mname','placeholder'=>'Middle name','class'=>'form-control'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>Designation</td>
                        <td><p>
                   <?php echo form_error('designation','<div class="error">', '</div>'); ?>  
                    <select name="designation"  class="form-control">
                      <option value=""<?php echo set_select('designation','',TRUE);?>></option>
                      <option value="administrator"<?php echo set_select('designation','administrator');?>>administrator</option>
                      <option value="Teaching staff"<?php echo set_select('designation','Teaching staff');?>>Teaching staff</option>
                      <option value="Admision staff"<?php echo set_select('designation','Admision staff');?>>Admision staff</option>
                      <option value="Student"<?php echo set_select('designation','Student');?>>Student</option>
                      <option value="Finance staff"<?php echo set_select('designation','Finance staff');?>>Finance staff</option>
                      <option value="Supervisor"<?php echo set_select('designation','Supervisor');?>>Supervisor</option>
                      <option value="external supervisor"<?php echo set_select('designation','external supervisor');?>>External supervisor</option>
                  </select>
                </p></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <?php echo form_error('password','<div class="error">', '</div>'); ?>
                            
                                <?php echo form_password(array('name'=>'password','placeholder'=>'password','class'=>'form-control'));?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                          <?php echo form_error('email','<div class="error">', '</div>'); ?>
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                          <input type="submit" name="sub" value="Add User" class='btn btn-sm btn-info'>  
                        </td>
                    </tr>
                      
                     <?php echo form_close();?>
                      </table>
            </div>
         </div>
      
        
    </div>
  
</div>
<?php include_once 'footer.php';?>

