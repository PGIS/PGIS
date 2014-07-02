<?php include_once 'Headerloginexternalsup.php';?>
<div id="page-wrapper">
    <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('externalSup');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('externalSup/project');?>">Submitted dissertation</a></li>
            <li><a href="<?php echo site_url('externalSup/replied');?>">Replied dissertation</a></li>
             <li><a href="<?php echo site_url('externalSup/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
    <div class="well well-sm">
        <p>Student(s) assigned</p>  
    </div>
    <div class="panel panel-default">
    <table class="table table-striped" id="supz">
        <thead class="alert-success"><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DISSERTATION TITLE</th><th>ACTION</th></tr></thead>
        <tbody>
            <?php
            if(isset($sup)){
                foreach ($sup->result() as $row){
                    echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td><td>'.anchor('externalSup/student/'.$row->id,'<button class="btn btn-success btn-xs"> Details</button>').'</td></tr>';
                }
            }
            ?>
        </tbody>
    </table>
    </div>
</div>

<?php include_once 'footer.php';?>
