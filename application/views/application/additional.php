<div class="addit tab-pane">
    <div class='pantop'><h4>Additional Details</h4></div>
    <p>
        <?php echo form_open('application/referee_info');?>
        <table class="table table-striped">
            <p>
            
          Eidence of spornsoship  
        </p>
            <tr><td>How do you intend to finance your studies?</</td>
                <td><input type="radio" name="chbx1" value="self">Self</td>
                <td><input type="radio" name="chbx1" value="self">Employer</td>
                <td><input type="radio" name="chbx1" value="self">Other(s) Specify<br>
                <textarea  class="form-control"></textarea></td>
                </td>
            </tr>
            <tr>
                <td colspan=2>Name of the Sponsor
                    <input type="text" name="namsponsor" class="form-control">
                </td>
                <td colspan=2>Address of the sponsor
                     <input type="text" name="addr_spons" class="form-control">
                </td>
            </tr>
            <tr>
                 <td colspan=4>
                    How did you find out about the Postgraduate Programmes at the
                    University of Dar es Salaam? Please tick all that applies.
                 </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="fprospec" value="Prospectus">Prospectus
                </td>
                <td>
                    <input type="checkbox" name="feduca" value="Education/Trade Fair">Education/Trade Fair
                </td>
                <td>
                    <input type="checkbox" name="fwww" value="World Wide Web" >World Wide Web
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="fjournal" value="Advert in Newspaper/Journal">Advert in Newspaper/Journal
                </td>
                <td>
                    <input type="checkbox" name="funiver" value="University/College Careers Service">University/College Careers Service
                </td>
                <td colspan=2>
                    <input type="checkbox" name="fother">Other (please specify)
                    <textarea name="fother" class="form-control"></textarea>
                </td>
            </tr>
        </table>
        <input class="subtn" type="submit" name="save" value="Save">
         <input class="subtn" type="submit" name="save" value="Save and quit">
        </form>  
    </p>
</div>