<?php include'include/header.php';?>
<div id="page-wrapper">
    <div id="login" >
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><center> Sign In</center></h3>
            </div>
            <div class="panel-body">
             
                 <?php echo form_open('login',array('class'=>'form-signin form-horizontal','role'=>'form'));?>
                    <?php
                     if(isset($active)){
                         echo '<center><div class="error">'.$active.'</div></center>';
                     }
                     ?>
                    <?php if(isset($errormsg)) echo'<div class="error">'.$errormsg.'</div>';?>
                    <?php if(!empty($error_message)){ echo '<div class="alert alert-info">'. $error_message.'</div>';}?>
                    <p>
                    <?php echo form_error('us','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control" placeholder="Username" name="us" value="<?php echo set_value('us'); ?>">
                    </p>
                    <p>
                        <?php echo form_error('pd','<div class="error">', '</div>'); ?>

                         <input type="password" class="form-control" placeholder="Password" name="pd">

                    </p>
                    <label class="checkbox">
                        Remember me
                    <input type="checkbox" value="remember-me" checked="chacked">
                    </label>
                    <input class="subtn btn-large btn-primary" type="submit" name="sb" value="submit">
                    <?php
                     if(isset($errormsg)){
                         echo '<center><a href="'.site_url('register/passconfig').'">Forget password?</a></center>';
                     }elseif (isset($active)) {
                         echo '';
                     }
                     ?>
            <?php form_close();?>
             </div>
         </div>
     </div>   
</div>
<?php include 'include/footer.php';?>
        
