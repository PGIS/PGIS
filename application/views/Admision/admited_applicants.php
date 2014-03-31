<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    
    <div class="well well-sm">Admitted applicants</div>
    <div >
    <table class="table table-striped table-condensed">
       
        
        <?php
        if(isset($query)){
            echo "
           <tr>
            <th>Application id</th>
            <th>Username</th>    
            <th>Other names</th>
            <th>Sur name</th>
           </tr>";
          foreach ($query as $row){
                echo '<tr>';
                echo '<td>'.$row->app_id.'</td>';
                echo '<td>'.$row->userid.'</td>';
                echo '<td>'.$row->other_name.'</td>';
                echo '<td>'.$row->surname.'</td>';
                echo '</tr>';
            }
        }
      
        ?>
    </table>
      <?php  echo $pagination; ?>
    </div>
        
</div>

<?php include_once 'footer.php';?>
