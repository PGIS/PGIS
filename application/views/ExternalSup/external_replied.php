<?php include_once 'Headerloginexternalsup.php';?>
<div id="page-wrapper">
    <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('externalSup');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('externalSup/project');?>">Submitted dissertation</a></li>
            <li><a href="<?php echo site_url('externalSup/replied');?>">Replied dissertation</a></li>
             <li><a href="<?php echo site_url('externalSup/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
    <div class="col-lg-11">
        <div class=" panel panel-success">
            <table class="table table-condensed table-striped" id="sendr">
                <thead class="panel panel-heading alert-info"><tr><th>REGISTRATION ID</th><th>UPLOADED FILE</th><th>SUBMISSION DATE</th><th>ACTION</th><th>EXTRA</th></tr></thead>
                <tbody>
                    <?php if(isset($data)){
                        foreach ($data->result() as $row){
                            
                       echo '<tr><td>'.$row->registrationID.'</td><td>'.substr($row->document, 39).'</td><td>'.$row->submission_date.'</td><td>'.anchor('externalSup/download/'.$row->id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Download</button>').'</td>'
                               . '</tr>';
                    }  
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>
