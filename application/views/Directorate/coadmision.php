<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
         <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab">Unchecked Applications</a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab">Checked Applications</a></li>
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
                            echo site_url('directorPgis/applicant_details/'.$row->userid.'');
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
                          <th>Action</th>  
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
                               View Recommendation
                            </button>
                            <a href="<?php echo site_url('directorPgis/admit/'.$row1->userid.'');?>">
                                <button class="btn btn-xs btn-info">Admit</button>
                            </a> 
                            <a href="<?php echo site_url('directorPgis/pending/'.$row1->userid.'');?>">
                               <button class="btn btn-xs btn-warning">Don't Admit</button>
                            </a>
                              <?php
                            echo '</td></tr>';
                        }
                    }

                    ?>
           </table>
                
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
