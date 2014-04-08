<div class="pays tab-pane <?php if(isset($active8)){echo 'active';}?>">
     <div class='pantop'><h4>Application fee payment details</h4></div>
     <div class="col-md-6 col-lg-push-3">
    <?php echo form_open_multipart('application/applifinance');?>
        <table class="table">
            <tr>
                <td colspan="2">
                    <p> Recept number:</p>
                    <input  class="form-control" id="20" name="receptno" required autofocus>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Payment date:</p>
                    <input class="form-control" name="receptno" required>
                </td>
            </tr>
            <tr>
                <td colspan="2"><p>supporting Document</p>
                <input type="file" name="userfile" size="20" >
                </td>
            </tr>
            <tr>
                <td>
                    <input class="subtn btn-primary" type="submit" name="save" value="Save"></td>
                <td>
                   <input class="subtn btn-primary" type="submit" name="savcont" value="Save and continue">
                </td>
             </tr>
        </table>
    </form>
    </div>
</div>