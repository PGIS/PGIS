<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
              <li ><a data-target=".course" data-toggle="tab">Course selection</a></li>
              <li><a data-target=".home" data-toggle="tab">Personal information</a></li>
              <li><a data-target=".emprecod" data-toggle="tab">Employement Details</a></li>
              <li><a data-target=".accadem" data-toggle="tab">Education Background</a></li>
              <li><a data-target=".reff" data-toggle="tab">Refferees Details</a></li>
              <li><a data-target=".addit" data-toggle="tab">Additional Details</a></li>
              <li class="active"><a data-target=".settings" data-toggle="tab">Upload Documents</a></li>
            </ul>
        <div class="tab-content" style="display: block;">
             <div class="course  in tab-pane">
              <div class='pantop'><h4>Course selection</h4></div>
              <p >
                 <div class='tbs'> 
                    <?php echo form_open('application'); ?>
                    
                <div><p><?php echo form_error('college','<div class="error">','</div>'); ?>
                    <label for="college">College Selection</label>
                    <select name="college"  class="form-control">
                      <option value=""<?php echo set_select('college','',TRUE);?>></option>
                      <option value="administrator"<?php echo set_select('college','administrator');?>>College of Information and Communication Technology</option>
                      <option value="Teaching staff"<?php echo set_select('college','Teaching staff');?>>College of Natural and Applied Scince</option>
                      <option value="Admision staff"<?php echo set_select('college','Admision staff');?>>College of Engeneering</option>
                    </select></p>
               </div>
                <div><p><label for="course"> Select Course</label>
                
                     <select class="form-control" name="course">
                        <option >
                                  <?php display_input('course',$Ucourse);?>
                        </option>
                        <option >Master of Science in Computer Science</option>
                        <option >Master of Science in Health Informatics</option>
                        <option >Master of Science in Electronics Engineering and Information Technology</option>
                        <option >Master of Science in Electronics Science and Communication</option>
                        <option >Master of Science in Telecommunications Engineering</option>
                     </select>
                     </p>
               </div>
                <div>
                    <p>
                       <label> Programme mode (choose one)</label>
                        <table class="table col-md-3 table-striped">
                            <tr>
                                <td> Regular </td>
                                <td><input id="chkp1" name="chkp" type="radio" value="regular" ></td>
                            </tr>
                            <tr>
                                <td> Evening</td>
                                <td><input id="chkp" name="chkp" type="radio" value="evening"></td>
                            </tr>
                            
                             <tr>
                                <td>Other (Specify)</td>
                                <td><input id="chkcp" name="chkp" type="radio" value="other"></td>
                            </tr>
                             <tr><td colspan=2><textarea class="form-control" rows="3" id="areatext"></textarea>
                             </td></tr>
                        </table>
                         <input class="btn btn-primary" type="submit" name="save" value="Save">        
                    </p>
                   
                </div>
                 </div>
              
                    </form>
              </p>
            </div>
            <?php include_once "personal_info.php"; ?>
            
            <?php include_once "employ_record.php"; ?>
            
            <?php include_once "accademic_qual.php";?>
            
             <?php include_once "referees.php";?>
            
            <?php include_once "additional.php";?>
            
            <?php include_once "upload.php";?>
         </div>
        </div> 
    </div>
<?php
function display_input($filname,$varname){
         if(set_value($filname)){
            echo set_value($filname);
            }elseif(isset($varname)){
                echo $varname;
            }
}
function display_checks($filname,$varname,$value){
         if(set_value($filname)){
                echo 'checked=""';
            }elseif(isset($varname)){
                if($varname==$value){
                echo 'checked=""';
                }
            }
                           
    }
?>

</div>
<?php include 'footer.php';?>   