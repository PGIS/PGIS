<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12" style="margin-top: 50px;">
    <div class="col-lg-6">
        <div class="well-sm">
            <table class="table table-hover">
             <tr><td>REGISTRATION ID</td><td><?php echo ''.$registration;?></td></tr>
             <tr><td>FILE NAME</td><td><?php echo ''.  substr($document, 39);?></td></tr>
            </table>
            <button class="btn btn-success btn-xs"  onclick="recentdissertation(<?php echo $registration;?>)" data-toggle="modal" data-target="#taks">
                                    <span class="glyphicon glyphicon-edit"></span> Download recent dissertation </button>
            <div class="modal fade" id="taks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><?php echo ''.$registration;?></h6>
                        </div>
                        <div class="modal-body">
                            <table class=" table table-condensed table-striped" id="mytable3">
                                <thead><tr><th>FILE NAME</th><th>POSTED DATE</th><th>OPTION</th></tr></thead>
                                <tbody>
                                    <?php 
                                    $res=$this->db->get_where('tb_student_desert',array('registrationID'=>$registration,'read'=>'yes'));
                                    if($res->num_rows()>0){
                                        foreach ($res->result() as $row){
                                            echo '<tr><td>'.substr($row->document, 39).'</td><td>'.$row->submission_date.'</td><td>'.anchor('teaching/donforce/'.$row->registrationID,'<span class="glyphicon glyphicon-download-alt">Download</span>').'</td></tr>';  
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div id="dissert"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
   </div>
        <script>
        function recentdissertation(reg_id){
            var url="<?php echo site_url('teaching/details2');?>";
            var url2=url + '/'+reg_id;
            $.get(url2,function(data){
                $('#dissert').html(data);
            });
        }
        </script>
    <div class="col-lg-6">
        <legend><label>Supervisor Feedback</label></legend>
        <table class="table table-condensed">
            <?php echo form_open_multipart('teaching/comment/'.$id);?>
            <tr><td>Comments</td><td><label class="alert-warning"><?php echo form_error('com');?></label><textarea  class="form-control" name="com"></textarea></td></tr>
            <tr><td>Conclusion</td><td><label class="alert-warning"><?php echo form_error('desc');?></label><textarea class="form-control" cols="3" name="desc"></textarea></td></tr>
            <tr><td>Date</td><td><label class="alert-warning"><?php echo form_error('dtz');?></label><input class="form-control datepicker" name="dtz"></td></tr>
            <tr><td>Dissertation Document<label>(Option*)</label></td><td><input type="file" name="userfile" class="load"></td></tr>
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
