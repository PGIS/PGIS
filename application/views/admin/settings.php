<?php include 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <ol class="breadcrumb">
         <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('adduser'); ?>">Add user</a></li>
        <li class="active"><a href="<?php echo site_url('admin_page/systemSettings'); ?>">
                <span class="glyphicon glyphicon-cog"></span>   System Settings</a></li>
    </ol>
    <div class="col-md-10 col-lg-offset-1">
        <div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Academic year
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse <?php if(isset($openapp1)){echo 'in';}?>">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="<?php if(!isset($shw)){echo 'active';}?>"><a href="#home" data-toggle="tab">Current Details</a></li>
                            <li class="<?php if(isset($shw)){echo 'active';}?>"><a href="#profile" data-toggle="tab">Update Details</a></li>
                        </ul>
                          <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane <?php if(!isset($shw)){echo 'active';}?>" id="home">
                                <br>
                                <?php if(isset($suc)){
                                    echo '<div class="alert alert-success">Successfully updated</div>';
                                    
                                }?>
                                <table class="table">
                                    <tr>
                                        <td>
                                          Academic year:
                                          <?php
                                                if(isset($accyear)){
                                                    echo "<strong class='dts'>".$accyear."</strong>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                          Semester  :
                                          <?php
                                            if(isset($semester)){
                                                echo "<strong class='dts'>".$semester."</strong>";
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane <?php if(isset($shw)){echo 'active';}?>" id="profile">
                                <div class="col-md-12">
                                    <br>
                                   <?php echo form_open('admin_page/changeAccYear');?>
                                    <table class="table">
                                        <tr >
                                            <td>
                                             Academic year  
                                             <?php echo form_error('acy','<div class="error">', '</div>'); ?>
                                            </td>
                                            <td>
                                                <select name="acy" class="form-control" required>
                                                    <?php 
                                                    $year=  date('Y');
                                                    ?>
                                                    <option></option>
                                                    <option><?php echo ($year-1).'/'.($year);?></option>
                                                    <option><?php echo ($year).'/'.($year+1)?></option>

                                                </select>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               Semester 
                                               <?php echo form_error('seme','<div class="error">', '</div>'); ?>
                                            </td>
                                            <td>
                                                <select name="seme" class="form-control">
                                                    <option></option>
                                                    <option>Semester I</option>
                                                    <option>Semester II</option>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button type="submit" class="btn btn-xs btn-info">Update</button>
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
                 <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#appdeadline">
                       Application deadline
                      </a>
                    </h4>
                  </div>
                     <div id="appdeadline" class="panel-collapse collapse <?php if(isset($openapp)){echo 'in';}?>">
                    <div class="panel-body">
                        <table class="table">
                            <tr class="info">
                                <td>
                                  Application status :
                                  <?php
                                   if(isset($closedate)){
                                      if(strtotime(date('Y/m/d')) < strtotime(date($closedate))){
                                          echo '<b>OPEN</b>';
                                      }  else {
                                          echo '<b>CLOSED</b>';
                                      }
                                   }
                                  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Close date:
                                        <?php
                                        if(isset($closedate)){
                                            echo "<strong class='dts'>".$closedate."</strong>";
                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if(isset($suc1)){
                                    echo '<div class="alert alert-success">Successfully updated</div>';
                                    
                                     }?>
                                     <?php echo form_open('admin_page/systemSettingsOpenApp');?>
                                     <?php echo form_error('chdate','<div class="error">', '</div>'); ?>
                                        <div id="thisInputsWrapper">
                                            <div class="col-md-12">Change close date</div>
                                            
                                            <div class="col-md-4">
                                               <input name="chdate" type="text" class="form-control datepicker"> 
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-info">Update</button>
                                            </div>
                                        </div>
                                       
                                           
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.datepicker').datepicker();
</script>
<?php include_once 'footer.php'; ?>