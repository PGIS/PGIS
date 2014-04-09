<div>
    <p>
        <div class="well well-sm">
            Application fee detail for <strong><?php echo $title.' '.$sname.' '.$other_nam;?></strong>
        </div>
    </p>
    <p>Recept Number/Transaction Id :
        <input class="" id="disabledInput" type="text" placeholder="<?php echo $receptno;?>" disabled>
    </p>
    <p>payment date :<?php echo $paydate;?>
    <input class="" id="disabledInput" type="text" placeholder="<?php echo $paydate;?>" disabled>
    </p>
    <p>Required Amount is 20000/=</p>
    <p><a href="#" data-toggle="modal" data-target="#<?php echo $receptno;?>"><button class="btn btn-default">
             view Supporting Document</button></a><p>
    <p>
        <button class="btn btn-success">Accept</button>    
        <button class="btn btn-warning">Deny</button>
    </p>
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