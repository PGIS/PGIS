<?php include_once 'Headerloginsuper.php';?>
<div id="page-wrapper">
    <div class="span12">
        
        <div class="tab-content" style="display: block">
            <div class="in tab-pane active">
                <div class="col-lg-6">
                    <fieldset>
                        <div class="pantop"><legend style="padding-top: 30px;" class="text text-justify text-info"><p>Details For: <?php echo ''.$registrationID;?></p></legend></div>
                        <div>
                            <p class="alert alert-info">PROJECT TITLE</p>
                            <?php echo ''.$project_title;?>
                        </div>
                        <div>
                            
                            <p class="alert alert-warning">PROJECT DESCRIPTION</p>
                            <?php echo ''.$project_description;?>
                        </div>
                        <div><table class="table table-responsive">
                                <tr><td class="acpt1"><button class="btn btn-primary acpt">accept</button></td><td class="dnial"><button class="btn btn-danger dnial1">Reject</button></td></tr>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <div class="hd">
                    <div class="tr">
                    <div style="padding-top: 30px;"><table class="table"><tr><td class="text-success">Assign Internal and External Supervisors*</td></tr></table></div>
                    <?php echo form_open('supervisor/data_records');?>
                    <table class="table">
                        
                        <tr><td><label>Internal Supervisor</label></td><td><input type="text" class="form-control" name="int"></td></tr>
                        <tr><td><label>External Supervisor</label></td><td><input type="text" class="form-control" name="ext"></td></tr>
                        <tr><td><label>Comments</label></td><td><textarea class="form-control" name="cmt"></textarea></td></tr>
                        
                    </table>
                    <div><table class="table table-responsive">
                            <tr><td style="padding-left:350px;"><button class="btn btn-primary ass">assign</button></td></tr>
                        </table>
                   </div>
                    <?php echo form_close();?>
                    </div>
                    <div class="tr1">
                    <div style="padding-top: 30px;"><table class="table"><tr><td class="text-success">Comments to project title*</td></tr></table></div>
                    <table class="table">
                        <tr><td><label>Comments</label></td><td><textarea class="form-control" name="cmt"></textarea></td></tr>
                        <?php echo form_close();?>
                    </table>
                    <div><table class="table table-responsive">
                            <tr><td style="padding-left:300px;"><button class="btn btn-primary ">post comment</button></td></tr>
                        </table>
                   </div>
                    </div>
                    
                </div>
                    <div class="loading" style="padding-top: 100px;margin-left:150px;"></div>
                </div>
            </div>
            
                    <script>
                    $(document).ready(function(){
                        $('.ass').click(function(){
                            $('form').submit(function(event){
                                $('.loading').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
                                var formdata=$(this).serializeArray();
                                var path=$(this).attr('action');
                                $.ajax({
                                    url:path,
                                    type:"POST",
                                    data:formdata,
                                    success:function(d){
                                        $('.hd').hide();
                                        setTimeout(function(){
                                        $('.loading').html('<p class="alert alert-success">Successifly assigned.!</p>');
                                    },2000);
                                    }
                                });
                                event.preventDefault();
                            });
                            $('form').submit();
                        });
                    });
                    </script>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('.hd').hide();
        $('.acpt').click(function(){
            $('.dnial').hide('slow');
            $('.hd').show('slow');
            $('.acpt').fadeOut(1000);
            $('.tr1').hide();
        });
        $('.dnial1').click(function(){
            $('.acpt1').hide('slow');
            $('.hd').show('slow');
            $('.dnial').fadeOut(1000);
            $('.tr').hide();
        });
    });
</script>
<?php include_once 'footer.php';?>



