<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
         <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab"><label class="glyphicon glyphicon-eye-open">Unchecked Applications</label></a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-eye-close">Checked Applications</label></a></li>
                 <li class="<?php if(isset($view)){echo'active';}?>"><a data-target=".criteria" data-toggle="tab"><label class="glyphicon glyphicon-upload">Admission criteria</label></a></li>
         </ul>
        <div class="tab-content" style="display: block">
            <div class="unchecked in tab-pane <?php if(isset($active)){echo'active';}?>">
                <table class="table table-striped table-condensed" id="mytable">
                    <thead>
                       <tr>
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
            </div>

            <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                <?php
                if(isset($msgfr)){
                    echo ' <div class="alert alert-success fade in alert-message">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    Successfully forwarded
                    </div>';
                }
                ?>
               
<script>
    window.setTimeout(function() {
    $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
    });}, 5000);
</script>
                <table class="table table-striped table-condensed" id="mytable1">
                    <thead>
                        <tr>
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
                            echo '<td>'.$row1->userid.'</td>';
                            echo '<td>'.$row1->other_name.'</td>';
                            echo '<td>'.$row1->surname.'</td>';
                            echo  '<td>';?>
                            <button class="btn btn-info btn-xs"  onclick="viewrecomd('<?php echo $row1->userid;?>')" data-toggle="modal" data-target="#viedeprec">
                               View recommendation
                            </button>
                                   <?php
                            echo '</td></tr>';
                        }
                    }

                    ?>
                </table>
            </div>
            
            <div class="criteria in tab-pane <?php if(isset($view)){echo'active';}?>">
                <?php
                $this->db->select('admision_criteria');
                $crquery = $this->db->get('tb_system_setting');
                if($crquery->num_rows()>0){
                    $exist=TRUE;
                }
                
                ?>
                <div class="panel-body">
                             <?php echo form_open_multipart('department_Coordinator/do_upload');?>
                          <table class="table">
                              <tr>
                                 <td>
                                     <?php if(isset($error)){echo '<div class="error">'.$this->upload->display_errors('<p>', '</p>').'</div>';}?>
                                     <input type="file" name="userfile" size="40" /></td>
                                 <td>

                                     <button type="submit" class="btn btn-info btn-xs">
                                         <span class="glyphicon glyphicon-circle-arrow-up"></span>
                                         <?php
                                         if(isset($exist)){
                                           echo 'Change admission criteria file'; 
                                         }  else {
                                          echo 'Upload file';   
                                         }
                                         ?>
                                     </button>

                                 </td>
                              </tr>
                              </table>
                          <div class="success">
                              <?php if(isset($arra)){
                              echo '<div class="alert alert-success">'
                              . '<span class="glyphicon glyphicon-ok-sign"></span>'
                                      . $arra.'</div>';

                          }?></div>
                              </form>
                              <?php 
                              if(isset($exist)){
                              ?>
                              <table class="table">
                                  <tr>
                                      <td>
                                        View  Admission criteria file
                                      </td>
                                      <td>
                                        <?php
                                        foreach($crquery->result() as $cr){
                                            $crtfile=$cr->admision_criteria;
                                        }
                                        echo $crtfile;
                                        ?> 
                                      </td>
                                      <td>
                                          <button class="btn btn-xs btn-info">View</button> 
                                      </td>
                                  </tr>
                              </table>
                              <?php }?>
                      </div>
            </div>
    </div>
 <div class="modal fade" id="viedeprec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h6 class="modal-title" id="myModalLabel">Department Admission Recommendation</h6>
            </div>
              <div class="modal-body" id="recview">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        
  <script>
    function viewrecomd(id) {
   
        var url = "<?php echo site_url('department_Coordinator/viewRecomendation'); ?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            $('#recview').html(data);
        });
    }
</script>
<?php include_once 'footer.php';?>
