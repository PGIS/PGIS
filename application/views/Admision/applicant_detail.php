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
       <div class="col-md-8">
           <div class="dropdown col-md-4">
                <button type="submit" class="mnybtn btn-warning" data-toggle="dropdown" href="#" value="valid">
                    <span class="glyphicon glyphicon-ban-circle"></span>
                    Invalid <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="">Doesn't meet requirement</a></li>
                    <li><a href="<?php echo site_url('admision/pending/'.$userid.'');?>">Incomplete Application</a></li>
                   
                </ul>
                 
            </div>
           <div class="col-md-4">
               
               <button class="mybtn btn-success" id="pop"
                       data-html="true"
                       data-content="<a  href='<?php echo site_url('admision/admit/'.$userid.'');?>'><button class='btn btn-success'>Yes</button></a>         <button class='btn btn-danger' onclick='$(&quot;#pop&quot;).popover(&quot;hide&quot;);'>Cancel</button>" 
                       data-placement="top" data-toggle="popover" 
                       data-container="body" type="button" 
                       data-original-title="Are you sure its valid?"
                       title=""><span class="glyphicon glyphicon-ok-sign"></span> Valid </button>
           </div>
            
       </div>
    </div>
<?php include_once 'footer.php';?>
