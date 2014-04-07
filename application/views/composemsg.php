<?php 
if($this->session->userdata('user_role')=='Admision staff'){
      include_once 'Admision/Headerlogin.php';
    }elseif ($this->session->userdata('user_role')=='administrator') {
      include_once 'admin/Headerlogin.php';
    }else {
      include_once 'application/Headerlogin.php';
      }
?>
<div id="page-wrapper">
    <div class="col-md-11 cent">
        <button type="button" class="mybtn btn-primary">Sending messages to system users</button>
         <?php if (isset($sent)){
            echo "<span class='alert-success'>".$sent."</span>";}?>
            <table class="table">
                 <?php echo form_open('messages/send_to_email'); ?>
                <tr>
                    <td colspan="2">Short message description<?php echo form_error('subject','<div class="error">','</div>'); ?>
                        <input type="text" class="form-control" placeholder="Message Subject" name="subject" id='subject'>
                    </td>
                    
                </tr>
                
                <tr>
                    <td >To:<?php echo form_error('to','<div class="error">','</div>'); ?>
                        <input type="text" class="form-control" placeholder="Receiver" name="to">
                <?php  if(isset($toemail)){echo "<span class='alert-success'>".$toemail."</span>";}?>
                    </td>
                    <td>Choose receiver
                        <select class="form-control" >
                            <option></option>
                            <option>All Applicant</option>
                            <option>Applicants with un-submitted application</option>
                            <option>Applicant with incomplete registration</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label><input type="checkbox" name="tomail"> Send to email</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Massage body<?php echo form_error('msgbody','<div class="error">','</div>'); ?>
                        <textarea class="form-control" rows="4" name="msgbody"></textarea>
                    </td>
                </tr>
                <tr>
                     <td><input type="file" name="userfile" id="userfile" size="20" />
                      <div id="files"></div>
                     </td>
                    <td>Attachment</td>
                 
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-default"  name="send">Send</button></td>
                 </tr>
            </table>
            </form>
        </div>
</div>
<?php include_once 'include/footer.php';?>
