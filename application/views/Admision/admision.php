<?php include_once 'Headerlogin.php';?>

<div id="page-wrapper">
    
<<<<<<< HEAD
    <div><center><p></p></center></div>
    <button type="button" class="btn btn-default btn-lg btn-block">Received unchecked Applications</button>
    <div class="table-responsive">
    <table class="table table-striped  table-condensed">
        <tr>
            <th>Application id</th>
            <th>Username</th>
            <th>First name</th>
            <th>Other names</th>
            <th ><p align="center">Action</p></th>
        </tr>
        <tbody class="">
        
          </tbody>
=======
    <div class="well well-sm">Unchecked Applications</div>
    <div class="table-responsive">
    <table class="table table-striped  table-condensed">
        <tr>
            <th>Application id</th>
            <th>Username</th>    
            <th>Other names</th>
            <th>Sur name</th>
            <th ><p align="center">Action</p></th>
        </tr>
        
        <?php
        if(isset($query)){
          foreach ($query as $row){
                echo '<tr>';
                echo '<td>'.$row->app_id.'</td>';
                echo '<td>'.$row->userid.'</td>';
                echo '<td>'.$row->other_name.'</td>';
                echo '<td>'.$row->surname.'</td>';
                echo '<td><a href="';
                echo site_url('admision/applicant_details/'.$row->userid.'');
                echo '"><button class="btn-info btn-sm">Verify</button></a></td>';
                echo '</tr>';
            }
        }
        ?>
        
>>>>>>> origin/master
    </table>
    </div>
        
</div>

<?php include_once 'footer.php';?>
