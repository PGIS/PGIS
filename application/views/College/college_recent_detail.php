<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-12">
            <?php
                $res=$this->db->select('*')->from('tb_project')->join('tb_student','tb_student.registrationID = tb_project.registration_id')
                        ->where(array('id'=>$recent))->get();
                if($res->num_rows()===1){
                    foreach ($res->result() as $row){
                    ?>
               <div class="alert alert-info">
                <p><label>Student Full name: <?php echo ''.$row->surname .' '.$row->other_name ;?>
                    </label><label class="text-primary pull-right">Registration #:<?php echo ''.$row->registration_id;?></label></p>
                <p><label>Department: <?php echo ''.$row->department;?></label></p>
                <p><label>Program:<?php echo ''.$row->program;?></label></p>
                <p><label>Dissertation Title:<?php echo ''.$row->project_title;?></label></p>
                <p><label>Internal supervisor:<?php echo ''.$row->Internal_supervisor;?></label></p>
               </div>
           <div class="col-md-6">
                <div class="well well-sm"><label>Student presentation feedback</label></div>
                <table class="table table-condensed table-striped">
                <?php
                $result=$this->db->select('*')->from('tb_verdicts')->join('tb_student','tb_student.registrationID = tb_verdicts.registrationId')
                        ->where(array('registrationId'=>$row->registration_id))->get();
                 if($result->num_rows()>0){
                     foreach ($result->result() as $ver){
                         echo '<tbody>'
                            . '<tr><td>'.$ver->level.'</td>'
                            . '<td>'.$ver->pr_date.'</td>'
                            . '<td>'.$ver->type.'</td>'
                            . '<td><button class="btn btn-success btn-xs" onclick="studentview(\''.$ver->ver_id.'\')" data-target="#student" data-toggle="modal"><span class="glyphicon glyphicon-share">'
                            . '</span>view</button></td><td>'.anchor('college_Coordinator/downloadpdf/'.$ver->ver_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt">Download</span></button>').'</td>'
                          . '</tr></tbody>';
                     } 
                 }  else {
                     echo '<p class="alert alert-warning">No comments present</p>'; 
                 }
                
                ?>
                </table>
                <div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">Student Presentation Details</label></h6>
                          </div>
                         <div class="modal-body">
                             <div class="comments"></div>
                         </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-6">
                <legend><label class="text-info">Submitted recent progress</label></legend>
                <table class="table" id="tz">
                    <?php
                    $rest=$this->db->select('*')->from('tb_student_desert')
                            ->where(array('read'=>'yes','registrationID'=>$row->registration_id))->get();
                    if($rest->num_rows()>0){
                        echo '<thead><tr><th>Posted date</th><th>Name of file</th><th><b class="caret"></b></th></tr></thead>';
                        foreach ($rest->result() as $ret){
                            echo '<tbody><tr><td>'.$ret->submission_date.'</td><td>'.substr($ret->document, 39).'</td>'
                                    . '<td>'.anchor('college_Coordinator/download/'.$ret->id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt">Download</span></button>').'</td></tr></tbody>'; 
                        }
                    }  else {
                        echo '<p class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> No recent uploads</p>'; 
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
                    }
         }
       ?>
</div>
<script>
 function studentview(id){
     var ulr="<?php echo site_url('college_Coordinator/details');?>";
     var ulr2=ulr + '/' +id;
     $.get(ulr2,function(data){
         $('.comments').html(data);
     });
 }
</script>
<?php include_once 'footer.php';?>

