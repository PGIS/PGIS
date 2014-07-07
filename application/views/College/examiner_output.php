<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="panel panel-default panel-group">
        <div class="panel panel-heading"><label class="text-center text-success">Examiners Feedback</label></div>
        <div class="panel panel-body">
            <ul class="nav nav-tabs">
                <li class="<?php if(isset($active)){ echo 'active';}?>"><a href="#internal" data-toggle="tab">Internal Examiner feedback</a></li>
                <li class="<?php if(isset($active1)){echo 'active';}?>"><a href="#extenal" data-toggle="tab">External Examiner feedback</a></li>
                <li class="<?php if(isset($active2)){ echo 'active';}?>"><a href="#grade" data-toggle="tab">Final grade</a></li>
            </ul>
            <div class=" tab-content" style="display:block;">
                <div class="in tab-pane <?php if(isset($active)){echo 'active';}?>" id="internal">
                    
                    <table class="table table-striped" id="internaz">
                        <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DOCUMENT</th><th>EXAMINER</th><th>ACTION</th><th>EXTRA</th></tr></thead>
                        <tbody>
                            <?php if(isset($internal)){
                            foreach ($internal->result() as $row){
                                if(substr($row->int_document, 39)){
                                echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.substr($row->int_document, 39).'</td><td>'.$row->internal_examiner.'</td>'
                                   . '<td>'.anchor('college_Coordinator/internaldownload/'.$row->int_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Downladfile</button>').'</td>'
                                    .'<td><button class="btn btn-warning btn-xs" onclick="viewInternalFd(\''.$row->int_id.'\')" data-target=".viewcomment" data-toggle="modal">view comments</button></td></tr>';
                                }  else {
                               echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.substr($row->int_document, 39).'</td><td>'.$row->internal_examiner.'</td>'
                                   . '<td> <p class="alert alert-warning"> No file attached</p></td>'
                                    .'<td><button class="btn btn-warning btn-xs" onclick="viewInternalFd(\''.$row->int_id.'\')" data-target=".viewcomment" data-toggle="modal">view comments</button></td></tr>';  
                            }
                            }
                            }?>
                        </tbody>
                    </table>
                    <div class="modal fade viewcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">Internal Examiner feedback</label></h6>
                        </div>
                        <div class="modal-body">
                            <div class="internalfd"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
                <div class="in tab-pane <?php if(isset($active1)){echo 'active';}?>" id="extenal">
                   <table class="table table-striped" id="externaz">
                       <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DOCUMENT</th><th>EXAMINER</th><th>ACTION</th><th>EXTRA</th></tr></thead>
                        <tbody>
                            <?php if(isset($external)){
                            foreach ($external->result() as $rows){
                                if(substr($rows->ext_document, 39)){
                                echo '<tr><td>'.$rows->registrationID.'</td><td>'.$rows->surname.' '.$rows->other_name.'</td><td>'.substr($rows->ext_document, 39).'</td><td>'.$rows->external_examiner.'</td>'
                                   . '<td>'.anchor('college_Coordinator/externaldownload/'.$rows->feed_id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></span> Downlad file</button>').'</td>'
                                        . '<td><button class="btn btn-warning btn-xs" onclick="viewExternalComment(\''.$rows->feed_id.'\')" data-target=".viewcommentext" data-toggle="modal">view comments</button></td></tr>';
                             }  else {
                               echo '<tr><td>'.$rows->registrationID.'</td><td>'.$rows->surname.' '.$rows->other_name.'</td><td>'.substr($rows->ext_document, 39).'</td><td>'.$rows->external_examiner.'</td>'
                                   . '<td><p class="alert alert-warning"> No file attached</p></td>'
                                       . '<td><button class="btn btn-info btn-xs" onclick="viewExternalComment(\''.$rows->feed_id.'\')" data-target=".viewcommentext" data-toggle="modal">view comments</button></td></tr>'; 
                            }
                            }
                            }?>
                        </tbody>
                    </table>
                    <div class="modal fade viewcommentext" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">External Examiner feedback</label></h6>
                        </div>
                        <div class="modal-body">
                            <div class="externalfd"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="in tab-pane <?php if(isset($active2)){ echo 'active';}?>" id="grade">
                    <div class=" col-lg-6">
                    <table class="table table-striped" id="gradz">
                        <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>ACTION</th></tr></thead>
                        <tbody>
                    <?php
                    if(isset($comb)){
                        foreach ($comb->result() as $rowz){
                            echo '<tr><td>'.$rowz->registration_fedID.'</td><td>'.$rowz->surname.' '.$rowz->other_name.'</td><td>'
                                    . '<div class="btn-group btn-group-xs">'
                                    . '<button class="btn btn-info btn-xs" data-toggle="dropdown">Final grade <span class="caret"></span></button>'
                                    . '<ul class="dropdown-menu" role="menu">'
                                    . '<li onclick="StudentGraduate(\''.$rowz->registrationID.'\')"><a href="#">Graduate</a></li>'
                                    . '<li onclick="StudentNotGraduate(\''.$rowz->registrationID.'\')"><a href="#">Not graduate</a></li>'
                                    . '</ul>'
                                    . '</div></td></tr>';  
                        }
                    }
                    ?>
                        </tbody>
                    </table>
                    </div>
                    <div class=" col-lg-6">
                        <div class="grads"></div>
                    </div>
                </div>
            </div>
        </div>
      <div class="panel-footer">
              <p class="text-center text-success">Present list of students</p>
       </div>
    </div>
</div>
<script>
    function viewInternalFd(id){
        var url="<?php echo site_url('college_Coordinator/viewInternalComment');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
           $('.internalfd').html(data); 
        });
    }
    function viewExternalComment(id){
      var url="<?php echo site_url('college_Coordinator/viewExternalfd');?>";
      var url2=url+'/'+id;
      $.get(url2,function(sms){
          $('.externalfd').html(sms);
      });
    }
    function StudentGraduate(id){
        $('.grads').html('<img src="<?php echo base_url('assets/img/load.gif');?>">');
        var url="<?php echo site_url('college_Coordinator/studentGrade');?>";
        var url2=url+'/'+id;
        $.get(url2,function(smz){
            setTimeout(function(){
            $('.grads').html(smz);
            },2000);
        });
    }
    function StudentNotGraduate(id){
        $('.grads').html('<img src="<?php echo base_url('assets/img/load.gif');?>">');
        var url="<?php echo site_url('college_Coordinator/studentNotGrade');?>";
        var url2=url+'/'+id;
        $.get(url2,function(smz){
            setTimeout(function(){
            $('.grads').html(smz);
            },2000);
        });
    }
</script>
<?php include_once 'footer.php';?>