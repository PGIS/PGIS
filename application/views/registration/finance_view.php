<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                <a data-target=".course" data-toggle="tab">Registration</a>
              </li>
            </ul>
<div class="tab-content" style="display: block;">
    <div class="course in tab-pane active">
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
            <input type="submit" value="submit" class="btn btn-primary">
        </p>
    </div>
            </div>
    
</div>
        </div>
      </div>
</div>

<?php include_once 'footer.php';?>