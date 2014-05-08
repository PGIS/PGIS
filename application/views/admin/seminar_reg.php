<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
  <div class="well well-sm"><p align="center">Seminar Registration in a Week</p></div>
   <div id="regform">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Seminar register</center></h3>
            </div>
            <div class="panel-body">
  <?php echo form_open('admin_page/seminar');?>
                 
                          <select name="course"  class="form-control">
               <option value=""<?php echo set_select('course','',TRUE);?>></option>
               <option value="IS 643"<?php echo set_select('course','IS 643');?>>IS 643</option> 
               <option value="IS 667"<?php echo set_select('course','IS 667');?>>IS 667</option> 
               <option value="IS 621"<?php echo set_select('course','IS 621');?>>IS 621</option>
                     </select>
                 </p>
                 <p><?php echo form_input(array('name'=>'day','placeholder'=>'Day','class'=>'form-control'));?></p>
                 <?php echo form_error('course','<div class="error">', '</div>'); ?>
                 <p><?php echo form_input(array('name'=>'hour','placeholder'=>'Hour','class'=>'form-control'));?></p>
                 <?php echo form_error('hour','<div class="error">', '</div>'); ?>
                 <input type="submit" name="sub" value="Register" class='subtn'>
                 <?php echo form_close();?>
     
<?php include_once 'footer.php';