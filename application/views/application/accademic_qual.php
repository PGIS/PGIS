<div class="accadem tab-pane <?php if(isset($active4)){echo 'active';}?>">
    <div class='pantop'><h4>Academic and Professional Qualifications's</h4></div>
    <label class="label label-warning"><span class=" glyphicon glyphicon-info-sign"></span><i> Fields with asterisk must be filled *</i></label>
    <p>
      <table class="table table-striped">
        <?php echo form_open('application/accademic',array("id"=>'form3')); ?>
        <tr>
            <td colspan='2'>
                Highest Academic Qualification Attained *
                <?php echo form_error('high_acade','<div class="error">', '</div>'); ?>
                <div><input type="text" name="high_acade" class="form-control"
                value="<?php display_input('high_acade',$high_edu);?>"></div>
            </td>
            
        </tr>
        <tr>
            <td >Institution *
                <?php echo form_error('institution','<div class="error">', '</div>'); ?>   
                <div><input type="text" name="institution" class="form-control"
                value="<?php display_input('institution',$institut);?>"></div>
            </td>
             <td >Year of Graduation *.
                 <?php echo form_error('graduation','<div class="error">', '</div>'); ?>    
                 <div><input type="text" name="graduation" class="form-control"
                 value="<?php display_input('graduation',$gradu_year);?>"></div>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo form_error('gpa','<div class="error">', '</div>'); ?>
                Undergraduate/Advanced/Postgraduate Diploma GPA.*
                 <div><input type="text" name="gpa" class="form-control gpa"
                 value="<?php display_input('gpa',$gpa);?>"></div>
                <span class="gpaverify"></span>
            </td>
            <td id="fieldname">Specialization *
                <?php echo form_error('specialization','<div class="error">', '</div>'); ?>
                <div><input type="text" name="specialization" class="form-control"
                value="<?php display_input('specialization',$specializ);?>"></div>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                Other Academic or Professional Qualifications *.
                <?php echo form_error('other_ac_prof','<div class="error">', '</div>'); ?>
                <div><textarea  name="other_ac_prof" class="form-control"><?php display_input('other_ac_prof',$other_qualification);?></textarea>
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
<script>
    $('.gpa').keyup(function(){
        $('.gpaverify').html('<label class="alert-info"> Must enter three characters eg (3.5)</label>');
        var formgpa=$(this).val();
        if(formgpa.length ===3){
            setTimeout(function(){
            $('.gpaverify').html('<label class="alert-success"> GPA accepted</label>');
            },1000);
        }else{
            setTimeout(function(){
           $('.gpaverify').html('<label class="alert-danger"> GPA denied</label>');
           },1000);
        }
    });
</script>
