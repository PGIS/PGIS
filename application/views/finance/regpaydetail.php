<div>
    <p>
      <div class="well well-sm">
            Registration fee detail for <strong><?php echo $title.' '.$sname.' '.$other_nam;?></strong>
            Reg #:<?php echo $regno;?>
     </div>  
    </p>
    <table class="table">
        <tr>
            <td>Recept Number/Transaction Id :</td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="" disabled></td>
        </tr>
        <tr>
            <td>payment date </td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="" disabled></td>
        </tr>
        <tr>
            <td >Minimum amount required</td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="comput" disabled></td>
        </tr>
        <tr>
            <td >Amount Payed </td>
            <td><input class="form-control" id="disabledInput" type="text" placeholder="" disabled></td>
        </tr>
         <tr>
             <td colspan="2">Payment mode</td>
        </tr>
        <tr>
            <td>
                <p class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#">
                        <button class="btn btn-default">view Supporting Document</button>
                    </a>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="pull-right">
                  <button class="btn btn-success">Accept</button>    
                  <button class="btn btn-warning">Deny</button>
                </p>  
            </td>
        </tr>
    </table>
</div>
