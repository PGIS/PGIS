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
            <div>Date of birth: <strong class='dts'><?php echo $datebirth;?></strong></div>
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
                            <img src="<?php echo base_url('uploads/'.$userid.'/'.$value);?>" alt="some_text">
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
               echo '<button type="button" class="col-md-12 btn btn-success" btn-xs>Application fee Valid</button>';
            }  else {
            echo '<button type="button" class="col-md-12 btn btn-warning btn-xs">Application fee not yet Verified</button>';    
            }
            ?>
          </div>
          
          <div class="col-md-12 pd">
              <a href="#" data-toggle="modal" data-target="#recomend">
                   <button class="col-md-12 btn btn-xs btn-info">Register recommendation</button>
              </a>
          </div>
          <div class="col-md-12 pd">
              <button class="col-md-12 btn btn-xs btn-info">View recommendation</button>
          </div>
           <div class="col-md-12 pd">
              <button class="col-md-12 btn btn-xs btn-info">View admission criteria</button>
          </div>
       </div>
     
       <div class="modal fade" id="recomend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h6 class="modal-title" id="myModalLabel">Recommendation</h6>
            </div>
            <div class="modal-body">
                <form >
                    
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
       
    </div>
<?php include_once 'footer.php';?>
