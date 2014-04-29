<div>
    <p>
        <div class="well well-sm">
            Application fee detail for <strong><?php echo $title.' '.$sname.' '.$other_nam;?></strong>
        </div>
    <table class="table">
        <tr>
            <td>Recept Number/Transaction Id :</td>
            <td>
                <p id="dtl"><?php echo $receptno;?></p>
            </td>
        </tr> 
         <tr>
            <td>payment date :</td>
            <td>
                <p id="dtl"><?php echo $paydate;?></p>
            </td>
        </tr> 
         <tr>
             <td>Required Amount</td>
             <td><?php if(strtolower($nationality)=='tanzanian'){
                echo '<p id="dtl">50000 Tsh</p></td>';
             }else{
                 echo '<p id="dtl">50 USD</p></td>';
             }
                 ?>
         </tr> 
         <tr >
             <td colspan="2">
                <a href="#" data-toggle="modal" data-target="#<?php echo $receptno;?>">
                    <button class="btn btn-default"> view Supporting Document</button>
                </a>
            </td>
         </tr>
         <tr>
             <td colspan="2" >
                 <p class="pull-right">
                     <a ><button class="btn btn-success" id="yes" onclick="verifying('<?php echo $id;?>')">Accept</button></a>    
                     <button class="btn btn-warning" onclick="denying('<?php echo $id;?>')">Deny</button> 
                 </p>
             </td>
         </tr>
    </table>
   
    <div class="modal fade" id="<?php echo $receptno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h6 class="modal-title" id="myModalLabel">Recept number :<?php echo $receptno;?>:issue date :<?php echo $paydate;?></h6>
            </div>
            <div class="modal-body">
                <img src="<?php echo $filename;?>" alt="some_text">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
     </div>

</div>