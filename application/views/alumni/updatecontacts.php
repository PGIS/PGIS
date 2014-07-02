<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="alert alert-success"><center>Update contact information.</center></div>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-stop"></span> Personal contacts </h3>
            </div>
              <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="<?php if(!isset($shw)){echo 'active';}?>"><a href="#home" data-toggle="tab">Contacts</a></li>
                    <li class="<?php if(isset($shw)){echo 'active';}?>"><a href="#profile" data-toggle="tab">Update Contacts</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane <?php if(!isset($shw)){echo 'active';}?>" id="home">
                        <br>
                        
                        <table class="table">
                            <tr>
                                <td><span class="glyphicon glyphicon-envelope"></span> Email Address:</td>
                                <td>
                                    <?php 
                                        if(isset($email)){
                                            echo "<strong class='dts'>".$email."</strong>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <span class="glyphicon glyphicon-phone"></span>  Mobile phone Number:
                                </td>
                                <td>
                                    <?php 
                                        if(isset($phoneno)){
                                            echo "<strong class='dts'>".$phoneno."</strong>";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane <?php if(isset($shw)){echo 'active';}?>" id="profile">
                        <br>
                        <?php echo form_open('alumni/contactsupdating');?>
                          <table class="table">
                            <tr>
                                <td><span class="glyphicon glyphicon-envelope"></span> Email Address:</td>
                                <td> 
                                    <?php echo form_error('email','<div class="error">', '</div>'); ?>
                                    <input class="form-control" name="email" type="text" 
                                           value="<?php 
                                        if(isset($email)){
                                            echo $email;
                                        }
                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  <span class="glyphicon glyphicon-phone"></span>  Mobile phone Number:
                                </td>
                                <td> <?php echo form_error('phone','<div class="error">', '</div>'); ?>
                                    <input class="form-control" name="phone" type="text" 
                                           value="<?php 
                                        if(isset($phoneno)){
                                            echo $phoneno;
                                        }
                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <div  class="pull-right">
                                        <button type="submit" class="btn btn-info btn-sm">Update contacts</button> 
                                   </div>  
                                </td>
                            </tr>
                        </table> 
                        </form>
                        
                    </div>
                </div>
              </div>
        </div>
    </div>
    
    
</div>

<?php include_once 'footer.php';?>
