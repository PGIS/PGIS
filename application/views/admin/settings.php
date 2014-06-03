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
                  <div id="collapseOne" class="panel-collapse collapse ">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li><a href="#home" data-toggle="tab">Current Details</a></li>
                            <li><a href="#profile" data-toggle="tab">Update Details</a></li>
                        </ul>
                          <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <br>
                                <table class="table">
                                    <tr>
                                        <td>
                                          Academic year  
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                          Semester  
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane" id="profile">
                                <div class="col-md-12">
                                    <br>
                                   <form>
                                    <table class="table">
                                        <tr >
                                            <td>
                                             Academic year  
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
                                  Application status :Open  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Close date:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <?php echo form_open('admin_page/systemSettingsOpenApp');?>
                                        <div id="thisInputsWrapper">
                                            <button  class="btn btn-sm btn-info" id="changeDeadLine" type="button">Change close date</button>  
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
<?php include_once 'footer.php'; ?>