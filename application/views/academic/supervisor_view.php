<?php include_once 'Headerloginsuper.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-11">
            <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" tab-toggle="tab"><label class="glyphicon glyphicon-eye-open">Unchecked</label></a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-eye-close">Assigned</label></a></li>
                <li class="<?php if(isset($active2)){echo'active';}?>"><a data-target=".pending" data-toggle="tab"><label class="glyphicon glyphicon-exclamation-sign">Conflict</label></a></li>
            </ul>
            <div class="tab-content" style="display: block">
                <div class="unchecked in tab-pane <?php if(isset($active)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of unassigned external and internal supervisors</p></legend></div>
                    <table class="table table-bordered table-striped table-hover">
                         <?php if(isset($records)){
                           echo'<tr><th>ID</th><th>REGISTRATION ID</th><th>FISRT NAME</th><th>LAST NAME</th><th>PROJECT TITLE</th><th>ACTION<b class="caret"></b></th></tr>';
                        foreach ($records->result() as $row){
                            echo '<tr><td>'.$row->id.'</td><td>'.$row->registration_id.'</td><td>'.$row->surname.'</td><td>'.$row->other_name.'</td><td>'.$row->project_title.'</td><td><b class="glyphicon glyphicon-hand-right"></b>' .' '.anchor('supervisor/assign/'.$row->id, 'assign').'</td></tr>';
                        }
                             }  else {
                                 echo '<p class="alert alert-danger">No record found..</p>';
                                }?>
                    </table>
                    
                </div>
            
              <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of assigned supervisors</p></legend></div>
                    <table class="table table-bordered table-striped">
                        <?php if(isset($query)){
                               echo '<tr><th>ID</th><th>REGISTRATION ID</th><th>FISRT NAME</th><th>LAST NAME</th><th>PROJECT TITLE</th><th>INTERNAL SUP</th><th>EXTERNAL SUP</th><th>STATUS<b class="caret"></b></th></tr>';
                              foreach ($query->result() as $row1){
                               echo '<tr><td>'.$row1->id.'</td><td>'.$row1->registration_id.'</td><td>'.$row1->surname.'</td><td>'.$row1->other_name.'</td><td>'.$row1->project_title.'</td><td>'.$row1->Internal_supervisor.'</td><td>'.$row1->external_supervisor.'</td><td class="text text-info"><b class="glyphicon glyphicon-ok"></b>assigned</td></tr>';
                              }
                        }  else {
                            echo '<p class="alert alert-danger">No record found..</p>';
                            }
                        ?>
                    </table>
                </div>
                <div class="pending in tab-pane <?php if(isset($active2)){echo 'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top:20px;">Conflict project Title</legend></div>
                    <table class="table table-bordered table-striped">
                        <?php if(isset($pending)){
                        echo '<tr><th>REGISTRATION ID</th><th>FISRT NAME</th><th>LAST NAME</th><th>PROJECT TITLE</th><th>STATUS<b class="caret"></b></th></tr>';
                         foreach ($pending->result() as $pend){
                             echo '<tr><td>'.$pend->registration_id.'</td><td>'.$pend->surname.'</td><td>'.$pend->other_name.'</td><td>'.$pend->project_title.'</td><td>'.$pend->status.'</td><tr>';
                         }
                        }  else {
                            echo '<p class="alert alert-danger">No record found..</p>';
                        }?>
                    </table>
                </div>
        </div>    
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>

