<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted project</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied project</a></li>
        </ol>
        <div class="well-sm">
            <div class="pantop"><legend class="text-center text-justify text-info">Assigned Students</legend></div>
            <table class="table table-bordered table-striped">
                <?php if(isset($assigned)){
                 echo '<tr><th>REGISTRATION</th><th>FIRST NAME</th><th>LAST NAME</th><th>INTERNAL SUP</th><th>PROJECT TITLE</th><th>ACTION<b class="caret"></b></th></tr>';
                 foreach ($assigned->result() as $row){
                     echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.'</td><td>'.$row->other_name.'</td><td>'.$row->Internal_supervisor.'</td><td>'.$row->project_title.'</td><td>'.anchor('teaching/details/'.$row->registration_id,'Details').'</td></tr>';
                 }
                }  else {
                    echo '<p class="alert alert-danger">No records found.</p>'; 
                }?>
            </table>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>
