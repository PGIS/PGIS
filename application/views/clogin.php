<?php include'include/header.php';?>
<div id="page-wrapper">
    <div class="col-md-7 col-lg-offset-2">
        <div class="panel panel-info im">
            <div class="panel-heading">
                <h3 class="panel-title"><center> Sign In <span class="glyphicon glyphicon-log-in"></span></center></h3>
            </div>
            <div class="panel-body">
             
                 <?php echo form_open('login',array('class'=>'form-signin form-horizontal','role'=>'form'));?>
                    <?php
                     if(isset($active)){
                         echo '<center><div class="error">'.$active.'</div></center>';
                     }
                     ?>
                    <?php if(isset($errormsg)) echo'<div class="error">'.$errormsg.'</div>';?>
                Username or email
                    <?php echo form_error('us','<div class="error">', '</div>'); ?>
                <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control username" placeholder="Username or email" name="us" value="<?php echo set_value('us'); ?>" autofocus>
                        
                </div>
                <div class="valid"></div>
                Password
                     <?php echo form_error('pd','<div class="error">', '</div>'); ?>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control password" placeholder="Password" name="pd">
                    </div>
                    <div class="validz"></div>
                    <label class="checkbox">
                        Remember me
                    <input type="checkbox" value="remember-me" checked="chacked">
                    </label>
                   
                <div class="col-md-8 col-lg-offset-2">
                    <p>
                        <input class="btn btn-large btn-info col-md-12" type="submit" name="sb" value="Login">
                    </p>
                    <?php
                     if(isset($errormsg)){
                         echo '<center><a href="'.site_url('register/passconfig').'">Forget password?</a></center>';
                     }elseif (isset($active)) {
                         echo '';
                     }
                     ?>
                </div>
                    
                    
            <?php form_close();?>
               
                
            </div>
         </div>
     </div>   
</div>
<script>
    $('.username').keyup(function(){
        var username=$(this).val();
        var url="<?php echo site_url('login/ajaxcheck');?>";
        var url2=url+'/'+username;
        $.post(url2,username,function(data){
            $('.valid').html(data);
        });
    });
    $('.password').keyup(function(){
        var password=$(this).val();
        var url="<?php echo site_url('login/ajaxpassord');?>";
        var url2=url+'/'+password;
        $.post(url2,password,function(data){
            $('.validz').html(data);
        });
    });
    
</script>
<?php include 'include/footer.php';?>
           
