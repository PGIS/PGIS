<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
         <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab"><label class="glyphicon glyphicon-eye-open">Unchecked Applications</label></a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-eye-close">Assigned</label></a></li>
         </ul>
        <div class="tab-content" style="display: block">
            <div class="unchecked in tab-pane <?php if(isset($active)){echo'active';}?>">
                <table class="table table-striped table-condensed" id="mytable">
                    <thead>
                       <tr>
                            <th>Application id</th>
                            <th>Username</th>    
                            <th>Other names</th>
                            <th>Sur name</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php 
                    if(isset($query)){

                      foreach ($query as $row){
                            echo '<tr>';
                            echo '<td>'.$row->app_id.'</td>';
                            echo '<td>'.$row->userid.'</td>';
                            echo '<td>'.$row->other_name.'</td>';
                            echo '<td>'.$row->surname.'</td>';
                            echo '<td id="tdbtn"><a href="';
                            echo site_url('department_Coordinator/applicant_details/'.$row->userid.'');
                            echo '"><button class="btn-success btn btn-xs"><span class="glyphicon glyphicon-share-alt"></span> Verify</button></a></td>';
                            echo '</tr>';
                        }
                    }

                    ?>
                    </tbody>
                </table>
                <div class="col-md-12">
              <a href="#" data-toggle="modal" data-target="#upload">
                  <button class="col-md-4 btn btn-xs btn-info">
                     <span class="glyphicon glyphicon-cloud-upload" ></span> Upload Admission Criteria
                  </button>
               </a>
          </div>
                
                <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel">Upload Admission Criteria</h6>
                        </div>
                        <div class="modal-body">
                            <form >
                                <table class="table">
                                    <tr>
                                        <td>Choose file to upload</td>
                                        <td><input type="file" name=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-xs btn-info">Upload</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                
            </div>

            <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                <table class="table table-striped table-condensed" id="mytable1">
                    <thead>
                        <tr>
                          <th>Mark/Unmark</th>
                          <th>Application id</th>
                          <th>Username</th>    
                          <th>Other names</th>
                          <th>Sur name</th>
                          <th>Action<b class="caret"></b></th>  
                        </tr>
                    </thead>

                    <?php
                    if(isset($query1)){

                      foreach ($query1 as $row1){
                            echo '<tr>';
                            echo'<td><input type="checkbox" name="ckbx" class="checkbox"></td>';
                            echo '<td>'.$row1->app_id.'</td>';
                            echo '<td>'.$row1->userid.'</td>';
                            echo '<td>'.$row1->other_name.'</td>';
                            echo '<td>'.$row1->surname.'</td>';
                            echo  '<td><a href="'.site_url('department_Coordinator/admit/'.$row1->userid).'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus">admission letter</span></a></td>';
                            echo '</tr>';
                        }
                    }

                    ?>
                </table>
            </div>
    </div>
    </div>
</div>

<?php include_once 'footer.php';?>
