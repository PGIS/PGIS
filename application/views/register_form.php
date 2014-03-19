<?php include 'include/header.php';?>

<div id="page-wrapper">
     <div id="rform">
    <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Create Your Account </center></h3>
            </div>
            <div class="panel-body">
                <div class='rfrm'>
               <?php echo form_open('register',array('class'=>'form-horizontal')); ?>
            <p>
            <?php echo form_error('fname','<div class="error">', '</div>'); ?>
            <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo set_value('fname'); ?>"/>
            </p>
            <p>
             <?php echo form_error('mname','<div class="error">', '</div>');?>
            <input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo set_value('mname'); ?>"/>
            </p>
            <p>
            <?php echo form_error('userid','<div class="error">', '</div>'); ?>
            <input type="text" name="userid" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" />
            </p>
            <p>
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
             <?php echo form_error('password','<div class="error">', '</div>'); ?>
            </p>
            <p>
            <input type="password" class="form-control" name="passconf" placeholder="Confirm Password" value="<?php echo set_value('passconf'); ?>"/>
             </p>
            <p>
             <?php echo form_error('email','<div class="error">', '</div>'); ?>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
             </p>
            <p>
               <input type="submit" value="Create" class="btn btn-primary"/>  
            </p>
           
            <?php form_close();?>
            </div>
            </div>
         </div>
     </div>
</div><!-- /#page-wrapper -->

<?php include 'include/footer.php';?>	
