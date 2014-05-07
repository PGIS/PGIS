<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted project</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied project</a></li>
        </ol>
        <div class="well-sm">
            <div class="pantop"><legend class="text-center text-justify text-info">submitted projects</legend></div>
            <table class="table table-bordered table-striped">
                <?php if(isset($error)){ echo $error;}?>
                <?php if(isset($record)){
                 echo '<tr><th>REGISTRATIONID</th><th>FIRST NAME</th><th>LAST NAME</th><th>NAME OF PROJECT</th><th>SUBMISSION DATE</th><th colspan="2" class="text-center">ACTION<b class="caret"></b></th></tr>';
                 foreach ($record->result() as $rec){
                     echo '<tr><td>'.$rec->registrationID.'</td><td>'.$rec->surname.'</td><td>'.$rec->other_name.'</td><td>'.substr($rec->document,39).'</td><td>'.$rec->submission_date.'</td><td><span class="glyphicon glyphicon-download-alt"></span>' .' '.anchor('teaching/download/'.$rec->id,'Download').'</td><td>'.anchor('teaching/view/'.$rec->id,'<span class="badge">View</span>').'</td></tr>';
                 }
                }  else {
                    echo '<p class="alert alert-info">No one has submitted yet.!</p>'; 
                }
                ?>
            </table>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>

