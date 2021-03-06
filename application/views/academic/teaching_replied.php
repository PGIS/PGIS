<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted dissertation</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied dissertation</a></li>
            <li><a href="<?php echo site_url('teaching/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
        <div class="well-sm">
            <div class="pantop"><legend class="text-center text-justify text-info">Replied students</legend></div>
            <table class="table table-striped" id="mytablet1">
                <thead><tr><th>REGISTRATION ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>NAME OF FILE</th><th>SUBMISSION DATE</th><th colspan="2" class="text-center">ACTION<b class="caret"></b></th></tr></thead>
                <tbody>
                <?php if(isset($replied)){
                 foreach ($replied->result() as $rec){
                     echo '<tr><td>'.$rec->registrationID.'</td><td>'.$rec->surname.'</td><td>'.$rec->other_name.'</td><td>'.substr($rec->document,39).'</td><td>'.$rec->submission_date.'</td><td>'.anchor('teaching/details2/'.$rec->registrationID,'<span class="badge">Recent documents</span>').'</td></tr>';
                 }
                }elseif (isset($sec)) {
                    foreach ($rec->result() as $row){
                        echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.'</td><td>'.$row->other_name.'</td><td>'.substr($row->document,39).'</td><td>'.$rec->submission_date.'</td><td>'.anchor('teaching/details2/'.$row->registrationID,'<span class="badge">Recent documents</span>').'</td></tr>';
                    }
}  
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>

