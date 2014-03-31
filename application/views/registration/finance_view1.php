<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
              <li class="active">
                  <a data-target=".home" data-toggle="tab">Registration summaries</a>
              </li>
            </ul>
<div class="tab-content" style="display: block;">
    <div class="course in tab-pane active">
    <div class="home in tab-pane <?php if(isset($active2)){echo'active';}?>">
        <div class="pantop"><h4>Payment Results</h4>
 </div>
        <div class="col-md-6">
        <table class="table table-striped">
            <?php foreach ($records as $row){
             echo '<tr><td>Application Name:<b>'.' '.ucfirst(strtolower(addslashes($row->app_id))).'</b></td></tr>';
             echo '<tr><td>Registration ID:<b>'.' '.$row->registration_id.'</b></td></tr>';
             echo '<tr><td>Finance ID:<b>'.' '.$row->finance_id.'</b></td></tr>';
             echo '<tr><td>Payment No:<b>'.' '.$row->payment_no.'</b></td></tr>';
             echo '<tr><td>Payment Details:<b>'.' '.ucfirst(strtolower(addslashes($row->payment_detail))).'</b></td></tr>';
             echo '<tr><td>Amount:<b>'.' '.$row->amount.'</b></td></tr>';
             echo '<tr><td>Payment Date:<b>'.' '.ucfirst(strtolower(addslashes($row->date_payment))).'</b></td></tr>';
             echo '<tr><td>Supported Document:<b>'.' '.ucfirst(strtolower(addslashes($row->name))).'</b></td></tr>';
            }?>
        </table>
        </div>
        <div class="col-md-6">
            <p class="btn btn-block btn-primary" align="center"><a href="<?php echo site_url('finance_page/displayImage');?>" style="color:white;">View your document</a></p>
        <table class="table table-striped">
        </table>
        </div>
          </div>
</div>
<?php include_once 'footer.php';?>

