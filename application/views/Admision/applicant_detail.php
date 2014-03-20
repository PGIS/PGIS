<?php include_once 'Headerlogin.php';?>
    <div id="content">
        <button type="button" class="btn btn-default btn-lg btn-block">
            Applications details for <strong><?php echo $title;?> <?php echo $other_nam;?> <?php echo $sname;?></strong>
        </button>
        <div id="pers_info">
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
    </div>
<?php include_once 'footer.php';?>
