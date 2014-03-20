<div class="addit tab-pane <?php if(isset($active6)){echo 'active';}?>" >
    <div class='pantop'><h4>Additional Details</h4></div>
    <p>
        <?php echo form_open('application/addition');?>
        <table class="table table-striped">
            <p>
            
          Eidence of spornsoship  
        </p>
            <tr><td>How do you intend to finance your studies?</</td>
                <td><input type="radio" name="chbx1" value="self" checked=''
                  <?php display_checks('chbx1',$spon_mode,'self');?>>
                    Self</td>
                <td><input type="radio" name="chbx1" value="employer"
                <?php display_checks('chbx1',$spon_mode,'employer');?>>Employer</td>
                <td><input type="radio" name="chbx1" value="other"
                <?php display_checks('chbx1',$spon_mode,'other');?>>Other(s) Specify<br>
                <textarea  class="form-control"></textarea></td>
                </td>
            </tr>
            <tr>
                <td colspan=2>Name of the Sponsor
                 <?php echo form_error('namsponsor','<div class="error">', '</div>'); ?>
                    <input type="text" name="namsponsor" class="form-control"
                     value="<?php display_input('namsponsor',$spon_name);?>" >
                </td>
                <td colspan=2>Address of the sponsor
                 <?php echo form_error('addr_spons','<div class="error">', '</div>'); ?>
                     <input type="text" name="addr_spons" class="form-control"
                     value="<?php display_input('addr_spons',$spon_addr);?>">
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
                    <input type="checkbox" name="fprospec" value="Prospectus"
                   <?php display_checks('fprospec',$fprospec,'Prospectus');?> >Prospectus
                </td>
                <td>
                    <input type="checkbox" name="feduca" value="Education/Trade Fair"
                    <?php display_checks('feduca',$feduca,'Education/Trade Fair');?>>Education/Trade Fair
                </td>
                <td>
                    <input type="checkbox" name="fwww" value="World Wide Web"
                    <?php display_checks('fwww',$fwww,'World Wide Web');?>>World Wide Web
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="fjournal" value="Advert in Newspaper/Journal"
                    <?php display_checks('fjournal',$fjournal,'Advert in Newspaper/Journal');?>>Advert in Newspaper/Journal
                </td>
                <td>
                    <input type="checkbox" name="funiver" value="University/College Careers Service"
                    <?php display_checks('funiver',$funiver,'University/College Careers Service');?>
                    >University/College Careers Service
                </td>
                <td colspan=2>
                    <input type="checkbox" name="fother" value="Other"
                    <?php display_checks('fother',$fother,'Other');?>>Other (please specify)
                    <textarea name="fother" class="form-control"></textarea>
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
    </p>
</div>