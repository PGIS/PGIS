<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('adduser'); ?>">Add user</a></li>
     </ol>
    <div class="panel-group col-md-10 col-lg-offset-1" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                   <span class="glyphicon glyphicon-plus-sign"></span> Add User
                  </a>
                </h6>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse <?php if(isset($in)){echo $in;}?>">
                <div class="panel-body">
                    <?php echo form_open('adduser',array('name'=>'myform','class'=>'form-signin'));?>
                    <table class="table table-condensed table-striped">
                        <tbody>
                     <?php if(!empty($add)){ 
                        echo '<div class="alert alert-success">'.$add.'</div>';} ?>
                        <tr>
                            <td class="col-md-6">Username
                               <?php echo form_error('userid','<div class="error">', '</div>');?>
                            </td>
                            <td>
                               <?php echo form_input(array('name'=>'userid','placeholder'=>'Username','class'=>'form-control'));?>
                            </td>
                        </tr>
                        <tr>
                            <td>First name
                            <?php echo form_error('fname','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                                
                               <?php echo form_input(array('name'=>'fname','placeholder'=>'First name','class'=>'form-control'));?>
                            </td>
                        </tr>
                        <tr>
                            <td>Middle name
                            <?php echo form_error('mname','<div class="error">', '</div>'); ?>
                            </td>
                            <td> 
                                <?php echo form_input(array('name'=>'mname','placeholder'=>'Middle name','class'=>'form-control'));?>
                            </td>
                        </tr>
                        <tr>
                            <td>Designation
                                <?php echo form_error('designation','<div class="error">', '</div>'); ?> 
                            </td>
                            <td>
                                <select name="designation"  class="form-control">
                                  <option value=""<?php echo set_select('designation','',TRUE);?>></option>
                                  <option value="administrator"<?php echo set_select('designation','administrator');?>>administrator</option>
                                  <option value="Teaching staff"<?php echo set_select('designation','Teaching staff');?>>Teaching staff</option>
                                  <option value="Admision staff"<?php echo set_select('designation','Admision staff');?>>Admision staff</option>
                                  <option value="Student"<?php echo set_select('designation','Student');?>>Student</option>
                                  <option value="Finance staff"<?php echo set_select('designation','Finance staff');?>>Finance staff</option>
                                  <option value="Supervisor"<?php echo set_select('designation','Supervisor');?>>Supervisor</option>
                                  <option value="external supervisor"<?php echo set_select('designation','external supervisor');?>>External supervisor</option>
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <td>Password
                                <?php echo form_error('password','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                                <?php echo form_password(array('name'=>'password','placeholder'=>'password','class'=>'form-control'));?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email
                            <?php echo form_error('email','<div class="error">', '</div>'); ?>
                            </td>
                            <td>
                                <input type="text" name="email" class="form-control" placeholder="Email"/>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <input type="submit" name="sub" value="Add User" class='btn btn-xs btn-info'>  
                            </td>
                        </tr>
                    </tbody>
                         <?php echo form_close();?>
                          </table>

                </div>
            </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                 <span class="glyphicon glyphicon-plus-sign "></span> Add user (Import an excel file)
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse <?php if(isset($in1)){echo $in1;}?>">
            <div class="panel-body">
                   <?php echo form_open_multipart('admin_page/do_upload');?>
                <table class="table">
                    <tr class="warning">
                        <td colspan="2">Import the file containing staff's detail</td>  
                    </tr>
                    <tr>
                       <td>
                           <?php if(isset($error)){echo '<div class="error">'.$this->upload->display_errors('<p>', '</p>').'</div>';}?>
                           <input type="file" name="userfile" size="40" /></td>
                       <td>
                           
                           <button type="submit" class="btn btn-info btn-sm">
                               <span class="glyphicon glyphicon-circle-arrow-up"></span> Upload file
                           </button>
                       
                       </td>
                    </tr>
                    </table>
                <div class="success"><?php if(isset($arra)){
                    echo '<div class="alert alert-success">'
                    . '<span class="glyphicon glyphicon-ok-sign"></span>'
                            . $arra.'</div>';
                    
                }?></div>
                    </form>
                    <div class="alert alert-danger">
                        <?php
                        $input2 = '9,admin@google.com,8';
                        $dei=explode( ',', $input2 );
                        print_r($dei);
                        ?>
                    </div>
            </div>
          </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>

