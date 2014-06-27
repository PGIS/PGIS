<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
     <strong><?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?></strong> 
      fail to meet the admission criteria
    </div>
    <div>
        <div class="col-md-10 cent">
            
        </div>
        <div class="col-md-10 cent">
             
         <?php if (isset($sent)){
             
             echo "<span class='alert-success'>".$sent."</span>";}?>
            <table class="table">
                <?php echo form_open('directorPgis/rejectsms/'.$userid); ?>
                <tr>
                    <td colspan="2">Message Subject<?php echo form_error('subject','<div class="error">','</div>'); ?>
                        <input type="text" class="form-control" placeholder="Message Subject" name="subject">
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">To:<?php echo form_error('to','<div class="error">','</div>'); ?>
                        <input type="text" class="form-control" placeholder="Receiver" name="to"
                               value="<?php
                               if(isset($userid)){echo $userid;}
                               ?>"
                               >
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <label><input type="checkbox" name="tomail"> Send to email</label>
                        <?php 
                          if(isset($toemail)){
                              echo "<span class='alert-success'>".$toemail."</span>";
                          }elseif(isset($ntoemail)){
                               echo "<span class='alert-danger'>".$ntoemail."</span>";
                          }
                         ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Massage body<?php echo form_error('msgbody','<div class="error">','</div>'); ?>
                        <textarea class="form-control" rows="4" name="msgbody"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-default" name="send">Send</button></td>
                 </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>

