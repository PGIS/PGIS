<?php include'include/header.php';?>
<div id="page-wrapper">
    <div id="login" >
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Fill the fields below*</center></h3>
            </div>
            <div class="panel-body">
             
                 <?php echo form_open('register/password_lost',array('class'=>'form-signin form-horizontal','role'=>'form'));?>
                 <?php if(!empty($smg)){echo '<div class="alert alert-info">'.$smg.'</div>';}?>
                 <?php if(!empty($error_mess1)){echo '<div class="alert alert-danger">'.$error_mess1.'</div>';}?>
                    <p>
                    <?php echo form_error('email','<div class="error">', '</div>'); ?>
                        <input type="text" class="form-control" placeholder="Email-adress" name="email">
                    </p>
                    <p>
                        <?php echo form_error('npassword','<div class="error">', '</div>'); ?>

                         <input type="password" class="form-control" placeholder="Password" name="npassword">

                    </p>
                    <p>
                        <?php echo form_error('passwordconf','<div class="error">', '</div>'); ?>

                         <input type="password" class="form-control" placeholder="confirm password" name="passwordconf">

                    </p>
                    <input class="subtn btn-large btn-primary" type="submit" name="sb" value="update">
            <?php form_close();?>
            </div>
         </div>
     </div>   
</div>
<?php include 'include/footer.php';?>
           

