<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    
    <div class="well well-sm">Unchecked Applications</div>
    <div >
    <table class="table table-striped table-condensed">
        <tr>
            <th>Application id</th>
            <th>Username</th>    
            <th>Other names</th>
            <th>Sur name</th>
            <th>Action</th>
        </tr>
        
        <?php
        if(isset($query)){
            
          foreach ($query as $row){
                echo '<tr>';
                echo '<td>'.$row->app_id.'</td>';
                echo '<td>'.$row->userid.'</td>';
                echo '<td>'.$row->other_name.'</td>';
                echo '<td>'.$row->surname.'</td>';
                echo '<td id="tdbtn"><a href="';
                echo site_url('admision/applicant_details/'.$row->userid.'');
                echo '"><button class="btn-info subtn">Verify</button></a></td>';
                echo '</tr>';
            }
        }
      
        ?>
    </table>
        <?php  echo $pagination; ?>
    </div>
        
</div>

<?php include_once 'footer.php';?>
