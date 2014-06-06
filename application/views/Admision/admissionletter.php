<html>
    <head>
        
    <style type="text/css">
       
        #heading{
           font-size: 1.4em; 
          
        }
        .all div{
            float: left;
            width: 33%;
            position: relative;
        }
        #fleft{
            font-size: 0.9em;
            font-style: italic;
            font-weight: lighter;
        }
        #fright{
            width: 30%;
            position: relative;
            font-size: 0.9em;
            font-style: italic;
            font-weight: lighter;
            left: 70%;
            top: -17%;
        }
        #img{
          position: relative;
          left: 45%;
          top: -9%;
          width: 30%;
        }
        .sml{
            position: relative;
            font-size: 0.9em;
            top: -17%;
        }
        .bo{
            text-transform:uppercase;
        }
        #add{
            position: relative;
            top: -21%;
        }
    </style>
    </head>
    <body>
        <div id="heading">
            <center><strong>UNIVERSITY OF DAR ES SALAAM</strong></center>
            <center><strong>DIRECTORATE OF POSTGRADUATE STUDIES</strong></center>  
        </div>
        <div><center>P.0.BOX 35091 - DAR ES SALAAM - TANZANIA</center></div>
        <div class="all">
            <div id='fleft'>
                tel,:022 2410500 Ext.2010<br>
                tel,:022 2410069 (Direct line)
                <p><strong>Our Ref:</strong></p>
            </div>
            <div id="img">
               <img src="<?php echo base_url('assets/img/udsm.jpg');?>"class="imge" height="70">
            </div> 
            <div id="fright">
                Fax: 022 2410078/2410023<br>
                email:dsgs@admin.udsm.ac.tz
                <p>Date</p>
            </div> 
        </div>
        <div>
            <div id='add'><p>
               <?php
               echo $sname.','.$other_nam.'<br>';
               echo $perm_addres.'<br>';
               echo 'Mob:'.$mobil.'<br>';
               echo 'email:'.$email;
               ?>
            </p>
            </div>
        </div>
        <div class="sml" id="sml">
            <p>Dear <?php echo $sname;?></p>
        <div>
            <strong>
                REF:   ADMISSION INTO <b class="bo"><?php echo $Ucourse;?></b> PROGRAMME FOR THE <?php echo date('Y');?>/<?php echo date('Y'+1);?> ACADEMIC YEAR 
            </strong>
        </div>
        <div>
            I am pleased to inform you that your application into the above mentioned programme has been approved
            you will be registered for the programme at the <?php echo $Ucourse;?>
            <p>
                Your registration is effective from date and is subjected to you
            </p>
        </div>
            <p>
                please kindy visit the University website for information on accommodation
            </p>
            <ol>
                <p>
                <li>Registering formally for the degree after paying the required fees.This admission can neither
                be postponed nor deferred t the next academic year, 
                </li>
                </p> 
                <li>
                    Producing evidence of your release from your employer (if employed)
                </li>
                <li>
                    
                        Submitting <strong>original</strong> and certified copies of certificates and transcripts
                        (the original will be returned after verification), including 1st Degree;Form IV and/or Diploma
                        certificate for PH.D applicant, Master degree certificate and transcript should also be attached; andalusia
                        
                   
                </li>
                
            </ol>
            <div>the program end after 36 month's.Deadline for registration is <strong>date</strong>
            a late registration fee of Tshs 5000/= per day for the maximum of 7 days shall be charged after the deadline
            <strong>No registration after the 3rd week of commencement of studies shall be entertained. You are strongly 
            encouraged to register during the 1st week to avoid distress </strong>. Failure to register after the deadline 
            will lead to automatic cancellation of admission .Please find attached forms()which must be filled and returned
            .
            </div>
            <div>
                <p>Kindly visit the University Website (www.udsm.ac.tz ) for information on accommodation</p>
                <p>Congratulation and welcome to the university o Dar es salaam</p>
            </div>
            <div>
                Morry H.Kijonjo<br>
                <strong>For:Director,Postgraduate Studies</strong><br>
               
            </div>
        </div>
    </body>
</html>
