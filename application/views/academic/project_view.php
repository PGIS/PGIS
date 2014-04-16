<?php include_once 'Headerlogincal.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="tab-content" style="display: block">
    <div class="col-lg-10">
    <ul class="nav nav-tabs nav-justified nav-tabs-justified">
        <li class="active"><a data-target=".project" data-toggle="tab"><label>Project</label></a></li>
        <li><a data-target=".comment" data-toggle="tab"><label>Posted comments</label></a></li>
        <li><a data-target=".post" data-toggle="tab"><label>Post Progress</label></a></li>
    </ul>
        <div class="tab-content" style="display: blocks">
            <div class="project in tab-pane active">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class=" text text-center text-justify text-info">Project Proposal</legend></div>
                    <div class="load1"></div>
                    <?php echo form_open('project_page/project_insert',array('id'=>'form'));?>
                    <table class="table">
                        <tr><td><label>Project Title*</label></td><td><input type="text" name="prj" class="form-control"></td></tr>
                        <tr><td><label>Description*</label></td><td><textarea class="form-control" cols="4"name="prd"></textarea></td></tr>
                        <tr><td><label>Internal Supervisor Email-Address*</label></td><td><input type="text" name="pis" class="form-control" required></td></tr>
                    </table> 
                    <div class="text-right"><button class="btn btn-primary td">submit</button></div>
                     <?php echo form_close();?>
                    <div class="load"></div>
                </fieldset>
            </div>
            <div class="comment in tab-pane">
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
            <div class="post in tab-pane">
                <fieldset>
                    <div class="pantop"><legend style="padding-top: 20px;" class="text text-justify text-primary">Send project progress</legend></div>
                </fieldset>
            </div>
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
       $('.td').click(function(){
           
         $('form').submit(function(e){
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

