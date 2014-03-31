<div class="reff tab-pane <?php if(isset($active5)){echo 'active';}?>">
     <div class='pantop'><h4>Referees Details</h4></div>
    <p>Provide detail of three referees </p>
    <p><?php
       if(isset($problem)){
         echo '<div class="alert alert-danger">'.$problem.'</div>';
       }
       ?>
    </p>
    <p>
        <table class="table table-striped">
             <?php echo form_open('application/referee_info',array("id"=>'form4'));?>
             <tr>
                <td>Full Name:
                     <?php echo form_error('nm','<div class="error">', '</div>'); ?>
                    <input type="text" name="nm"  class="form-control"
                    value="<?php display_input('nm',$fi_refname);?>"></td>
                <td > Mobile phone Number:
                    <?php echo form_error('ad','<div class="error">', '</div>'); ?>
                    <input type="text" name="ad"  class="form-control"
                    value="<?php display_input('ad',$fi_refaddr);?>">
                    Email Address:
                    <?php echo form_error('em','<div class="error">', '</div>'); ?>
                    <input type="text" name="em" class="form-control"
                    value="<?php display_input('em',$fi_refemail);?>">
                </td>
             </tr>
             <tr>
                <td>Full Name:
                     <?php echo form_error('nm1','<div class="error">', '</div>'); ?>
                     <input type="text" name="nm1" class="form-control"
                     value="<?php display_input('nm1',$se_refname);?>">
                </td>
                <td>Mobile phone Number:
                 <?php echo form_error('ad1','<div class="error">', '</div>'); ?>
                    <input type="text" name="ad1"  class="form-control"
                    value="<?php display_input('ad1',$se_refaddr);?>">
                    Email Address:
                     <?php echo form_error('em1','<div class="error">', '</div>'); ?>
                    <input type="text" name="em1" class="form-control"
                    value="<?php display_input('em1',$se_refemail);?>">
                </td>
             </tr>
             <tr>
                <td>Full Name
                 <?php echo form_error('nm2','<div class="error">', '</div>'); ?>
                     <input type="text" name="nm2" class="form-control"
                     value="<?php display_input('nm2',$thr_refname);?>">
                </td>
                <td>Mobile phone Number:
                 <?php echo form_error('ad2','<div class="error">', '</div>'); ?>
                    <input type="text" name="ad2"  class="form-control"
                    value="<?php display_input('ad2',$thr_refaddr);?>">
                    Email Address:
                     <?php echo form_error('em2','<div class="error">', '</div>'); ?>
                    <input type="text" name="em2" class="form-control"
                    value="<?php display_input('em2',$thr_refemail);?>">
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