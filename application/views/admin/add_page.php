<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
     
     <div class="well well-sm">Name::<?php echo $this->session->userdata('userid');?></div>
     <div id="regform">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Add User</center></h3>
            </div>
            <div class="panel-body">
                 <?php echo form_open('admin_page/add',array('name'=>'myform','class'=>'form-signin'));?>
                 <?php if(!empty($add)){ 
                    echo '<div class="alert alert-success">'.$add.'</div>';}
                 ?>
                 <?php echo form_input(array('name'=>'userid','placeholder'=>'Username','class'=>'form-control'));?>
                 <?php echo form_error('userid','<div class="error">', '</div>'); ?>
                 <?php echo form_input(array('name'=>'fname','placeholder'=>'First name','class'=>'form-control'));?>
                 <?php echo form_error('fname','<div class="error">', '</div>'); ?> 
                 <?php echo form_input(array('name'=>'mname','placeholder'=>'Middle name','class'=>'form-control'));?>
                 <?php echo form_error('mname','<div class="error">', '</div>'); ?> 
                 <?php echo form_error('designation','<div class="error">', '</div>'); ?>  
               <div><label for="designation">Designation</label>
                    <select name="designation"  class="form-control">
                      <option value=""<?php echo set_select('designation','',TRUE);?>></option>
                      <option value="administrator"<?php echo set_select('designation','administrator');?>>administrator</option>
                      <option value="Teaching staff"<?php echo set_select('designation','Teaching staff');?>>Teaching staff</option>
                      <option value="Admision staff"<?php echo set_select('designation','Admision staff');?>>Admision staff</option>
                      <option value="Student"<?php echo set_select('designation','Student');?>>Student</option>
                  </select>
               </div>
                    <?php echo form_password(array('name'=>'password','placeholder'=>'password','class'=>'form-control'));?>
                     <?php echo form_error('password','<div class="error">', '</div>'); ?>
                      <input type="submit" name="sub" value="Add" class='btn'>
                     <?php echo form_close();?>
                     <p style="margin-left: 150px"><?php echo anchor('admin_page/index','Back');?></p>
                
            </div>
         </div>
      
        
    </div>
  
</div>
<?php include_once 'footer.php';?>

