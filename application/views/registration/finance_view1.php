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
        <div class="pantop"><h4>Payment Results</h4></div>
 
        <div class="col-md-6">
        <table class="table table-striped">
            <?php foreach ($records as $row){
                $data=$row->amount_required-$row->amount_paid;
             echo '<tr><td><strong class="dts">Application Name</strong>:<b>'.' '.ucfirst(strtolower(addslashes($row->registration_id))).'</b></td></tr>';
             echo '<tr><td><strong class="dts">Registration Fees</strong>:<b>'.' '.$row->payment_details.'</b></td></tr>';
             echo '<tr><td><strong class="dts">Registration Fees Amount</strong>:<b>'.' '.$row->amount_paid.'</b></td></tr>';
             echo '<tr><td><strong class="dts">Registration Fess Receipt</strong>:<b>'.' '.$row->receipt_no.'</b></td></tr>';
             echo '<tr><td><strong class="dts">Outstanding Fees</strong>:<b>'.' '.$data.'</b></td></tr>';
             echo '<tr><td><strong class="dts">Payment Mode</strong>:<b>'.' '.ucfirst(strtolower(addslashes($row->mode_payment))).'</b></td></tr>';
             echo '<tr><td><strong class="dts">Payment Date</strong>:<b>'.' '.$row->date_payment.'</b></td></tr>';
             echo '<tr><td><strong class="dts">Supported Document</strong>:<b>'.' '.ucfirst(strtolower(addslashes($row->suporting_doc))).'</b></td></tr>';
            }?>
        </table>
        </div>
        <div class="col-md-6">
            
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel">image</h6>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($records as $row){
                           echo' <img src="'.$row->suporting_doc.'" alt="some_text">';
                            }?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
         </div>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
            <a data-toggle="modal" href="#myModal" style="color:white;" class="btn btn-primary btn-large">View your document</a></div>
        <table class="table table-striped">
            <label>OPTIONAL CHOICES*</label>
            <?php foreach ($records as $res){
                echo '<tr><td></td><td></td></tr>';
            }?>
        </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>

