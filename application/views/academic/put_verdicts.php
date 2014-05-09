<?php include_once 'Headerloginsuper.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-11">
            <div class="well well-sm">
                <table width="100%"><tr><td><label>PROJECT TITLE: <?php echo ''.$project_title;?></label></td>
                        <td><label>REGISTRATION ID: <?php echo ''.$registration .' '.' (<i class="dts">'.$surname.'</i>)';?></label></td></tr></table>
            </div>
            <?php echo form_open('supervisor/forward/'.$id ,array('id'=>'ajax'));?>
            <table class="table table-condensed" id="tak">
                <tr><td class="dts">PRESENTATION DATE:</td><td><input type="text" name="prd" class="form-control datepicker" required></td></tr>
                <tr><td class="dts">VERDICTS</td><td><textarea name="content" id="content" cols="3s0" rows="5" required>
                         </textarea>
                         <script type="text/javascript">
                          CKEDITOR.replace( 'content' );
                           </script>
                           </td></tr>
                 <tr><td colspan="1"></td><td class="text-right"><button class="btn btn-primary btn-sm">submit</button></td></tr>
            </table>
            <?php echo form_close();?>
            <div class="loading"></div>
        </div>
</div> 
    <script>
        $('#ajax').submit(function(e){
           e.preventDefault();
          $('.loading').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
          var formdata= $(this).serializeArray();
          var url="<?php echo site_url('supervisor/forward/'.$id);?>";
          $.post(url,formdata,function(data){
              $('#tak').hide();
              setTimeout(function(){
                  $('.loading').html(data);
              },2000);
          });
        });
        $('.datepicker').datepicker();
    </script>
</div>
<?php include_once 'footer.php';?>

