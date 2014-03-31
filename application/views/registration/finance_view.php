<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
              <li class="<?php if(isset($active)){ echo 'active';}?>">
                <a data-target=".home" data-toggle="tab">Registration Form</a>
              </li>
                <li class="<?php if(isset($active1)){ echo 'active';}?>">
                <a data-target=".course" data-toggle="tab">Finance</a>
              </li>
            </ul>
            <div class="tab-content" style="display:block">
                <div class="home in tab-pane <?php if(isset($active)){ echo 'active';}?>">
                    <div class="pantop"><h4>Complete the details*</h4></div>
                    <div class="col-md-5">
                        <table class="table table-striped table-hover">
                            <tr><td><label for="username">Username:</label></td><td></td></tr>
                            <tr><td><label for="regist">Registration ID:</label></td><td></td></tr>
                            <tr><td><label for="sex">Sex:</label></td><td></td></tr>
                            <tr><td><label for="college">College:</label></td><td></td></tr>
                            <tr><td><label for="dept">Department:</label></td><td></td></tr>
                        <tr><td><label for="course reg">Course registered:</label></td><td></td></tr>
                        </table>
                        <?php echo form_open('registration_page/student');?>
                        <label>Program details*</label>
                        <table class="table table-striped table-condensed">
                            <tr><td><label for="dob">Date of beginning:</label></td><td><input type="text" class="form-control" name="dob" required id="datepicker"></td></tr>
                            <tr><td><label for="doc">Date of completion:</label></td><td><input type="text" class="form-control" name="doc" required></td></tr>
                            <tr><td><label for="dor">Date of registration:</label></td><td><input type="text" class="form-control" name="dor" required></td></tr>
                        </table>
                        
                    </div>
                    <div class="col-md-7">
                        <label>Record of postponement/freezing/Extension*</label>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Postponement:</label></td><td><select name="post" class="form-control" required>
                                        <option id="cl3" ></option><option id="cl">1st postponement</option><option id="cl1">2nd postponement</option><option id="cl2">None</option>
                                    </select></td><td><table id="p" class="table table-condensed table-striped"><tr><td><label>Date:</label></td><td><input type="text" class="form-control" placeholder="dd-Mm-YYY"  name="dt"></td></tr></table>
                                    </td></tr>
                            <tr><td><label>Freezing:</label></td><td><select name="frz" class="form-control" required>
                                        <option id="pf0"></option><option id="pf">1st freezing</option><option id="pf1">2nd freezing</option><option id="pf2">None</option>
                                    </select></td><td><table id="fd" class="table table-condensed table-striped"><tr><td><input type="text" class="form-control" placeholder="Date:frez" name="frzd"></td><td><input type="text" class="form-control" placeholder="Date:resu"  name="rsud"></td></tr></table></td></tr>
                            <tr><td><label>Extension:</label></td><td><select name="ext" class="form-control" required>
                                        <option id="ext0"></option><option id="ext">1st extension</option><option id="ext1">2nd extension</option><option id="ext2">3rd extension</option><option id="ext3">4th extension</option><option id="ext4">None</option>
                                    </select></td><td><table id="exd" class="table table-condensed table-striped"><tr><td><input type="text" class="form-control" placeholder="Date:ext"  name="exdate"></td><td><input type="text" class="form-control" placeholder="Month(perd)" name="period"></td></tr></table></td></tr>
                        </table>
                        <label>Fees*</label>
                        <table class="table table-condensed table-striped">
                            <tr><td><label>Registration fees:</label></td><td><select name="reg_fees" class="form-control" required>
                                        <option id="yes"></option><option id="yes1">Year 1</option><option id="yes2">Year 2</option><option id="yes2">Year 3</option><option id="yes4">Year 4</option>
                                    </select></td><td><table id="ye" class="table table-condensed table-striped"><tr><td><input type="text" class="form-control" placeholder="Amount" required name="amnt"></td><td><input type="text" class="form-control" placeholder="ReceiptNo" required name="rescpt"></td></tr></table></td></tr> 
                            <tr><td><label>Studentship fees:</label></td><td><select name="stdship" class="form-control" required>
                                        <option id="jm"></option><option id="jm1">Year 2</option><option id="jm2">Year 3</option><option id="jm3">Year 4</option>
                                    </select></td><td><table id="hu" class="table table-condensed table-striped"><tr><td><input type="text" class="form-control" placeholder="Amount" required name="amnt1"></td><td><input type="text" class="form-control" placeholder="ReceiptNo" required name="rescpt1"></td></tr></table></td></tr> 
                        </table>
                    </div>
                    <table class="table table-condensed table-striped"><tr><td><input type="submit" class="btn btn-info" value="save" name="save"></td><td align="right"><input type="submit" class="btn btn-info" value="save and submit" name="savbm"></td></tr></table>
                    <?php echo form_close();?>
                </div> 
            
          <div class="course in tab-pane <?php if(isset($active1)){ echo 'active';}?>">
        <div class="pantop"><h4>Complete registration:</h4></div>
        <?php if(!empty($result)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result.'</strong></p>
        </div>
            </div>';}?>
        <?php if(!empty($results)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-danger"><strong style="margin-left:80px">'.$results.'</strong></p>
        </div>
            </div>';}?>
        <div class="col-md-9" style="margin-left:60px;">
       <p>
        <div class="tbs">
            <?php echo form_open_multipart('finance_page/finance');?>
            <label for="registration">Registration ID*</label>
            <font class="alert-danger"><?php echo form_error('regist_id');?></font>
            <input type="text" name="regist_id" class="form-control" required autofocus>
            <label for="finance">Finance ID*</label>
            <font class="alert-danger"><?php echo form_error('finance_id');?></font>
            <input type="text" name="finance_id" class="form-control" required autofocus>
            <label for="payment">Payment No.*</label>
            <font class="alert-danger"><?php echo form_error('pay_no');?></font>
            <input type="text" name="pay_no" class="form-control" required autofocus>
            <label for="payment_det">Payment Details*</label>
            <font class="alert-danger"><?php echo form_error('pay_details');?></font>
            <select name="pay_details" class="form-control" required>
                <option valu="0"></option>
                <option valu="1">Application fees</option>
                <option valu="2">Tuition fees</option>
                <option valu="3">Instructors payment</option>
                <option valu="4">Disbursement</option>
            </select>
            <label for="amount">Amount*</label>
            <font class="alert-danger"><?php echo form_error('amount');?></font>
            <input type="text" name="amount" class="form-control" required autofocus>
            <label for="dop">Date of payment*</label>
            <font class="alert-danger"><?php echo form_error('date_payment');?></font>
            <input type="text" name="date_payment" class="form-control" required>
            <label for="sup_doc">Upload supporting doc*</label>
            <input type="file" name="image" class="form-control" required>
            <input type="submit" value="submit" class="btn btn-primary" name="sb">
        </p>
    </div>
        </div>
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
    $("#pf2").click(function(){
        $("#fd").hide();
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
    $("#ext4").click(function(){
        $("#exd").hide();
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
</script>

<?php include_once 'footer.php';?>