<div id="fndetail" class="col-lg-12">
    <div class="well-sm alert-info">
        Finance history for <?php echo $regno;?>
    </div>
    <div>
        <?php
        if($history->num_rows()>0){
            foreach ($history->result() as $accye){
         echo '<tr >
                  <td class="warning"><center><b>Academic year:'.$accye->academic_year.'</b></center></td>
               </tr>';
        
        $querystring = $this->db->get_where('tb_finance', array('registration_id' => $regno,'academic_year'=>$accye->academic_year));
        if ($querystring->num_rows() > 0) {
            $ammount=0;
            foreach ($querystring->result() as $detail) {
                ?>
                <table class="table">
                    <tbody>
                        
                        <tr>
                            <td colspan="2" class="warning">
                                Issue date : <?php echo $detail->date_payment; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Amount payed :<?php echo '<i id="dtl">'.$detail->amount_paid.'</i>'; ?></td>
                            <td>Recept no :<?php echo '<i id="dtl">'.$detail->receipt_no.'</i>'; ?></td>
                        </tr>
                        <tr>
                            <td>Payment mode :<?php echo '<i id="dtl">'.$detail->mode_payment.'</i>'; ?></td>
                            <td>Payment status :<?php echo '<i id="dtl">'.$detail->regstatus.'</i>'; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                if($detail->regstatus=='accepted'){
                    $ammount=$ammount+$detail->amount_paid;
                }
            }
            $outammount=$requiredAmnt-$ammount;
        }
        echo '<div class="well-sm alert-danger">
        Outstanding payment:In this academic year';
        if($outammount>0){
            echo '  <b>'.$outammount.'</b>';
        }  else {
            echo '<b>  Cleared</b>';
        }
       echo '</div>';     
    }
   
  }else{
       echo '<div class="well-sm alert-warning">
        No any Payment has been done so far
    </div>'; 
       echo '<div class="well-sm alert-danger">
            Outstanding payment:In this academic year <b>'.$requiredAmnt.'</b>
    </div>'; 
  }
        ?>
    </div>
    
     <?php
        
     ?>
</div>