<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <p>Student(s) assigned to you</p>
    </div>
    <table class="table table-striped" id="external">
        <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DISSERTATION TITLE</th><th>EXTRA</th></tr></thead>
        <tbody>
            <?php
            if(isset($given)){
                foreach ($given->result() as $row){
                    echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td><td>'.anchor('internal/detail/'.$row->registration_id,'<button class="btn btn-info btn-xs">Details</button>').'</td></tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once 'footer.php';?>