<?php include_once 'Headerlogin1.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-11">
            <p>
              Please give the details of what You know about this applicant.  
            </p>
            <div class="loading"></div>
         </div>
                  <div class="col-lg-12">
                <table class="table table-striped"><tr><td>
                            <div class="row">
                                <div class="col-lg-4">
                                <label for="applicant">Applicant Full name*</label>
                                <p> <label class="label label-primary"><?php echo ''.$surname.' '.$others.' '.$applicant;?></label></p>
                                </div>
                                <div class="col-lg-4">
                                    <label>College Selected by Applicant</label>
                                    <p class="label label-primary"><?php echo ''.$college;?></p>
                                </div>
                                </div>
                                <div class="row">
                                 <div class="col-lg-4">
                                    <label>Program Selected by Applicant</label>
                                    <p class="label label-primary"><?php echo ''.$depertment;?></p>
                                </div>
                            </div>
                         
                          </td><td>
                    </td></tr>
                            <tr><td>
                    <div class="pull-right">
                         <label for="applicant">You are*</label>
                         <p class="label label-success"><?php echo ''.$ref;?></p>
                            </div>
                        </td></tr>
                </table></div>
        <div>
                 <?php
                 $res=$this->db->get_where('tb_referee_doc',array('referee_id'=>$applicant,'referee_name'=>$ref,'status'=>'submitted'));
                 if($res->num_rows()===1){
                     echo '<p class="alert alert-warning"><span class="glyphicon glyphicon-info-sign">You have already filled information for '.$applicant.'</span></p>';
                 }  else {
                     echo '     <div class="col-lg-11">
            <div id="ld">
                <label>How long do you have known the applicant ?, In what capacity ?</label>
            <table class="table table-striped">
                 '.form_open('referee_page/referee_doc/'.$applicant.'/'.$ref,array('id'=>'yes')).'
                <tr><th></th><th>Excellent</th><th>Good</th><th>Average</th><th>Poor</th><th>Very Poor</th></tr>
                <tr><td>Intellectual ability</td><td><input type="radio" name="edit" value="excellent" required></td><td><input type="radio" name="edit" value="good"></td><td><input type="radio" name="edit" value="average"></td><td><input type="radio" name="edit" value="poor"></td><td><input type="radio" name="edit" value="very poor"></td></tr>
                <tr><td>Capacity for Original Thinking</td><td><input type="radio" name="edit1"value="excellent" required></td><td><input type="radio" name="edit1" value="good"></td><td><input type="radio" name="edit1" value="average"></td><td><input type="radio" name="edit1" value="poor"></td><td><input type="radio" name="edit1" value="very poor"></td></tr>
                <tr><td>Maturity</td><td><input type="radio" name="edit2" value="excellent" required></td><td><input type="radio" name="edit2" value="good"></td><td><input type="radio" name="edit2" value="average"></td><td><input type="radio" name="edit2" value="poor"></td><td><input type="radio" name="edit2" value="very poor"></td></tr>
                <tr><td>English Language Proficiency</td><td><input type="radio" name="edit3" value="excellent" required></td><td><input type="radio" name="edit3" value="good"></td><td><input type="radio" name="edit3" value="average"></td><td><input type="radio" name="edit3" value="poor"></td><td><input type="radio" name="edit3" value="very poor"></td></tr>
                <tr><td>Ability to work with other</td><td><input type="radio" name="edit4" value="excellent" required></td><td><input type="radio" name="edit4" value="good"></td><td><input type="radio" name="edit4" value="average"></td><td><input type="radio" name="edit4" value="poor"></td><td><input type="radio" name="edit4" value="very poor"></td></tr>
            </table>
                <table class="table"><tr><td class="pull-right"><input type="submit" class="btn btn-primary" id="ckl" name="sb" value="save and continue"></td>
                </tr></table>
            '. form_close().'
            </div>
            <div id="cl">
            <table class="table table-condensed table-striped">
               '.form_open('referee_page/next/'.$applicant.'/'.$ref ,array('class'=>'ajax')).'
            <tr><td>       
            <label for="addition coments">Other capabilities/talents worth
             mentioning*</label>
            <font class="alert-danger">'.form_error('talents').'</font>
            <textarea class="form-control" rows="1"  name="talents" required></textarea></td>
            </tr>
            <tr><td>       
            <label for="addition coments">What do you consider to be the
              Applicant’s weaknesses?*</label>
            <font class="alert-danger">'.form_error('weekness').'</font>
            <textarea class="form-control" rows="1"  name="weekness" required></textarea></td>
            </tr>
            <tr><td>       
            <label for="addition coments">What is your recommendation on
                       the suitability of the applicant to
                       the applied Programme?*</label>
            <font class="alert-danger">'.form_error('recommendation').'</font>
            <textarea class="form-control" rows="1"  name="recommendation" required></textarea></td>
            </tr>
            <tr><td>       
            <label for="addition coments">Give additional comments*</label>
            <font class="alert-danger">'.form_error('addcoment').'</font>
            <textarea class="form-control" rows="1"  name="addcoment" required></textarea></td>
            </tr>
            </table>
                <table class="table"><tr><td class=" pull-right"><input type="submit" class="btn btn-primary" value="submit"></td></tr></table>
             </div>
            '. form_close().'
            </div>'; 
                 }
                 
                 ?>
       
        </div>
    </div>
        </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#cl").hide();
        $("#ckl").click(function(){
            $("#yes").submit(function(e){
                e.preventDefault();
               $('.loading').html('<label class="label label-warning">Please wait...</label>');
              var formz= $(this).serializeArray();
              var url= $(this).attr('action');
              $.post(url,formz,function(data){
                 $("#ld").hide();
                 setTimeout(function(){
                     $("#cl").show();
                     $('.loading').html(data);
                 },2000);
                  
              });
            });
        });
    });
    </script>
<?php include_once 'footer.php';?>

