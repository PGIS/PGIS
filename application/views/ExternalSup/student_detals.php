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
            <table class="table table-condensed table-striped" id="send">
                <thead class="panel panel-heading alert-info"><tr><th>REGISTRATION ID</th><th>UPLOADED FILE</th><th>SUBMISSION DATE</th><th>ACTION</th><th>EXTRA</th></tr></thead>
                <tbody>
                    <?php if(isset($data)){
                        foreach ($data->result() as $row){
                            if($row->ext_status==='no'){
                       echo '<tr><td>'.$row->registrationID.'</td><td>'.substr($row->document, 39).'</td><td>'.$row->submission_date.'</td><td>'.anchor('externalSup/download/'.$row->st_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Download</button>').'</td>'
                               . '<td>'.anchor('externalSup/view/'.$row->st_id,'<span class="badge"> View & comment</span>').'</td></tr>';
                    }  else {
                       echo '<tr><td>'.$row->registrationID.'</td><td>'.substr($row->document, 39).'</td><td>'.$row->submission_date.'</td><td>'.anchor('externalSup/download/'.$row->st_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Download</button>').'</td>'
                               . '<td><span class="glyphicon glyphicon-ok"> commented</span></td></tr>'; 
                    }
                    }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>
