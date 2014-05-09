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
            <div class="pantop"><legend class="text-center text-justify text-info">Assigned Students</legend></div>
            <table class="table table-striped table-condensed" id="mytablet">
                <thead>
                    <tr>
                        <th>REGISTRATION</th>
                        <th>STUDENT NAME</th>
                        <th>PROJECT TITLE</th>
                        <th>ACTION<b class="caret"></b></th>
                    </tr>
                </thead>
                <tbody>
                 <?php if(isset($assigned)){
                 foreach ($assigned->result() as $row){
                     echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td>'
                             . '<td><button class="btn btn-success btn-xs"  onclick="viewdetail(\''.$row->registration_id.'\')" data-toggle="modal" data-target="#editModal">
                                    <span class="glyphicon glyphicon-send"></span> Detail
                                    </button></td></tr>';
                 }
                }  ?>
                </tbody>
            </table><div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Assigned Student Details</h4>
                            </div>
                            <div class="modal-body">
                                 <div class="succedited"></div>
                                <div id="details">
                              
                                </div>
                            </div>
                          </div>
                        </div>
                     </div>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>

