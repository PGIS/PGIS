<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
  
     <div id="regform">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Add User</center></h3>
            </div>
            <div class="panel-body">
                 <?php echo form_open('admin_page/add',array('name'=>'myform','class'=>'form-signin'));?>
                 <?php if(!empty($add)){ 
                    echo '<div class="alert alert-success">'.$add.'</div>';}
                 ?><?php echo form_error('userid','<div class="error">', '</div>'); ?>
                <p> <?php echo form_input(array('name'=>'userid','placeholder'=>'Username','class'=>'form-control'));?></p>
                <?php echo form_error('fname','<div class="error">', '</div>'); ?> 
                <p><?php echo form_input(array('name'=>'fname','placeholder'=>'First name','class'=>'form-control'));?></p>
                 <?php echo form_error('mname','<div class="error">', '</div>'); ?> 
                 <?php echo form_input(array('name'=>'mname','placeholder'=>'Middle name','class'=>'form-control'));?>
               <p><label for="designation">Designation</label>
                   <?php echo form_error('designation','<div class="error">', '</div>'); ?>  
                    <select name="designation"  class="form-control">
                      <option value=""<?php echo set_select('designation','',TRUE);?>></option>
                      <option value="administrator"<?php echo set_select('designation','administrator');?>>administrator</option>
                      <option value="Teaching staff"<?php echo set_select('designation','Teaching staff');?>>Teaching staff</option>
                      <option value="Admision staff"<?php echo set_select('designation','Admision staff');?>>Admision staff</option>
                      <option value="Student"<?php echo set_select('designation','Student');?>>Student</option>
                      <option value="Finance staff"<?php echo set_select('designation','Finance staff');?>>Finance staff</option>
                  </select>
                </p> <?php echo form_error('password','<div class="error">', '</div>'); ?>
                 <p><?php echo form_password(array('name'=>'password','placeholder'=>'password','class'=>'form-control'));?></p>
                    <?php echo form_error('email','<div class="error">', '</div>'); ?>
                 <p><input type="text" name="email" class="form-control" placeholder="Email"/></p>
                      <input type="submit" name="sub" value="Add User" class='subtn'>
                     <?php echo form_close();?>
            </div>
         </div>
      
        
    </div>
  
</div>
<?php include_once 'footer.php';?>

