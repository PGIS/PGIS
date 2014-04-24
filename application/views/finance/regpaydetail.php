<div >
    <p>
      <div class="well well-sm">
            Registration fee detail for <strong><?php echo $title.' '.$sname.' '.$other_nam;?></strong>
            Reg #:<?php echo $regno;?>
     </div>  
    </p>
    <table class="table">
        <tr>
            <td>Recept Number/Transaction Id :</td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $rectno;?>" disabled></td>
        </tr>
        <tr>
            <td>payment date </td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $paytdate;?>" disabled></td>
        </tr>
        <tr>        <?php 
                        if($paymode=='Half semester'){
                            $amntrequired=$amntreq/2;
                        }elseif($paymode=='Full(Whole) year'){
                            $amntrequired=$amntreq;
                        }
                     ?>
            <td >Minimum amount required</td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $amntrequired;?>" disabled></td>
        </tr>
        <tr>
            <td >Amount Payed </td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $amountpaid;?>" disabled></td>
        </tr>
         <tr>
             <td colspan="2">Payment mode   <?php echo $paymode;?></td>
        </tr>
        <tr>
            <td>
                <p class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#<?php echo $rectno;?>">
                        <button class="btn btn-default">view Supporting Document</button>
                    </a>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="pull-right">
                  <button class="btn btn-success" onclick="tuitverifying('<?php echo $regno;?>','<?php echo $rectno;?>')">Accept</button>   
                  <button class="btn btn-warning" onclick="tutdenying('<?php echo $regno;?>','<?php echo $rectno;?>')">Deny</button> 
                </p>  
            </td>
        </tr>
    </table>
    <div class="modal fade" id="<?php echo $rectno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h6 class="modal-title" id="myModalLabel">Recept number :<?php echo $rectno;?>:issue date :<?php echo $paytdate;?></h6>
            </div>
            <div class="modal-body">
                <img src="<?php echo $filname;?>" alt="some_text">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
     </div>
</div>
