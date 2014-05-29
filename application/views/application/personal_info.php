<div class="home tab-pane <?php if(isset($active2)){echo 'active';}?>">
     <div class='pantop'><h4>Personal information</h4></div>
    <p>
        <?php echo form_open('application/personal_info'); ?>
            <table class="table table-striped">
                <tr>
                    <td>Surname/Family Name<br>
                       <?php echo form_error('surname','<div class="error">', '</div>'); ?>
                        <input name="surname" type="text" class="form-control" id="4"
                        value="<?php display_input('surname',$sname);?>">
                    </td>
                    <td > Other Name's</br>
                        <?php echo form_error('other_name','<div class="error">', '</div>'); ?>
                        <input name="other_name" type="text" class="form-control" id="5"
                        value="<?php display_input('other_name',$other_nam);?>">
                    </td>
                </tr>
                <tr>
                   <td>Title<br>
                        <?php echo form_error('title','<div class="error">', '</div>'); ?>
                       <select class="form-control" name="title" id="6">
                           <option><?php display_input('title',$title);?></option>
                           <option>Mr</option>
                           <option>Mrs</option>
                           <option>Miss</option>
                           <option>Ms</option>
                       </select>  
                    </td>
                   <td>Date of Birth<br>
                        <?php echo form_error('datebirth','<div class="error">', '</div>'); ?>
                        <input name="datebirth" type="text" class="form-control datepicker" id="7"
                               value="<?php display_input('datebirth',$datebirth);?>">
                   </td>
                </tr>
                <tr>
                    <td>Country of Birth
                        <?php echo form_error('coun_birth','<div class="error">', '</div>'); ?>
                        <input type="text" name="coun_birth" class="form-control " id="8"
                       value="<?php display_input('coun_birth',$country);?>">
                   </td>
                    <td>Nationality
                         <?php echo form_error('nation','<div class="error">', '</div>'); ?>
                        <input type="text" name="nation" class="form-control" id="9"
                          value="<?php display_input('nation',$nationalt);?>">  
                        </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_error('landline','<div class="error">', '</div>'); ?>
                        <div>Landline Number<input type="text" name="landline" class="form-control"
                        value="<?php display_input('landline',$landlin);?>"></div>
                        
                        <div>Mobile Number
                        <?php echo form_error('mobile','<div class="error">', '</div>'); ?>
                            <input type="text" name="mobile" class="form-control" id="10"
                         value="<?php display_input('mobile',$mobil);?>"></div>
                    </td>
                    <td >
                        <div >Fax Number
                        <?php echo form_error('fax','<div class="error">', '</div>'); ?> 
                            <input type="text" name="fax" class="form-control"
                            value="<?php display_input('fax',$fax);?>">
                        </div>
                            
                            <div>e-mail Address
                            <?php echo form_error('email','<div class="error">', '</div>'); ?>
                                <input type="text" name="email" class="form-control" id="11"
                            value="<?php display_input('email',$email);?>">
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>Permanent Address.
                        <?php echo form_error('perm_address','<div class="error">', '</div>'); ?>
                        <div><input name="perm_address" type="text" class="form-control" id="12"
                        value="<?php display_input('perm_address',$perm_addres);?>"></div>
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
                            <div><textarea name="disab_nature" class="form-control"
                            value="<?php display_input('disab_nature',$disab_natur);?>"></textarea></div>
                            </div>
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
                     
                    </td>
                    <td>
                        <input class="subtn btn-primary" type="submit" name="savcont" value="Save and continue">
                    </td>
                </tr>
            </table>
           
        </form>
    </p>
</div>
