<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('admin_page/addcourse');?>">Add Programme</a></li>
            <li><a href="<?php echo site_url('admin_page/manageprograme');?>">Manage programmes</a></li>
            <li><a href="<?php echo site_url('admin_page/changestudentprogramme');?>">Change Student course</a></li>
        </ol>
        <div class="well-sm alert-info">
            Please enter course information
            <?php 
            if(isset($padded)){
                echo '<div class="alert alert-success">Progrmme added successfully</div>';
            }elseif(isset($edited)){
                echo '<div class="alert alert-success">Progrmme adited successfully</div>';
            }
            ?>
        </div>
        <div class="col-md-9 col-lg-offset-1">
           <table class="table">
               <?php echo form_open('admin_page/courseadd');?>
                <tr>
                    <td colspan="2">
                        Programme name<?php echo form_error('coursename','<i class="error">', '</i>'); ?>
                         <input type="text" class="form-control" id="cuname" name="coursename" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
                         College found
                          <input type="text" class="form-control" id="coname" name="foundcollage" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Department 
                         <input type="text" class="form-control" id="depart" name="department" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Programme  Duration
                         <input type="text" class="form-control" id="durati" name="durati" required>
                    </td>
                </tr>
                <tr>
                    <td>
                     Tanzanian programme fee <?php echo form_error('normfee','<div class="error">', '</div>'); ?>
                      
                       <div class="form-group input-group">
                            <input type="text" class="form-control" id="fee" name="normfee" required>
                            <span class="input-group-addon">Tsh</span>
                       </div>
                    </td>
                    <td>
                      Non-Tanzania programme fee <?php echo form_error('forefee','<div class="error">', '</div>'); ?>
                      
                      <div class="form-group input-group">
                        <input type="text" class="form-control" id="fee" name="forefee" required>
                        <span class="input-group-addon">USD</span>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn btn-info">Add  course</button></td>
                </tr>
                </form>
            </table> 
        </div>
        
    </div>
</div>
<?php include_once 'footer.php';?>
