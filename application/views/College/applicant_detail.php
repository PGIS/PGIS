<?php include_once 'Headerlogin.php';?>
   <div id="page-wrapper">
      
       <div class="well well-sm">
           <center>Applications details for    
        <strong><?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?></strong></center>
       </div>
       <div id="pers_info" class="col-md-8">
           <div class="well well-sm"><center>Personal Information</center></div>
           
          Full Name:<strong class='dts'> 
                <?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?>
                </strong>
            <div>Course applying for: <strong class='dts'><?php echo $Ucourse;?></strong></div>
            <div>College: <strong class='dts'><?php echo $Ucollege;?></strong></div>
            <div>Program mode: <strong class='dts'><?php echo $prog_mod;?></strong></div>
            <div>Date of Birth: <strong class='dts'><?php echo $datebirth;?></strong></div>
            <div>Country of birth:<strong class='dts'> <?php echo $country;?></strong></div>
            <div>Nationality: <strong class='dts'><?php echo $nationalt;?></strong></div>
            <div>Permanent address: <strong class='dts'><?php echo $perm_addres;?></strong></div>
            <div>Disable: <strong class='dts'><?php echo $disability;?></strong></div>
            <div>Mobile Number: <strong class='dts'><?php echo $mobil;?></strong></div>
            <div>Email: <strong class='dts'><?php echo $email;?></strong></div>
            
            <div>
               
                <div class="well well-sm"><center>Education Background</center></div>
                <div> Highest education attained:<strong class='dts'><?php echo $high_edu;?></strong></div>
                <div> Institution:<strong class='dts'><?php echo $institut;?></strong></div>
                <div> Graduation year:<strong class='dts'><?php echo $gradu_year;?></strong></div>
                <div> GPA:<strong class='dts'><?php echo $gpa;?></strong></div>
                
                <div>Other Academic or Professional Qualifications:
                    <strong class='dts'><?php echo $other_qualification;?></strong>
                </div>
            </div> 
            <div>
                <?php
                if(!empty($employer)){
                ?>
                <div class="well well-sm"><center>Employment Details</center></div>
                <div> employer:<strong class='dts'><?php echo $employer;?></strong></div>
                <div> Position:<strong class='dts'><?php echo $position;?></strong></div>
                <div> From:<strong class='dts'><?php echo $dof;?></strong></div>
                <div> To:<strong class='dts'><?php echo $dot;?></strong></div>
                <div> Responsibility:<strong class='dts'><?php echo $responsibility;?></strong></div>
                <?php
                }?>
            </div>
            <div>
                <div class="well well-sm"><center>Additional Details</center></div>
                <div> Sponsor:<strong class='dts'><?php echo $employer;?></strong></div>
                <div> Sponsor name:<strong class='dts'><?php echo $position;?></strong></div>
                <div> Sponsor Address:<strong class='dts'><?php echo $dof;?></strong></div>
                <div> Where <i><?php echo $other_nam;?></i> 
                    found out about this application:<strong class='dts'><?php echo $dot;?></strong>
                    <?php if($fwww!='' && $fwww!='0'){
                    echo '<li class="dts">'.$fwww.'</li>';
                    }?>
                    <?php
                     if($fprospec!='' && $fprospec!='0'){
                         echo '<li class="dts">'.$fprospec.'</li>';
                         }?>
                     <?php
                     if($feduca!='' && $feduca!='0'){
                         echo '<li class="dts">'.$feduca.'</li>';
                         }?>
                     <?php
                     if($fjournal!='' && $fjournal!='0'){
                         echo '<li class="dts">'.$fjournal.'</li>';
                         }?>
                     <?php
                     if($funiver!='' && $funiver!='0'){
                         echo '<li class="dts">'.$funiver.'</li>';
                         }?>
                </div>
            </div>
            <div>
               <div class="well well-sm"><center>Referees response</center></div> 
               <?php
               $qy = $this->db->get_where('tb_referee_doc',array('referee_id' => $userid));
               if($qy->num_rows()>0){
                   foreach ($qy->result() as $rfeedbak){
                ?>
               <table class="table">
                   <tr class="success">
                       <td colspan="2"><?php echo $rfeedbak->referee_name.' Feedback';?></dt>
                   </tr>
                   <tr>
                       <td>Intellectual Ability.</td>
                       <td><p id="dtl"><?php echo $rfeedbak->intellectual_ability;?></p></td>
                   </tr>
                   <tr>
                       <td>Capacity for Original Thinking.</td> 
                       <td><p id="dtl"><?php echo $rfeedbak->thinking_capacity;?></p></td>
                   </tr>
                   <tr>
                       <td>Maturity</td>
                       <td><p id="dtl"><?php echo $rfeedbak->maturity;?></p></td>
                   </tr>
                   <tr>
                       <td>Motivation for Postgraduate Studies</td>
                       <td></td>
                   </tr>
                   <tr>
                       <td>Ability to work with others</td>
                       <td><p id="dtl"><?php echo $rfeedbak->ability_work;?></p></td>
                   </tr>
                   <tr>
                       <td>Additional comments</td>
                       <td><p id="dtl"><?php echo $rfeedbak->comment;?></p></td>
                   </tr>
               </table>     
               <?php
                   }
               }
               ?>
            </div>
        </div>
       
       <div class="pleft col-md-4">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Supporting Documents</h3>
                </div>
                <div class="panel-body">
                 <?php
                if(is_dir('uploads/'.$userid)) {
                   
                     $map = directory_map('./uploads/'.$userid);
                     $idvalue=1;
                     foreach ($map as $value) {
                     echo '<a href="#" data-toggle="modal" data-target="#'.$idvalue.'" class="list-group-item hver">'.$value.'</a>';
                    ?>
                   <div class="modal fade" id="<?php echo $idvalue;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><?php echo $value;?></h6>
                        </div>
                        <div class="modal-body">
                            <?php
                            $fiarray=array('image/jpeg','image/pjpeg','image/png',
                                    'image/gif','image/bmp','image/tiff','image/svg+xml','image/vnd.microsoft.icon');
                             if(in_array(get_mime_by_extension($value), $fiarray)){
                            ?>
                            <img src="<?php echo base_url('uploads/'.$userid.'/'.$value);?>" alt="some_text">  
                                <?php  
                                }  else {
                                  ?>
                            <iframe id="viewer"
                                src = "<?php echo base_url();?>ViewerJS/#<?php echo base_url('uploads/'.$userid.'/'.$value);?>" width='100%' height='500'
                                allowfullscreen webkitallowfullscreen>
                             </iframe>
                              <?php  
                                }
                              ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php 
                    $idvalue++;
                     
                     }
                 }
               ?>
                
                </div>
               
           </div>
       </div>
       <div class="col-md-4 pull-right">
           <div class="col-md-12 pd"><?php
           $this->db->where('userid', $userid);
            $thquery = $this->db->get_where('tb_finance_application', array('appl_status' =>'accepted'));
            if($thquery->num_rows()==1){
               echo '<button type="button" class="col-md-12 btn btn-success btn-xs">Application fee Valid</button>';
            }  else {
            echo '<button type="button" class="col-md-12 btn btn-warning btn-xs">Application fee not yet Verified</button>';    
            }
            ?>
          </div>
           
           <div class="col-md-12 pd">
              <a href="#" data-toggle="modal" data-target="#recomend">
                   <button class="col-md-12 btn btn-xs btn-info">Give recommendation</button>
              </a>
          </div>
            <div class="col-md-12 pd">
              <a href="#" data-toggle="modal" data-target="#viewrecom">
                 <button class="col-md-12 btn btn-xs btn-info">View recommendation</button> 
              </a>
              
          </div>
           
           <div class="col-md-12 pd">
               <a href="#" data-toggle="modal" data-target="#viewcrit">
                   <button class="col-md-12 btn btn-xs btn-info">View admission criteria</button>
               </a>
          </div>
            
           <?php
           $check1 = array(
                            'userid' => $userid,
                            'level' => 'college'
                          );
                $requery1 = $this->db->get_where('tb_admission_recomendation',$check1);
                if($requery1->num_rows()>0){
                    echo '<div class="col-md-12 pd">
                            <a href="'.site_url('college_Coordinator/applicationFoward/'. $userid).'">
                            <button class="col-md-12 btn btn-xs btn-info">Forward Applications</button>
                            </a>
                           </div>';
                }
           ?>
       </div>
      
    </div>

<div class="modal fade" id="recomend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <center>
                  <h6 class="modal-title" id="myModalLabel">Recommendation</h6>
              </center>
            </div>
              <div class="modal-body" >
                <form id="recomendation">
                    <table class="table">
                        <tr>
                            <td>
                                Recommendation
                            </td>
                            <td>
                                <select class="form-control" id="cy" name="rec">
                                    <option></option>
                                    <option>Admit</option>
                                    <option>Do not admit</option>
                                </select>
                            </td> 
                          </tr>
                          <tr>
                              <td colspan="2" id="InputsWrapper">
                                  
                              </td>
                          </tr>
                          <tr>
                              <td colspan="2">
                                  <button class="btn btn-xs btn-info" type="submit">
                                      Submit recommendation
                                  </button>
                              </td>
                          </tr>                                                                     
                    </table>
                </form>
                  <div class="col-md-12" id="recomid">
                      
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-xs upfr" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
           <script>
                $(".upfr").click(function() {
                     location.reload(true);
                 });
            </script>
           <script>
                $("#recomendation").submit(function(event) {
                event.preventDefault();
                var url = "<?php echo site_url('college_Coordinator/recommendation/'. $userid); ?>";
                var fdata = $('#recomendation').serializeArray();
                $.post(url, fdata, function(data) {
                $('#recomid').html(data);
             });
             });
         </script>
      </div>
<div class="modal fade" id="viewrecom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <center><h4 class="modal-title" id="myModalLabel">College recommendation for Admission</h4></center>
            </div>
            <div class="modal-body">
                <div class=" alert-info">
                    <center>COLLEGE RECOMMENDATION</center>
                </div>
                <?php
                 $chec = array(
                            'userid' => $userid,
                            'level' => 'college'
                          );
                $reque = $this->db->get_where('tb_admission_recomendation',$chec);
                if($reque->num_rows()>0){
                    foreach ($reque->result() as $reres){
                        $recmdtn2=$reres->recomendation;
                        $comment2=$reres->comment;
                    }
                    if($recmdtn2 === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment2.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                ?> 
                
                 <div class=" alert-info">
                    <center>DEPARTMENT RECOMMENDATION</center>
                </div>
                <?php
                 $check = array(
                            'userid' => $userid,
                            'level' => 'department'
                          );
                $requery = $this->db->get_where('tb_admission_recomendation',$check);
                if($requery->num_rows()>0){
                    foreach ($requery->result() as $rereslt){
                        $recmdtn=$rereslt->recomendation;
                        $comment=$rereslt->comment;
                    }
                    if($recmdtn === 'Admit'){
                       echo '<div class="alert alert-success">
                         Applicant recomended for admission
                          </div>' ; 
                    }else{
                        echo '<div class="alert alert-danger">
                         Applicant not recomended for admission
                          </div>'; 
                        echo '<div>Reason</div>';
                        echo '<div class="well well-sm">'.$comment.'</div>';
                    }
                    
                }  else {
                   echo '<div class="alert alert-warning">
                         No any recommendation given yet
                          </div>' ;
                }
                ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
 <div class="modal fade" id="viewcrit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h6 class="modal-title" id="myModalLabel">View admission Criteria</h6>
            </div>
            <div class="modal-body">
                <?php
                 $this->db->select('admision_criteria');
                 $crquery = $this->db->get('tb_system_setting');
                    if($crquery->num_rows()>0){
                        foreach($crquery->result()as $crt){
                            $ctrfile=$crt->admision_criteria;
                        }
                    }
                    $fiarray=array('image/jpeg','image/pjpeg','image/png',
                        'image/gif','image/bmp','image/tiff','image/svg+xml','image/vnd.microsoft.icon');
                    if(in_array(get_mime_by_extension($ctrfile), $fiarray)){
                    ?>
                      <img src="<?php echo $ctrfile;?>" alt="some_text">  
                    <?php  
                    }  else {
                      ?>
                <iframe id="viewer"
                    src = "<?php echo base_url();?>ViewerJS/#<?php echo $ctrfile;?>" width='100%' height='500'
                    allowfullscreen webkitallowfullscreen>
                 </iframe>
                  <?php  
                    }
                  ?>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<script>
    $("#cy").change(function() {
    var f = document.getElementById("cy").value;
    if(f==='Do not admit'){
        $('#InputsWrapper').append('<p class="rm">Reason for not admit<textarea name="reason" class="form-control" rows="8"></textarea></p>');
                
    }
    if(f==='Admit'){
        $('.rm').replaceWith('');
    }
});
</script>
<?php include_once 'footer.php';?>
