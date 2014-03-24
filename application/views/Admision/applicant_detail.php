<?php include_once 'Headerlogin.php';?>
   <div id="page-wrapper">
      
       <div class="well well-sm">
           <center>Applications details for    
        <strong><?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?></strong></center>
       </div>
       <div id="pers_info" class="col-md-8">
            <center><h4>Personal Information</h4></center>
            <p>Full Name:<strong style="color: #31b0d5;"> 
                <?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?>
                </strong></p>
            <p>Course applying for: <strong style="color: #31b0d5;"><?php echo $Ucourse;?></strong></p>
            <p>Country of birth:<strong style="color: #31b0d5;"> <?php echo $country;?></strong></p>
            <p>Nationality: <strong style="color: #31b0d5;"><?php echo $nationalt;?></strong></p>
            <p>Disable: <strong style="color: #31b0d5;"><?php echo $disability;?></strong></p>
            <p>Date of birth: <strong style="color: #31b0d5;"><?php echo $datebirth;?></strong></p>
        </div>
       <div class="pleft col-md-4">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Documents Comparison</h3>
                </div>
                <div class="panel-body">
                 <?php
                if(is_dir('uploads/'.$userid)) {
                    echo '<table class="table table-hover">';
                     $map = directory_map('./uploads/'.$userid);
                     foreach ($map as $value) {
                     echo '<tr><td><a href="#">'.$value.'</a></td></tr>';
                    }
                 }
               ?>
                </table>
                </div>
           </div>
   
       </div>
    </div>
<?php include_once 'footer.php';?>
