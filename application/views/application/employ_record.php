<div class="emprecod tab-pane <?php if(isset($active3)){echo 'active';}?>">
        <div class='pantop'><h4>Employment Record</h4></div>
        <p>
           <table class="table table-striped">
            <?php echo form_open('application/employement'); ?>
                <tr>
                     <td >Institution (Current Employer)
                      <?php echo form_error('current_employer','<div class="error">', '</div>'); ?>
                
                            <textarea  name="current_employer" class="form-control"><?php display_input('current_employer',$employer);?></textarea>
                        
                     </td>
                     <td >Position
                      <?php echo form_error('position','<div class="error">', '</div>'); ?>
                         <div><input name="position" type="text" class="form-control"
                         value="<?php display_input('position',$position);?>"></div>
                     </td>
                </tr>
                <tr>
                    <td>From:
                      <?php echo form_error('from','<div class="error">', '</div>'); ?>
                        <p><input name="from" type="text" id="datepicker" class="form-control"
                        value="<?php display_input('from',$dof);?>"></p>
                    </td>
                    <td>To:<?php echo form_error('to','<div class="error">', '</div>'); ?>
                        <p><input name="to" type="text" id="datepicker" class="form-control"
                        value="<?php display_input('to',$dot);?>"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>Nature of Work (Responsibilities) (You may use a separate sheet).
                        <div><?php echo form_error('responsbility','<div class="error">', '</div>'); ?>
                            <textarea name="responsbility" class="form-control"><?php display_input('responsbility',$responsibility);?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                   <td colspan="2">
                            <p>If you are admitted into our Postgraduate Programme,
                            do you think your employer will release you?(choose one)</p> 
                            <p>Yes       <input name="empp" type="radio"value="yes" checked=''> If Yes provide evidence.</p>
                            <p>No        <input name="empp" type="radio"value="no"></p>
                            
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
                    <td> <input class="subtn btn-primary" type="submit" name="skip" value="Skip this part"></td>
                </tr>
           </table>
           
        </form>
        </p>
</div>