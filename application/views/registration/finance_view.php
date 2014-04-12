<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
                <li class="<?php if(isset($active)){ echo'active';}?>">
                <a data-target=".home" data-toggle="tab">Registration Form</a>
              </li>
              <ul class="alert-info">
                  <li><label>Options Links</label></li></ul>
                <li class="<?php if(isset($active2)){ echo 'active';}?>">
                <a data-target=".course" data-toggle="tab">Postponement</a>
              </li>
              <li class="<?php if(isset($active3)){ echo 'active';}?>">
                <a data-target=".ready" data-toggle="tab">Freezing</a>
              </li>
              <li class="<?php if(isset($active4)){ echo 'active';}?>">
                <a data-target=".forum" data-toggle="tab">Extension</a>
              </li>
            </ul>
            <div class="tab-content" style="display:block">
                <div class="home in tab-pane <?php if(isset($active)){ echo 'active';}?>">
                    <div class="pantop"><h4>Complete the details*</h4></div>
                    <?php if(!empty($result)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result.'</strong></p>
        </div>
            </div>';}?>
                   <div class="col-md-7">
                        <?php echo form_open_multipart('finance_page/finance');?>
                        <label>Fees*</label>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Registration Fees For:</label></td><td><select name="reg_fees" class="form-control check" required>
                                        <option id="yes"></option><option id="yes1">Year 1</option><option id="yes2">Year 2</option><option id="yes3">Year 3</option><option id="yes4">Year 4</option>
                                    </select></td><td><table id="ye" class="table table-condensed table-striped"><tr><td><input type="text" class="form-control" placeholder="Amount" required name="amnt"></td><td><input type="text" class="form-control" placeholder="ReceiptNo" required name="rescpt"></td></tr></table></td></tr> 
                            <tr><td><label>Academic Year:</label></td><td><input type="text" name="acy" placeholder="2014/2015" class="form-control" required></td></tr> 
                        </table>
                        <table class="table">
                            <tr><td><label for="payment_det">Mode of Payment*</label>
                            <font class="alert-danger"><?php echo form_error('pay_mode');?></font>
                            <select name="pay_mode" class="form-control" required>
                                <option valu="0"></option>
                                <option valu="1">Half semester</option>
                                <option valu="2">Full(Whole) year</option>
                            </select></td></tr>
                            <tr><td><label for="dop">Date of payment*</label>
                            <font class="alert-danger"><?php echo form_error('date_payment');?></font>
                            <input type="text" name="date_payment" class="form-control datepicker" required></td></tr>
                            <tr><td><label for="sup_doc">Upload supporting doc*</label>
                                    <input type="file" name="userfile" class="form-control" required></td></tr></table><br>
                            <p align="right"><input type="submit" class="btn btn-info" value="submit" name="save" data-loading-text="loading..."></p>
                           <?php echo form_close();?>
                    </div>
                    
                </div>
              <div class="course in tab-pane <?php if(isset($active2)){ echo 'active';}?>">
              <div class="pantop"><h4>Request for Postponement:</h4></div>
        <?php if(!empty($result1)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result1.'</strong></p>
        </div>
            </div>';}?>
        <label>Want to postpone?*</label>
                    <?php echo form_open('registration_page/student');?>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Postponement:</label></td><td><select name="post" class="form-control" required autofocus>
                                        <option id="cl3"></option><option id="cl">1st postponement</option><option id="cl1">2nd postponement</option>
                                    </select></td><td><table id="p" class="table table-condensed table-striped">
                                            <tr><td><label>Date:</label></td><td><input type="text" class="form-control datepicker" placeholder="dd-Mm-YYY"  name="dt" required autofocus></td></tr>
                                            <tr><td><label>Reasons for postponement:</label></td><td><textarea name="rsp" required rows="2" class="form-control" placeholder="Type something here.."></textarea></td></tr>
                                        </table>
                                    </td></tr>
                        </table>
        <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
        <?php echo form_close();?>
    </div>
        <div class="ready in tab-pane <?php if(isset($active3)){ echo 'active';}?>">
        <div class="pantop"><h4>Request for Freezing:</h4></div>
        <?php if(!empty($result2)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result2.'</strong></p>
        </div>
            </div>';}?>
             <label>Want to freeze?*</label>
            <?php echo form_open('registration_page/freezing');?>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Freezing:</label></td><td><select name="frz" class="form-control" required>
                                        <option id="pf0"></option><option id="pf">1st freezing</option><option id="pf1">2nd freezing</option>
                                    </select></td><td><table id="fd" class="table table-condensed table-striped">
                                            <tr><td><input type="text" class="form-control datepicker" placeholder="Date:frez" name="frzd" required></td><td><input type="text" class="form-control datepicker" placeholder="Date:resu"  name="rsud" required></td></tr>
                                             <tr><td><label>Reasons for Freezing:</label></td><td><textarea name="rsf" required rows="2" class="form-control" placeholder="Type something here.."></textarea></td></tr>
                                        </table></td></tr>
                        </table>
        <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
        <?php echo form_close();?>
    </div>
        
       <div class="forum in tab-pane <?php if(isset($active4)){ echo 'active';}?>">
        <div class="pantop"><h4>Request for Extension:</h4></div>
        <?php if(!empty($result3)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result3.'</strong></p>
        </div>
            </div>';}?>
        <label>Want to extend?*</label>
             <?php echo form_open('registration_page/extension');?>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Extension:</label></td><td><select name="ext" class="form-control" required>
                                        <option id="ext0"></option><option id="ext">1st extension</option><option id="ext1">2nd extension</option><option id="ext2">3rd extension</option><option id="ext3">4th extension</option>
                                    </select></td><td><table id="exd" class="table table-condensed table-striped">
                                            <tr><td><input type="text" class="form-control datepicker" placeholder="Date:ext"  name="exdate" required></td><td><input type="text" class="form-control" placeholder="Month(perd)" name="period" required></td></tr>
                                            <tr><td><label>Reasons for Extending:</label></td><td><textarea name="rsex" required rows="2" class="form-control" placeholder="Type something here.."></textarea></td></tr>
                                        </table></td></tr>
                        </table>
        <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
        <?php echo form_close();?>
    </div>
        </div>
            </div>
    
</div>
        </div>
<script language="javascript">
$(document).ready(function(){
    $("#p").hide();
    $("#fd").hide();
    $("#exd").hide();
    $("#ye").hide();
    $("#hu").hide();
    $("#cl").click(function(){
       $("#p").show();
    });
    $("#cl1").click(function(){
      $("#p").show();  
    });
    $("#cl2").click(function(){
       $("#p").hide(); 
    });
    $("#cl3").click(function(){
       $("#p").hide(); 
    });
    $("#pf0").click(function(){
        $("#fd").hide();
    });
    $("#pf").click(function(){
        $("#fd").show();
    });
    $("#pf1").click(function(){
        $("#fd").show();
    });
    $("#ext0").click(function(){
        $("#exd").hide();
    });
    $("#ext").click(function(){
        $("#exd").fadeIn('4000');
    });
    $("#ext1").click(function(){
        $("#exd").show();
    });
    $("#ext2").click(function(){
        $("#exd").show();
    });
    $("#ext3").click(function(){
        $("#exd").show();
    });
    $("#yes").click(function(){
        $("#ye").hide();
    });
    $("#yes1").click(function(){
        $("#ye").show();
    });
    $("#yes2").click(function(){
        $("#ye").show();
    });
    $("#yes3").click(function(){
        $("#ye").show();
    });
    $("#yes4").click(function(){
        $("#ye").show();
    });
    $("#jm").click(function(){
        $("#hu").hide();
    });
    $("#jm1").click(function(){
        $("#hu").show();
    });
    $("#jm2").click(function(){
        $("#hu").show();
    });
    $("#jm3").click(function(){
        $("#hu").show();
    });
});
$('.datepicker').datepicker();
$('.check').keyup(function(){
    if($('.check').val()){
       $.ajax({
          type:'POST',
          url: '<?php echo base_url();?>index.php/finance_page/finance',
          data: 'name='+$('.check').val(),
          success: function(smg){
              if(smg===true){
                $('#yes1').hide();  
              }
          }
       }); 
    }
});
</script>

<?php include_once 'footer.php';?>
