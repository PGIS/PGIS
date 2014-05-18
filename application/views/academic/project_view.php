<?php include_once 'Headerlogincal.php';?>
<div id="page-wrapper">
    <div class="span12">
    <div class="tab-content" style="display: block">
    <div class="col-md-12">
    <ul class="nav nav-tabs nav-justified nav-tabs-justified">
        <li class="<?php if(isset($active)){echo'active';}?>"><a data-target=".project" data-toggle="tab"><label>Project</label></a></li>
        <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".comment" data-toggle="tab"><label>Posted comments</label></a></li>
        <li class="<?php if(isset($active2)){echo'active';}?>"><a data-target=".post" data-toggle="tab"><label>Post Progress</label></a></li>
    </ul>
        <div class="tab-content" style="display: blocks">
            <div class="project in tab-pane <?php if(isset($active)){echo'active';}?>">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class=" text text-center text-justify text-info">Project Proposal</legend></div>
                    <div class="load1"></div>
                    <?php echo form_open('project_page/project_insert',array('id'=>'form'));?>
                    <table class="table">
                        <tr><td><label>Project Title*</label></td><td><font class="alert-danger"><?php echo form_error('prj');?></font><input type="text" name="prj" class="form-control crt"></td></tr>
                        <tr><td><label>Description*</label></td><td><font class="alert-danger"><?php echo form_error('prd');?></font><textarea class="form-control crt1" cols="4"name="prd"></textarea></td></tr>
                        <tr><td><label>Suggested Supervisor email*</label></td><td><font class="alert-danger"><?php echo form_error('pis');?></font><input type="text" name="pis" class="form-control crt2"></td></tr>
                    </table> 
                    <div class="text-right"><button class="btn btn-primary td">submit</button></div>
                     <?php echo form_close();?>
                    <div class="load"><?php if(!empty($pg)){ echo $pg;}?></div>
                </fieldset>
            </div>
            <br>
            <div class="comment in tab-pane <?php if(isset($active1)){echo'active';}?>">
                <div class=" tabcordion tabs-left tabbable">
                    <ul class=" nav nav-tabs nav-pills">
                        <li class="<?php if(isset($actived1)){echo'active';}?>"><a data-target=".after" data-toggle="tab">Project progress</a></li>
                        <li class="<?php if(isset($actived2)){echo'active';}?>"><a data-target=".during" data-toggle="tab"> Presentation Feedback</a></li>
                    </ul>
                    <div class=" tab-content" style="display:block">
                        <div class="after in tab-pane <?php if(isset($actived1)){echo'active';}?>">
                            <fieldset>
                                <div class="pantop"><legend style="padding-top:20px;" class=" text-center text-justify text-info">Project progress comments</legend></div>
                                <table class="table table-bordered tabs-left table-hover table-striped">
                                    <?php if(!empty($delete)){
                                        echo $delete;
                                    }  elseif(!empty ($delete1)) {
                                        echo ''.$delete1;
                                    }
                                    ?>
                                    <?php if(isset($after)){
                                        echo '<tr><th>POSTED DATE</th><th>COMMENTS</th><th>CONCLUSION</th><th>ACTION<b class="caret"></b></th></tr>';
                                        foreach ($after->result() as $aft){
                                            echo '<tr><td>'.$aft->presentation_date.'</td><td>'.$aft->comments.'</td><td>'.$aft->conclusion.'</td><td>'.substr($aft->document, 39).'</td><td>'.anchor('project_page/download/'.$aft->id ,'Download',array('class'=>'glyphicon glyphicon-download-alt')).'</td><td>'.anchor('project_page/delete_comments/'.$aft->registrationID,'<span class="badge">Delete</span>',array('onclick'=>"return confirm('Are you sure you want to delete this comments.?')")).'</td></tr>';
                                        }
                                    } else {
                                        echo '<p class="alert alert-warning">No comments present..!</p>';
                                    }
                                    ?>
                                    
                                </table>
                            </fieldset>
                        </div>
                        <div class="during in tab-pane <?php if(isset($actived2)){echo'active';}?>">
                            <fieldset>
                                <div class="pantop"><legend style=" padding-top: 20px;" class="text-center text-justify text-info">Verdicts posted</legend></div>
                                <table class=" table table-striped " id="mytablet">
                                    <thead>
                                        <tr>
                                            <th>Presentation date</th>
                                            <th>Presentation for</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($verdicts)){
                                         foreach ($verdicts->result()as $row){
                                             echo '<tr>'
                                            . '<td>'.$row->pr_date.'</td>'
                                            .'<td>'.$row->type.'</td>'
                                            . '<td><label class="btn btn-warning btn-xs">'.anchor('project_page/verdict_view/'.$row->ver_id,'<span class="glyphicon glyphicon-share"> view </span>').'</label></td>'
                                            . '</tr>'; 
                                         }
                                        }?>
                                    </tbody>
                                </table>
                            </fieldset>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="post in tab-pane <?php if(isset($active2)){echo'active';}?>">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class="text text-justify text-primary">Send project progress</legend></div>
                    <div class="form">
                        <div class="error"><?php if(!empty($error)){ 
                            echo $error;
                            }elseif (!empty ($data)) {
                                echo $data;
                            }
                            ?></div>
                        <table class="table">
                            <?php echo form_open_multipart('project_page/project_progress')?>
                            <?php echo form_error('ext');?>
                            <tr><td><label>Internal supervisor</label></td><td class="dts"><?php if(isset($internal)){echo''.$internal;}?></td></tr>
                            <tr><td><label>Submission date</label></td><td><input type="text" name="date_sub" class="form-control datepicker" id="tds" required ></td></tr>
                            <tr><td><label>Project Document</label></td><td><input type="file" name="userfile" class="load"></td></tr>
                            <tr><td colspan="1"></td><td align="right"><button name="btd" class="btn btn-primary btd">upload</button></td></tr>
                            <?php echo form_close();?>
                        </table>
                    </div>
                    <div id="loader"><?php if(!empty($smgsuc)){ echo $smgsuc;}?></div>
                </fieldset>
            </div>
</div>
</div>
</div>
<script>
    $('.datepicker').datepicker();
</script>
</div>
</div>
<?php include_once 'footer.php';?>

