<div class="col-md-6">
    <?php
    echo '<div class="well-sm alert-info">Student with '.$info.' record</div>';
    if ($myquer->num_rows()> 0) {
        
        echo
        '<table class="table" id="studentable2">
                                <thead>
                                   <tr>
                                        <th>Student Name</th>
                                        <th>Registration #</th>
                                        <th>View status</th>
                                   </tr>   
                                </thead>
                                <tbody>';
        foreach ($myquer->result() as $frlist) {
                echo '<tr>';
                echo '<td>' . $frlist->surname . ' ' . $frlist->other_name . '</td>';
                echo '<td>' . $frlist->registrationID . '</td>';
                echo '<td><button class="btn btn-xs btn-info">View</button></td>';
                echo '</tr>';
        }
        echo ' </tbody></table>';
    }  else {
         echo '<br><div class="alert alert-warning">No any record '.$info.' has been found</div>';
}
    ?>
</div>
<script>
 $(document).ready(function(){ 
        $('#studentable2').dataTable();
    });
</script>