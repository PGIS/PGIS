<div class="pays tab-pane <?php if(isset($active8)){echo 'active';}?>">
     <div class='pantop'><h4>Application fee payment details</h4></div>
     <div class="col-md-6 col-lg-push-3">
    <?php echo form_open_multipart('application/applifinance');?>
        <table class="table">
            <tr>
                <td colspan="2">
                    <p> Recept number:</p>
                    <input  class="form-control" id="20" name="receptno" required autofocus
                            value="<?php if(isset($receptno)) echo $receptno;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Payment date:</p>
                    <input class="form-control" name="paydate" required 
                           value="<?php if(isset($paydate)) echo $paydate;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><p>supporting Document <span name="flname"></span></p>
                    <?php if(isset($uperror)){echo '<div class="error">'.$uperror.'</div>';}?>
                <input type="file" name="userfile" size="20" >
                </td>
            </tr>
            <tr>
                <td>
                    <input class="subtn btn-primary" type="submit" name="save" value="Save"></td>
                
             </tr>
        </table>
    </form>
    </div>
</div>