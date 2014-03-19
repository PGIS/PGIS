<div class="accadem tab-pane ">
    <div class='pantop'><h4>Academic and Professional Qualifications's</h4></div>
    <p>
      <table class="table table-striped">
        <?php echo form_open('application/personal_info'); ?>
        <tr>
            <td>
                Highest Academic Qualification Attained
                <?php echo form_error('high_acade','<div class="error">', '</div>'); ?>
                <div><input type="text" name="high_acade" class="form-control"></div>
            </td>
            
        </tr>
        <tr>
            <td >Institution
                <?php echo form_error('institution','<div class="error">', '</div>'); ?>   
                <div><input type="text" name="institution" class="form-control"></div>
            </td>
             <td >Year of Graduation.
                 <?php echo form_error('graduation','<div class="error">', '</div>'); ?>    
                 <div><input type="text" name="graduation" class="form-control"></div>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo form_error('gpa','<div class="error">', '</div>'); ?>
                Undergraduate/Advanced/Postgraduate Diploma GPA.
                 <div><input type="text" name="gpa" class="form-control"></div>
            </td>
            <td id="fieldname">Specialization
                <?php echo form_error('specialization','<div class="error">', '</div>'); ?>
                <div><input type="text" name="specialization" class="form-control"></div>
            </td>
        </tr>
        <tr>
            <td>
                Other Academic or Professional Qualifications.
                <?php echo form_error('other_ac_prof','<div class="error">', '</div>'); ?>
                <div><textarea  name="other_ac_prof" class="form-control"></textarea>
                </div>
            </td>
        </tr>
        
      </table>
       <input class="subtn" type="submit" name="save" value="Save">
       </form>
    </p>
</div>