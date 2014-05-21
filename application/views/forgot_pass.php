<?php include'include/header.php';?>
<div id="page-wrapper">
    <div id="login" >
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Please give your Email-address</center></h3>
            </div>
            <div class="panel-body">
             
                 <?php echo form_open('register/passconfig',array('class'=>'form-signin form-horizontal','role'=>'form'));?>
                    <?php if(!empty($error_message)){echo'<div class="alert alert-info">'.$error_message.'</div>';}?>
                    <?php if(!empty($error_mess)){echo'<div class="alert alert-danger">'.$error_mess.'</div>';}?>
                    <p>
                    <?php echo form_error('email','<div class="error">', '</div>'); ?>
                    <input type="text" class="form-control" placeholder="E-mail Address" name="email" value="<?php echo set_value('email'); ?>">
                    </p>
                    <input class="btn btn-sm btn-info" type="submit" name="sb" value="submit">
            <?php form_close();?>
               
                   
            </div>
         </div>
     </div>   
</div>
<?php include 'include/footer.php';?>
           

