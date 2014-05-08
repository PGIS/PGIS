<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted project</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied project</a></li>
             <li><a href="<?php echo site_url('teaching/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
        <div class="well-sm">
            <div class="pantop"><legend class="text-center text-justify text-info">submitted dissertation</legend></div>
            <table class="table table-striped" id="mytablet2">
                <thead><tr><th>REGISTRATION ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>NAME OF UPLOADED FILE</th><th>SUBMISSION DATE</th><th colspan="1"></th><th>ACTION<b class="caret"></b></th></tr></thead>
                <tbody>
                <?php if(isset($record)){
                 foreach ($record->result() as $rec){
                     echo '<tr><td>'.$rec->registrationID.'</td><td>'.$rec->surname.'</td><td>'.$rec->other_name.'</td><td>'.substr($rec->document,39).'</td><td>'.$rec->submission_date.'</td><td>' .' '.anchor('teaching/download/'.$rec->id,'Download',array('class'=>'glyphicon glyphicon-download-alt')).'</td><td>'.anchor('teaching/view/'.$rec->id,'<span class="badge">View & comment</span>').'</td></tr>';
                 }
                }  
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php include_once 'footer.php';?>

