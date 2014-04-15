<?php
    $myarray = array(
        'application_id' =>$regid,
        'payment_details'=>$se
    );
    $mydetail = $this->db->get_where('tb_finance',$myarray);
    if($mydetail->num_rows()>0){
        $paidammount=0;
        foreach ($mydetail->result() as $fndetail){
          ?>

<table class="table table-striped cont"> 
    <tr><td class="success" ><b>Issue date/ Payment Date</b></td>
        <td class="success"><b><?php echo ' ' . $fndetail->date_payment; ?></b></td>
    </tr>
    <tr>
        <td><label class="dts">Academic Year </label></td>
        <td><b><?php echo ' ' . $fndetail->academic_year; ?></b></td>
    </tr>
    <tr>
        <td><strong class="dts">Registration Fees For</strong></td>
        <td><b><?php echo ' ' . $fndetail->payment_details; ?></b></td></tr>
    <tr>
        <td><strong class="dts">Registration Fees Amount</strong>
        </td><td><b><?php echo' ' .$fndetail->amount_paid ?></b></td>
    </tr>
    <tr>
        <td><strong class="dts">Registration Fees Receipt</strong></td>
        <td><b><?php echo ' ' . $fndetail->receipt_no; ?></b></td>
    </tr>
    <tr>
        <td><strong class="dts">Payment Mode</strong></td>
        <td><b><?php echo ' ' . $fndetail->mode_payment; ?></b></td>
    </tr>
    
    
    <tr><td><strong class="dts">Payment status</strong></td>
        <td>
            <?php if($fndetail->regstatus=='rejected'){
                echo '<b class="alert-danger">Can not be verified(wrong information)*please repeat</b>';
            }elseif($fndetail->regstatus=='accepted'){
                 echo '<b class="alert-success">Verified (Valid)</b>';
            }  else {
                echo '<b class="alert-warning">Not yet verified</b>';
            } ?></td>
    </tr>
    <tr>
        <td>Preview supporting Document</td>
        <td>
            <a data-toggle="modal" href="#<?php echo $fndetail->receipt_no; ?>" style="color:white;" class="btn btn-primary btn-large">
                View</a>
            <div class="modal fade" id="<?php echo $fndetail->receipt_no; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h6 class="modal-title" id="myModalLabel">image</h6>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo '' . $fndetail->suporting_doc; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
      <?php
      $paidammount +=$fndetail->amount_paid;
      $Required=$fndetail->amount_required;
        }
        echo ''
        . '<tr><td><strong class="alert-danger">Outstanding Fees</strong></td>'.
        '<td><b class="alert-danger">'.($Required- $paidammount).'</b></td>'.
    '</tr>';
    }  else {
       echo '<div class="alert alert-warning"><p><span class="glyphicon glyphicon-exclamation-sign"></span> No Any information found</p></div>';
}
?>
</table> 