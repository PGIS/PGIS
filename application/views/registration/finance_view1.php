<div class="col-md-12">
<?php
    $myarray = array(
        'application_id' =>$regid,
        'academic_year'=>$se
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
        <td><div class="dts">Academic Year </div></td>
        <td><?php echo ' ' . $fndetail->academic_year; ?></td>
    </tr>
    <tr>
        <td><div class="dts">Payment For</div></td>
        <td><?php echo ' ' . $fndetail->payment_details; ?></td></tr>
    <tr>
        <td><div class="dts"> Amount Payed</div>
        </td><td><?php echo' ' .$fndetail->amount_paid ?></td>
    </tr>
    <tr>
        <td><div class="dts"> Receipt number</div></td>
        <td><?php echo ' ' . $fndetail->receipt_no; ?></td>
    </tr>
    <tr>
        <td><div class="dts">Payment Mode</strong></div>
        <td><?php echo ' ' . $fndetail->mode_payment; ?></td>
    </tr>
    
    
    <tr><td><div class="dts">Payment status</strong></div>
        <td>
            <?php if($fndetail->regstatus=='rejected'){
                echo '<div class="alert-danger">Can not be verified(wrong information)*please repeat</div>';
            }elseif($fndetail->regstatus=='accepted'){
                 echo '<div class="alert-success">Verified (Valid)</div>';
            }  else {
                echo '<div class="alert-warning">Not yet verified</div>';
            } ?></td>
    </tr>
    <tr>
        <td>Preview supporting Document</td>
        <td>
            <a data-toggle="modal" href="#<?php echo $fndetail->receipt_no; ?>" style="color:white;" class="btn btn-primary btn-xs">
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
        if($fndetail->regstatus=='accepted'){
         $paidammount +=$fndetail->amount_paid;   
        }
      
      $Required=$fndetail->amount_required/4;
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
</div>
