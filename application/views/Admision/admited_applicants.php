<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    
    <div class="well well-sm">Admitted applicants</div>
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
                echo  '<td><a href="'.site_url('admision/admit/'.$row->userid).'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus">admission letter</span></a></td>';
                echo '</tr>';
            }
        }
      
        ?>
    </table>
    </div>
        
</div>

<?php include_once 'footer.php';?>
