<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div id='first'>
        <div class='col-md-6'>
            <table class='table'>
                
                  
                <th class="tahead active"><p><h4>Personal Details and selected course</h4></p></th>
               
                <tr>
                    <td>
                        <strong class='dts'>Full name:  </strong><?php
                        echo '<strong>'.$title.'</strong>'.' '.$sname.' '.$other_nam;echo "<br>"
                         ?> 
                    </td>
                </tr>
                <tr>
                    <td> <strong class='dts'>Date of birth:</strong><?php echo ' '.$datebirth; echo '<br>';?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Country of birth:</strong><?php echo ' '.$country;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Nationality:</strong><?php echo ' '.$nationalt;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Permanent address:</strong><?php echo ' '.$perm_addres;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Mobile number:</strong><?php echo ' '.$mobil;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Land-line number:</strong><?php echo ' '.$landlin;?></td>
                </tr>
                <tr>
                   <td><strong class='dts'>Fax number:</strong><?php echo ' '.$fax;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Email:</strong><?php echo ' '.$email;?></td>
                </tr>
                <tr>
                    <td><strong class='dts'>Disable:</strong><?php echo ' '.$disability;?></td>
                </tr>
                <tr>
                    <td> <strong class='dts'>Selected course:</strong>  <?php echo ' '.$Ucourse;?></td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'>College:</strong><?php echo ' '.$Ucollege;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'>Program mode:</strong><?php echo ' '.$prog_mod;?>
                    </td>
                </tr>
               
            </table>
        </div>
        <div class='col-md-6'>
            <table class='table'>
                <th class="tahead active"><p><h4>Education background and employement details</h4></p></th>
                
                <tr>
                    <td>
                      <strong class='dts'>  Highest education attained: </strong><?php echo ' '.$high_edu;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'> Specialization:</strong> <?php echo ' '.$specializ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'>Institute:</strong> <?php echo ' '.$institut;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'>Year of graduation: </strong><?php echo ' '.$gradu_year;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong class='dts'>GPA: </strong><?php echo ' '.$gpa;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong class='dts'>Other qualification: </strong><?php echo ' '.$other_qualification;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong class='dts'> Employer: </strong><?php echo ' '.$employer;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'>Position:</strong><?php echo ' '.$position;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong class='dts'> Start date: </strong><?php echo ' '.$dof;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       <strong class='dts'> End date: </strong><?php echo ' '.$dot;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong class='dts'>Responsibility:</strong> <?php echo ' '.$responsibility;?>
                    </td>
                </tr>
                <tr>
                    <td>
                     <strong class='dts'>Do you think your employer will release you ?:</strong><?php echo ' '.$release;?>
                    </td>
                </tr>
            </table>
        </div>
        <div><span id="nextail" class="glyphicon glyphicon-chevron-right"></span></div>
    </div>
    <div id='second' class="col-md-12">
        <div class="col-md-6">
            <table class='table'>
               <th class="active"><h4>Referees Information</h4></th>
               <tr><th>First referee</th></tr>
               <tr><td><strong class='dts'>Name:</strong><?php echo ' '.$fi_refname;?></td></tr>
               <tr><td><strong class='dts'>Email:</strong><?php echo ' '.$fi_refemail;?></td></tr>
               <tr><td><strong class='dts'>Phone:</strong><?php echo ' '.$fi_refaddr;?></td></tr>
               
               <tr><th>Second referee</th></tr>
               <tr><td><strong class='dts'>Name:</strong><?php echo ' '.$se_refname;?></td></tr>
               <tr><td><strong class='dts'>Email:</strong><?php echo ' '.$se_refemail;?></td></tr>
               <tr><td><strong class='dts'>Phone:</strong><?php echo ' '.$se_refaddr;?></td></tr>

               <tr><th>Third referee</th></tr>
               <tr><td><strong class='dts'>Name:</strong><?php echo ' '.$thr_refname;?></td></tr>
               <tr><td><strong class='dts'>Email:</strong><?php echo ' '.$thr_refemail;?></td></tr>
               <tr><td><strong class='dts'>Phone:</strong><?php echo ' '.$thr_refaddr;?></td></tr>
            </table>
        </div>
        
        <div class="col-md-6">
            <table class="table">
                <th class="active"><h4>Sponsorship and Additional Information</h4></th>
                <tr><td><strong class='dts'>Sponsorship mode:</strong><?php echo ' '.$spon_mode;?></td></tr>
                <tr><td><strong class='dts'>Sponsors Name:</strong><?php echo ' '.$spon_name;?></td></tr>
                <tr><td><strong class='dts'>Sponsor Address:</strong><?php echo ' '.$spon_addr;?></td></tr>
                <tr><th>Where you found application information</th></tr>
                <?php
                if($fwww!='' && $fwww!='0'){
                    echo '<tr><td>'.$fwww.'</td></tr>';
                    }?>
               <?php
                if($fprospec!='' && $fprospec!='0'){
                    echo '<tr><td>'.$fprospec.'</td></tr>';
                    }?>
                <?php
                if($feduca!='' && $feduca!='0'){
                    echo '<tr><td>'.$feduca.'</td></tr>';
                    }?>
                <?php
                if($fjournal!='' && $fjournal!='0'){
                    echo '<tr><td>'.$fjournal.'</td></tr>';
                    }?>
                <?php
                if($funiver!='' && $funiver!='0'){
                    echo '<tr><td>'.$funiver.'</td></tr>';
                    }?>
                <?php
                if($fother!=''){
                    echo '<tr><td>'.$fother.'</td></tr>';
                    }?>
            </table>
        </div>
        <div><span id="nextail1" class="glyphicon glyphicon-chevron-left"></span></div>
        <div><span id="nextail2" class="glyphicon glyphicon-chevron-right"></span></div>
    </div>
    <div id='third' class="col-md-12">
        <table class="table">
            
            <thead class='active'><center><h4>Important uploaded documents</h4></center></thead>
           
            <?php
            $user=$this->session->userdata('userid');
            $this->load->helper('directory');
            
            if(is_dir('uploads/'.$user)) {
                echo '
                 <tr>
                    <th>#</th>
                    <th>document name</th>
                    <th>Action</th>   
                 </tr>';
              $map = directory_map('./uploads/'.$user);
                  $i=1;
                  foreach ($map as $value) {
                     echo "<tr class='mytable'>";
                     echo "<td>$i</td>";
                     echo "<td> $value</td>";
                     echo '<td><a href="#" data-toggle="modal" data-target="#'.$i.'">View</a></td>';
                     ?>
             <div class="modal fade" id="<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><?php echo $value;?></h6>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo base_url('uploads/'.$user.'/'.$value);?>" alt="some_text">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                     echo "</tr>";
                  $i++;
                 }
            }else{
               echo "
                <tr>
                    <td>You havent Uploaded any document</td>
                </tr>
               ";
            }
            ?>
            
        </table>
        <div><span id="nextail3" class="glyphicon glyphicon-chevron-left"></span></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
                $("#second").hide();
                $("#third").hide();
                $("#nextail").click(function(){
                $('#second').show();
                $('#first').hide();
                });
                $("#nextail1").click(function(){
                $('#first').show();
                $('#second').hide();
                });
                $("#nextail2").click(function(){
                $('#third').show();
                $('#second').hide();
                });
                $("#nextail3").click(function(){
                $('#third').hide();
                $('#second').show();
                });
            }); 
</script>
<?php include_once 'footer.php';?>