<?php include_once 'Headerdephead.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab"><label class="glyphicon glyphicon-eye-open">Unchecked</label></a></li>
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-eye-close">Assigned</label></a></li>
            </ul>
            <div class="tab-content" style="display: block">
                <div class="unchecked in tab-pane <?php if(isset($active)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 3px;"><p>Students who needs Supervisor assignment</p></legend></div>
                    <table class="table table-striped table-hover" id="mytables">
                        <thead>
                            <tr>
                                <th>Registration number</th>
                                <th>Student Name</th>
                                <th>Project Tittle</th>
                                <th>Action<b class="caret"></b></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($records)){
                        foreach ($records->result() as $row){
                            if($row->department===$this->session->userdata('mydepartment')){
                            echo '<tr>'
                                    . '<td>'.$row->registration_id.'</td>'
                                    . '<td>'.$row->surname.' '.$row->other_name.'</td>'
                                    . '<td>'.$row->project_title.'</td>'
                                    . '<td><b class="glyphicon glyphicon-hand-right"></b>' .' '.anchor('headDepartmet/assign/'.$row->id, 'assign').'</td>'
                                . '</tr>';
                                }
                              }  
                             }
                             ?>
                        </tbody>
                    </table>
                    
                </div>
            
              <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of assigned supervisors</p></legend></div>
                    <table class="table table-striped" id="mytablesa">
                        <thead>
                            <tr>
                                <th>Registration number</th>
                                <th>Student Name</th>
                                <th>Project Tittle</th>
                                <th>Supervisor</th>
                                <th>Status<b class="caret"></b></th>
                            </tr></thead>
                        <tbody>
                            <?php if(isset($query)){
                              foreach ($query->result() as $row1){
                              if($row1->department===$this->session->userdata('mydepartment')){
                               echo '<tr>'
                                       . '<td>'.$row1->registration_id.'</td>'
                                       . '<td>'.$row1->surname.' '.$row1->other_name.'</td>'
                                       . '<td>'.$row1->project_title.'</td>'
                                       . '<td>'.$row1->Internal_supervisor.'</td>'
                                       . '<td class="text text-info"><b class="glyphicon glyphicon-ok"></b>assigned</td>'
                                     . '</tr>';
                              }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
        </div>    
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>

