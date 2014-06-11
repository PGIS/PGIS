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
                                <input type="text" name="userid" class="form-control formuser" placeholder="Username" value="<?php echo set_value('username'); ?>" />
                                <span class="verify"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                              <?php echo form_error('password','<div class="error">', '</div>'); ?>  
                            </td>
                            <td>
                              <input type="password" class="form-control formpass" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>"/>  
                              <span class="verifypass"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              Confirm Password  
                            </td>
                            <td>
                                <input type="password" class="form-control formpassconf" name="passconf" placeholder="Confirm Password" value="<?php echo set_value('passconf'); ?>"/> 
                                <span class="verifypassconf"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                               <?php echo form_error('email','<div class="error">', '</div>'); ?> 
                            </td>
                            <td>
                               <input type="text" name="email" class="form-control formemail" placeholder="Email" value="<?php echo set_value('email'); ?>"/> 
                               <span class="verifyemail"></span>
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
<script>
    $('.formuser').keyup(function(){
        $('.verify').html('<label class="label label-info">username must be unique</label>');
      var formuser=$(this).val();
      var url="<?php echo site_url('register/retrieve_ajax');?>";
      var url2=url+'/'+formuser;
      $.post(url2,formuser,function(data){
          setTimeout(function(){
             $('.verify').html(data); 
          },1000);
      });
    });
    $('.formpass').keyup(function(){
      var formpass=$(this).val();
        if(formpass.length >=10){
           $('.verifypass').html('<label class="label label-success">Strong password</label>'); 
        }else if(formpass.length >=5){
           $('.verifypass').html('<label class="label label-warning">weak password</label>'); 
        }else{
          $('.verifypass').html('<label class="label label-danger">Short password</label>');  
        }
    });
    $('.formpassconf').keyup(function(){
        var formpassconf=$(this).val();
        if(formpassconf.length >=5){
        $('.verifypassconf').html('<label class="label label-success">password matched <span class="glyphicon glyphicon-ok"></span></label>');
        }else{
        $('.verifypassconf').html('<label class="label label-danger">password does not match</label>');
        }
    });
    $('.formemail').keyup(function(){
         $('.verifyemail').html('<label class="label label-warning">Email address must be valid </label>');
        var formemail=$(this).val();
        var url="<?php echo site_url('register/form_email');?>";
        var url2=url+'/'+formemail;
        $.post(url2,formemail,function(data){
            setTimeout(function(){
                $('.verifyemail').html(data);
            },1000);
        });
    });
</script>
<?php include 'include/footer.php';?>	
