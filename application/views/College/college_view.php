<?php include_once 'Headerlogincollege.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-eye-close">Assigned</label></a></li>
            </ul>
            <div class="tab-content" style="display: block">
              <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of assigned internal examiner</p></legend></div>
                    <table class="table table-striped" id="mytablesa">
                        <thead>
                            <tr>
                                <th>REGISTRATION ID</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>INTERNAL EXAMINER</th>
                                <th>STATUS<b class="caret"></b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($query)){
                              foreach ($query->result() as $row1){
                               echo '<tr>'
                                       . '<td>'.$row1->registrationID.'</td>'
                                       . '<td>'.$row1->surname.'</td>'
                                       . '<td>'.$row1->other_name.'</td>'
                                       . '<td>'.$row1->internal_examiner.'</td>'
                                       . '<td>'.anchor('college/recent_detail/'.$row1->registrationID,'<button class="btn btn-primary btn-xs">Details</button>').'</td>'
                                   . '</tr>';
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

