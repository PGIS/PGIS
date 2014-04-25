<?php include_once 'Headerlogincal.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="tab-content" style="display: block">
    <div class="col-lg-10">
    <ul class="nav nav-tabs nav-justified nav-tabs-justified">
        <li class="active"><a data-target=".project" data-toggle="tab"><label>Project</label></a></li>
        <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".comment" data-toggle="tab"><label>Posted comments</label></a></li>
        <li class="<?php if(isset($active2)){echo'active';}?>"><a data-target=".post" data-toggle="tab"><label>Post Progress</label></a></li>
    </ul>
        <div class="tab-content" style="display: blocks">
            <div class="project in tab-pane active">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class=" text text-center text-justify text-info">Project Proposal</legend></div>
                    <div class="load1"></div>
                    <?php echo form_open('project_page/project_insert',array('id'=>'form'));?>
                    <table class="table">
                        <tr><td><label>Project Title*</label></td><td><input type="text" name="prj" class="form-control crt"></td></tr>
                        <tr><td><label>Description*</label></td><td><textarea class="form-control crt1" cols="4"name="prd"></textarea></td></tr>
                        <tr><td><label>Internal Supervisor Email-Address*</label></td><td><input type="text" name="pis" class="form-control crt2"></td></tr>
                    </table> 
                    <div class="text-right"><button class="btn btn-primary td">submit</button></div>
                     <?php echo form_close();?>
                    <div class="load"></div>
                </fieldset>
            </div>
            <div class="comment in tab-pane <?php if(isset($active1)){echo'active';}?>">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class="text-center text-justify text-info">Comments</legend></div>
                    <table class="table table-bordered table-striped table-hover">
                        <?php if(isset($smg)){echo $smg;}?>
                    <?php if(isset($records)){
                           echo '<tr><th>INTERNAL SUP</th><th>EXTERNAL SUP</th><th>COMMENTS</th><th>STATUS<b class="caret"></b></th></tr>';
                              foreach ($records->result() as $row){
                              echo '<tr><td>'.$row->Internal_supervisor.'</td><td>'.$row->external_supervisor.'</td><td>'.$row->comments.'</td><td class="text text-info">'.$row->status.'</td></tr>';
                              }
                    }?>
                    </table>
                </fieldset>
            </div>
            <div class="post in tab-pane <?php if(isset($active2)){echo'active';}?>">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class="text text-justify text-primary">Send project progress</legend></div>
                    <div class="form">
                        <table class="table">
                            <?php echo form_open_multipart('project_page/project_progress')?>
                            <?php echo form_error('ext');?>
                            <tr><td><label>External supervisor</label></td><td><input type="text" class="form-control" id="disabledInput" value="<?php if(isset($external)){echo''.$external;}?>" disabled></td></tr>
                            <tr><td><label>Internal supervisor</label></td><td><input type="text" class="form-control" id="disabledInput" value="<?php if(isset($supervisor)){echo''.$supervisor;}?>" disabled></td></tr>
                            <tr><td><label>Submission date</label></td><td><input type="text" name="date_sub" class="form-control datepicker" id="tds"  ></td></tr>
                            <tr><td><label>Project Document</label></td><td><input type="file" name="userfile" class="load"></td></tr>
                            <tr><td colspan="1"></td><td align="right"><button name="btd" class="btn btn-primary btd">upload</button></td></tr>
                            <?php echo form_close();?>
                        </table>
                    </div>
                    <div id="loader"></div>
                </fieldset>
            </div>
            <script>
            $(document).ready(function(){
                $('.btd').click(function(){
                    $('form').submit(function(e){
                        var date=$('#tds').val();
                        if(date===''){
                            alert('Date is important');
                      33      return false;
                        }
                        $('#loader').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
                        var filedata=$(this).serializeArray();
                        var fileurl= $(this).attr('action');
                        $.ajax({
                            url:fileurl,
                            type:"POST",
                            data:filedata,
                            success:function(data){
                                $('.form').hide();
                                setTimeout(function(){
                                    $('#loader').html('<p class="alert alert-success">Thanks.!</p>');
                                },2000);
                           }
                        });
                        e.preventDefault();
                        e.unbind();
                    });
                    $('form').submit();
                });
            });
            </script>
</div>
</div>
</div>
<script>
    $('.datepicker').datepicker();
</script>
</div>
</div>
<script>
    $(document).ready(function(){
       $('.td').click(function(){
           
         $('form').submit(function(e){
             if($('.crt').val()===''||$('.crt1').val()===''||$('.crt2').val()===''){
                alert('Cant be Empty.!');
                return false;
             }
            $('.load').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
           var projectdata=$(this).serializeArray();
            var projecturl=$(this).attr('action');
            $.ajax({
                   url:projecturl,
                   type:"POST",
                   data:projectdata,
                   success:function(smg){
                      $('#form').hide();
                      setTimeout(function(){
                      $('.load').html('<p class="alert alert-success">Successilly posted..!</p>');
                  },2000);
                   },
                  error:function(smg){
                      $('.load').html('<p class="alert alert-danger">Failed</p>');
                  }
               }); 
           e.preventDefault();
           e.unbind();
         });
         $('form').submit();
       });
    });
</script>
<?php include_once 'footer.php';?>

