<div class="pays tab-pane <?php if(isset($active8)){echo 'active';}?>">
     <div class='pantop'><h4>Application fee payment details</h4></div>
     <div class="col-md-6 col-lg-push-3">
    <?php echo form_open_multipart('application/applifinance');?>
        <table class="table">
            <tr>
                <td colspan="2">
                    <p> Recept number:</p>
                    <?php echo form_error('receptno','<div class="error">','</div>');?>
                    <input  class="form-control" id="20" name="receptno"  autofocus
                            value="<?php if(isset($receptno)) echo $receptno;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Payment date:</p>
                    <?php echo form_error('paydate','<div class="error">' ,'</div>');?>
                    <input class="form-control datepicker" name="paydate"  
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
                    <div class="col-md-12">
                        <div class="col-md-6 pull-left">
                            <input class="subtn btn-primary" type="submit" name="back" value="Back">
                        </div> 
                        <div class="col-md-6 ">
                            <input class="subtn btn-primary" type="submit" name="save" value="Save">
                        </div> 
                    </div>
             </tr>
        </table>
    </form>
    </div>
</div>