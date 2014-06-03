<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <center>Completing admission for
            <strong><?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?></strong>
        </center>
    </div>
    <div>
        <div class="col-md-10 cent">
            <table class="table">
                <tr>
                    <td>
                       
                        <button type="button" class="subtn btn-primary  btn-block"> Generated registration number for <?php echo $other_nam;?></button>
                    </td >
                    <td colspan="2">
                        <input class="form-control" id="disabledInput" type="text" 
                               placeholder="<?php 
                               $this->db->select('addmissionID');
                               $query = $this->db->get_where('tb_admision', array('app_id' => $appid));
                               foreach ($query->result() as $rw)echo $rw->addmissionID;
                               ?>" disabled>
                    </td>
                </tr>
                <?php if (isset($appsent)){echo "<tr><td><span class='alert-success'>".$appsent."</span></td></tr>";}?>
                <tr> 
       
                    <td>
                       <a href="<?php echo site_url('admision/creating_pdf/'.$userid)?>">Generating admission letter </a> 
                    </td>
                   
                       <?php
                        echo form_open('admision/sendadmission/'.$userid);
                       $map = directory_map('./attachments/admission_letter/');
                            $i=1;
                        foreach ($map as $value) {
                          if($value==$userid.'.pdf'){
                           echo "<td> $value</td>";
                          echo "<td><button type='submit' name='submit'>Send Admision latter</button></td>";
                        }}
                       ?> 
                    </form>
                </tr>
            </table>
          
        </div>
        
       <div class="col-md-10 cent">
            Send success Notification   
         <?php if (isset($sent)){
             
             echo "<span class='alert-success'>".$sent."</span>";}?>
            <table class="table">
                <?php echo form_open('admision/admit/'.$userid); ?>
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