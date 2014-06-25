<?php include_once 'Headerlogincollege.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="alert alert-info">
             Admission recommendation's for Applicants
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
   
        var url = "<?php echo site_url('college/viewRecomendation'); ?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            $('#recview').html(data);
        });
    }
</script>
<?php include_once 'footer.php';?>
