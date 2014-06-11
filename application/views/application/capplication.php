<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
              <li class="<?php if(isset($active1)){echo 'active';}?>">
                <a data-target=".course" data-toggle="tab">Programme selection</a>
              </li>
              <li class="<?php if(isset($active2)){echo 'active';}?>">
                <a data-target=".home" data-toggle="tab">Personal information</a>
              </li>
              <li class="<?php if(isset($active3)){echo 'active';}?>">
                <a data-target=".emprecod" data-toggle="tab">Employment Details</a>
              </li>
              <li class="<?php if(isset($active4)){echo 'active';}?>">
                <a data-target=".accadem" data-toggle="tab">Education Background</a>
              </li>
              <li class="<?php if(isset($active5)){echo 'active';}?>">
                <a data-target=".reff" data-toggle="tab">Referees Details</a>
              </li>
              <li class="<?php if(isset($active6)){echo 'active';}?>">
                <a data-target=".addit" data-toggle="tab">Additional Details</a>
              </li>
              <li class="<?php if(isset($active7)){echo 'active';}?>">
                <a data-target=".settings" data-toggle="tab">Upload Documents</a>
              </li>
              <li class="<?php if(isset($active8)){echo 'active';}?>">
                <a data-target=".pays" data-toggle="tab">Application fee Details</a>
              </li>
              <li>
                  <form action="<?php echo site_url('application/submitting');?>" method="post" onsubmit='return con_message()'>
                  <button id="b" type="submit" class="subtn btn-success btn-large" data-target=".sub">
                     <span class="glyphicon glyphicon-send"></span> Submit Application</button>
                  </form>
              </li>
              
            </ul>
        <div class="tab-content tb" style="display: block;">
            
             <div class="course  in tab-pane <?php if(isset($active1)){echo 'active';}?>">
              <div class='pantop'><h4>Programme selection</h4></div>
              <p>
              
                 <div class='tbs'> 
                    <?php echo form_open('application/apply'); ?>
                    
                <div><p><?php echo form_error('college','<div class="error">','</div>'); ?>
                    <label for="college">College Selection</label>
                    <select name="college"  class="form-control" id='1'>
                        <option > <?php display_input('college',$Ucollege);?></option>
                        <?php
                        $this->db->select('programme_college');
                        $this->db->group_by('programme_college');
                        $collage = $this->db->get('tb_programmes');
                        if($collage->num_rows()>0){
                            foreach ($collage->result()as $co){
                                echo '<option >'.$co->programme_college.'</option>';
                            }
                        }
                        ?>
                    </select></p>
               </div>
                <div><p>
                    <?php echo form_error('course','<div class="error">','</div>'); ?>
                     <label for="course"> Select Programme</label>
                     <select class="form-control" name="course" id="2" >
                        <option >
                                  <?php display_input('course',$Ucourse);?>
                        </option>
                     </select>
                     </p>
               </div>
                <div>
                    <p>
                       <label> Programme mode (choose one)</label>
                        <table class="table col-md-3 table-striped">
                            <tr>
                                <td> Regular </td>
                                <td><input  name="chkp" type="radio" value="regular" checked="" class="morning"
                                    <?php display_checks('chkp',$prog_mod,'regular');?> 
                                 ></td>
                            </tr>
                            <tr>
                                <td> Evening</td>
                                <td><input  name="chkp" type="radio" value="evening" class="evening"
                                <?php display_checks('chkp',$prog_mod,'evening');?>
                                ></td>
                            </tr>
                            
                             <tr>
                                <td>Other (Specify)</td>
                                <td><input  name="chkp" type="radio" value="other" class="other"
                                 <?php display_checks('chkp',$prog_mod,'other');?>
                                ></td>
                            </tr>
                            <tr class="th"><td colspan=2>
                             <?php echo form_error('checktext','<div class="error">','</div>'); ?>
                             <textarea class="form-control" rows="3" name='checktext'>
                                
                             </textarea>
                             </td></tr>
                             <tr>
                                <td>
                                 <input class="subtn btn-primary" type="submit" name="save" value="Save">   
                                </td>
                                <td>
                                  <input class="subtn btn-primary" type="submit" name="savcont" value="Save and continue">
                                </td>
                             </tr>
                        </table>
                         
                        
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
            
            <?php include_once "applipayment.php";?>
            <?php if(isset($submit)){
               echo '<div class="sub tab-pane active">';
               echo '<div class="alert alert-success">'.$submit.'</div></div>';
            }?>
         </div>
            
        </div>
          <script>
              $(document).ready(function(){
                  $('.th').hide();
                  $('.other').click(function(){
                      $('.th').show();
                  });
                  $('.evening').click(function(){
                      $('.th').hide();
                  });
                  $('.morning').click(function(){
                      $('.th').hide();
                  });
              });
          </script>
    </div>
    <script src="<?php echo base_url('assets/js/submision_checking.js') ?>"></script>
<?php
function display_input($filname,$varname){
         if(set_value($filname)){
            echo set_value($filname);
            }elseif(isset($varname)){
                echo $varname;
            }
}
function display_checks($filname,$varname,$value){
         if(isset($_POST[$filname])){
             if($_POST[$filname]==$value){
                echo 'checked=""';
                }
            }elseif(isset($varname)){
                if($varname==$value){
                echo 'checked=""';
                }
            }
       }
?>

</div>
<?php include 'footer.php';?>   
