<div class="home tab-pane">
     <div class='pantop'><h4>Personal informaton</h4></div>
    <p>
        <?php echo form_open('application/personal_info'); ?>
            <table class="table table-striped">
                <tr>
                    <td>Surname/Family Name<br>
                        <input name="surname" type="text" class="form-control">
                    </td>
                    <td >Surname/Family Name</br>
                        <input name="surname" type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                   <td>Title<br>
                        <?php echo form_error('','<div class="error">', '</div>'); ?>
                       <select class="form-control" name="title">
                           <option>Mr</option>
                           <option>Mrs</option>
                           <option>Miss</option>
                           <option>Ms</option>
                       </select>  
                    </td>
                   <td>Date of Birth<br>
                        <input name="datebirth" type="text" id="datepicker" class="form-control">
                   </td>
                </tr>
                <tr>
                    <td>Country of Birth
                        <?php echo form_error('coun_birth','<div class="error">', '</div>'); ?>
                       <input type="text" name="coun_birth" class="form-control">
                   </td>
                    <td>Nationality
                         <?php echo form_error('nation','<div class="error">', '</div>'); ?>
                          <div><input type="text" name="nation" class="form-control"></div>  
                        </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_error('landline','<div class="error">', '</div>'); ?>
                        <div>Landline Number<input type="text" name="landline" class="form-control"></div>
                        <?php echo form_error('mobile','<div class="error">', '</div>'); ?>
                        <div>Mobile Number<input type="text" name="mobile" class="form-control"></div>
                    </td>
                    <td >
                            <?php echo form_error('fax','<div class="error">', '</div>'); ?> 
                            <div >Fax Number<input type="text" name="fax" class="form-control"></div>
                            <?php echo form_error('email','<div class="error">', '</div>'); ?>
                            <div>e-mail Address<input type="text" name="email" class="form-control"></div>
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address.
                        <?php echo form_error('mobile','<div class="error">', '</div>'); ?>
                        <div><input name="perm_address" type="text" class="form-control"></div>
                    </td>
                    <td>
                            Disabilities/Special needs.<br>
                             <?php echo form_error('disab','<div class="error">', '</div>'); ?>
                            Yes <input name="disab" type="radio" value="yes" id="yes">
                            No <input name="disab" type="radio" value="no" id="no" checked="">
                            
                        </td>
                </tr>
                <tr>
                    <td colspan="3" id="text_area">
                            <div id="disabi">
                            Nature of Disability /special needs (if any).
                           <?php echo form_error('disab_nature','<div class="error">', '</div>'); ?>
                            <div><textarea name="disab_nature"></textarea></div>
                            </div>
                    </td>
                </tr>
            </table>
            <input class="subtn" type="submit" name="save" value="Save">
        </form>
    </p>
</div>