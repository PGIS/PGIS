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
            if ($frlist->department == $this->session->userdata('mydepartment')) {
                echo '<tr>';
                echo '<td>' . $frlist->surname . ' ' . $frlist->other_name . '</td>';
                echo '<td>' . $frlist->registrationID . '</td>';?>
                <td><button 
                        onclick="<?php
                            if($info==='postponement'){
                                echo 'fetchRecorededPostp';
                            }elseif($info==='freezing'){
                                echo 'fetchRecorededFreezing';
                            }elseif ($info==='Discontinue') {
                                echo 'fetchRecorededDisco';           
                            }elseif ($info==='extension') {
                                echo 'fetchRecorededExte';       
                             }
                        ?>('<?php echo $frlist->registrationID; ?>')" class="btn btn-xs btn-info">View</button></td>
                <?php echo '</tr>';
            }
        }
        echo ' </tbody></table>';
    }  else {
         echo '<br><div class="alert alert-warning">No any record '.$info.' has been found</div>';
}
    ?>
</div><div class="col-md-6" id="viewrevnt">
                        
                    </div>
<script>
 
 $(document).ready(function(){ 
        $('#studentable2').dataTable();
    });
    
    
    function fetchRecorededPostp(id) {
    var url = "departStudentManage/fetchRecordedPost/" + id;
    $.get(url, function(data) {
        $('#viewrevnt').html(data);
    });
}
    function fetchRecorededExte(id) {
    var url = "departStudentManage/fetchRecordedExt/" + id;
    $.get(url, function(data) {
        $('#viewrevnt').html(data);
    });
}
    function fetchRecorededDisco(id) {
    var url = "departStudentManage/fetchRecordedDisco/" + id;
    $.get(url, function(data) {
        $('#viewrevnt').html(data);
    });
}
    function fetchRecorededFreezing(id) {
    var url = "departStudentManage/fetchRecordedFreez/" + id;
    $.get(url, function(data) {
        $('#viewrevnt').html(data);
    });
}

</script>