<div class="reff tab-pane ">
     <div class='pantop'><h4>Referees Details</h4></div>
    <p>Provide detail of three referees </p>
    <p>
        <table class="table table-striped">
             <?php echo form_open('application/referee_info');?>
             <tr>
                <td>Full Name:
                    <input type="text" name="nm" value="" class="form-control"></td>
                <td > Mobile phone Number:
                    <?php echo form_error('ad','<div class="error">', '</div>'); ?>
                    <input type="text" name="ad" value="" class="form-control">
                    Email Address:
                    <input type="text" name="em" value="" class="form-control">
                </td>
             </tr>
             <tr>
                <td>Full Name
                     <input type="text" name="nm1" class="form-control">
                </td>
                <td>Mobile phone Number:
                    <input type="text" name="ad1"  class="form-control">
                    Email Address:
                    <input type="text" name="em1" class="form-control">
                </td>
             </tr>
             <tr>
                <td>Full Name
                     <input type="text" name="nm2" class="form-control">
                </td>
                <td>Mobile phone Number:
                    <input type="text" name="ad2"  class="form-control">
                    Email Address:
                    <input type="text" name="em2" class="form-control">
                </td>
             </tr>
             
        </table>
         <input class="subtn" type="submit" name="save" value="Save">
         <input class="subtn" type="submit" name="save" value="Save and quit">
        </form>
    </p>
</div>