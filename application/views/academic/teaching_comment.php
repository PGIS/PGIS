<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12" style="margin-top: 50px;">
    <div class="col-lg-6">
        <div class="well-sm">
            <table class="table table-hover">
             <tr><td>REGISTRATION ID</td><td><?php echo ''.$registration;?></td></tr>
             <tr><td>FILE NAME</td><td><?php echo ''.  substr($document, 39);?></td></tr>
            </table>
            <a class="btn btn-primary" data-toggle="modal" data-target="#taks">View</a>
            <div class="modal fade" id="taks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><?php echo substr($document, 39);?></h6>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo $document;?>" alt="some_text">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
   </div>
    <div class="col-lg-6">
        <legend><label>Supervisor Feedback</label></legend>
        <table class="table table-condensed">
            <?php echo form_open('teaching/comment/'.$id);?>
            <tr><td>Where to change</td><td><label class="alert-warning"><?php echo form_error('com');?></label><input type="text" class="form-control" name="com"></td></tr>
            <tr><td>Description</td><td><label class="alert-warning"><?php echo form_error('desc');?></label><textarea class="form-control" cols="3" name="desc"></textarea></td></tr>
            <tr><td>Date</td><td><label class="alert-warning"><?php echo form_error('dtz');?></label><input class="form-control datepicker" name="dtz"></td></tr>
            <tr><td></td><td><button class="btn btn-primary">comment</button></td></tr>
            <?php echo form_close();?>
        </table>
        <div><?php if(!empty($success)){ echo $success;}?></div>
    </div>
    </div>
    <script>
        $('.datepicker').datepicker();
    </script>
 </div>
<?php include_once 'footer.php';?>
