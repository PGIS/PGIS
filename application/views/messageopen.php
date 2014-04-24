<?php 
if($this->session->userdata('user_role')=='Admision staff'){
      include_once 'Admision/Headerlogin.php';
    }elseif ($this->session->userdata('user_role')=='administrator') {
      include_once 'admin/Headerlogin.php';
    }elseif ($this->session->userdata('user_role')=='Student') {
      include_once 'registration/Headerlogin.php';
    }else {
      include_once 'application/Headerlogin.php';
      }
?>
<div id="page-wrapper">
    <div class="col-md-3 smsmenu">
        <div class="list-group">
            <a href="<?php echo site_url('messages/unread');?>" class="list-group-item">Unread Messages</a>
            <a href="<?php echo site_url('messages');?>" class="list-group-item">all messages</a>
            <a href="#" class="list-group-item">Sent messages</a>
            <?php 
            if($this->session->userdata('user_role')!='applicant' && $this->session->userdata('user_role')!='Student'){
                echo '<a href="'.site_url('messages/create_message').'" class="list-group-item">Compose message</a>';
            }
            ?>
            
        </div >
    </div>
    <div class="col-md-9">
        <table class="table">
            <center><h4>Message detail</h4></center>
            <b><?php echo $subject?></b> 
        <tr>
            <td>Sent by:</td>
            <td>
                <div class="col-md-6"><?php echo $sender?></div>
            </td>
            
        </tr>
        
        <tr>
            <td colspan="2">
                <div class="pre"><?php echo $messabe_body?></div>
            </td>
            
        </tr>
        </table>
    </div>
</div>
<?php include_once 'include/footer.php';?>