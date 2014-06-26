<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
         <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab">Admitted Applicants</a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".rejected" data-toggle="tab">Rejected Applicants</a></li>
         </ul>
        
        <div class="tab-content" style="display: block">
            <div class="unchecked in tab-pane <?php if(isset($active)){echo'active';}?>">
                <div class=" well-sm alert-info">Admitted applicants</div>
                <div >
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
                    if(isset($query)){

                      foreach ($query as $row){
                            echo '<tr>';
                            echo'<td><input type="checkbox" name="ckbx" class="checkbox"></td>';
                            echo '<td>'.$row->app_id.'</td>';
                            echo '<td>'.$row->userid.'</td>';
                            echo '<td>'.$row->other_name.'</td>';
                            echo '<td>'.$row->surname.'</td>';
                            echo  '<td><a href="'.site_url('directorPgis/admit/'.$row->userid).'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus">admission letter</span></a></td>';
                            echo '</tr>';
                        }
                    }

                    ?>
                </table>
              </div>
            </div>
             <div class="rejected in tab-pane <?php if(isset($active1)){echo'active';}?>">
                 <div class=" well-sm alert-warning">Rejected applicants</div>
                  <div >
                    <table class="table table-striped table-condensed" id="mytable1">
                    <thead>
                        <tr>
                          <th>Application id</th>
                          <th>Username</th>    
                          <th>Other names</th>
                          <th>Sur name</th>
                          <th>Action</th>  
                        </tr>
                    </thead>

                    <?php
                    if(isset($query2)){

                      foreach ($query2 as $row2){
                            echo '<tr>';
                            echo '<td>'.$row2->app_id.'</td>';
                            echo '<td>'.$row2->userid.'</td>';
                            echo '<td>'.$row2->other_name.'</td>';
                            echo '<td>'.$row2->surname.'</td>';
                            ?>
                           <td>
                            <button class="btn btn-info btn-xs"  onclick="viewrecomd('<?php echo $row2->userid;?>')" data-toggle="modal" data-target="#viedeprec">
                               View Recommendation
                            </button>
                           </td>
                            <?php
                           echo '</tr>';
                        }
                    }

                    ?>
                </table>
              </div>
            </div>
        </div>
    </div>   
</div>
<div class="modal fade" id="viedeprec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <center><h4 class="modal-title" id="myModalLabel">Admission Recommendations</h4></center>
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
   
        var url = "<?php echo site_url('directorPgis/viewRecomendation'); ?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            $('#recview').html(data);
        });
    }
 </script>
<?php include_once 'footer.php';?>
