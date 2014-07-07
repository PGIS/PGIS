<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="well well-sm"> Forward to Examiners</div>
    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><p class="btn btn-success">Forward Feedback to Examiners</p></div>
            <div class="panel-body">
                <?php if(isset($success)){ echo ''.$success;}?>
                <?php echo form_open_multipart('college_Coordinator/feedBackAttach/'.$registration_id);?>
                <?php 
                if(isset($forward)){
                    foreach ($forward->result() as $row){
                ?>
                <ul class="list-group">
                    <li class="list-group-item">Name of Student :<?php echo'<p class="pull-right text-info">'.$row->surname .' '.$row->other_name.'</p>';?></li>
                    <li class="list-group-item">Registration ID:<?php echo'<p class="pull-right text-info">'.$row->registrationID .'</p>';?></li>
                    <li class="list-group-item">Dissertation Title:<?php echo'<p class="pull-right text-info">'.$row->project_title .'</p>';?></li>
                    <li class="list-group-item">Programme Name:<?php echo'<p class="pull-right text-info">'.$row->program .'</p>';?></li>
                </ul>
                <?php
                }
                }?>
                <table class="table">
                    <tr><td>Attach file</td><td><?php if(isset($error)){    echo '<div class="error">'.$error.'</div>';}?><input type="file" name="userfile"></td></tr>
                    <tr><td></td><td><button class="btn btn-success btn-sm">Forward to examiners</button></td></tr>
                </table>
                <?php echo form_close();?>
                
            </div>
        </div>
    </div>
    
</div>
<?php include_once 'footer.php';?>