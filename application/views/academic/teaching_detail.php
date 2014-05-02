<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted project</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied project</a></li>
        </ol>
        <div class="well-sm">
            <div class="pantop"><legend class="text-center text-justify text-info">RECENTLY POSTED PROJECT</legend></div>
            <table class="table table-bordered table-striped">
                <?php if(isset($look)){
                 echo '<tr><th>REGISTRATION</th><th>POSTED DATE</th><th>ACTION<b class="caret"></b></th></tr>';
                 foreach ($look->result() as $row){
                     echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->submission_date.'</td><td>'.anchor('teaching/donforce/'.$row->registrationID,'<span class="glyphicon glyphicon-download-alt">Download</span>').'</td></tr>';
                 }
                }  elseif(isset ($error)) {
                     echo $error;
                }?>
            </table>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>



