<?php 
if($this->session->userdata('user_role')==='Teaching staff'){
    include_once 'Headerloginteaching.php';
}elseif ($this->session->userdata('user_role')==='Supervisor') {
    include_once 'Headerloginsuper.php';
}elseif ($this->session->userdata('user_role')==='Student') {
    include_once 'Headerlogincal.php';
}
?>
<div id="page-wrapper">
    <?php
    if($this->session->userdata('user_role')==='Teaching staff'){
    
    echo '<ol class="breadcrumb">
            <li class="active"><a href="'.site_url('teaching').'">Student assigned</a></li>
            <li><a href="'. site_url('teaching/project').'">Submitted project</a></li>
            <li><a href="'. site_url('teaching/replied').'">Replied project</a></li>
            <li><a href="'.site_url('teaching/verdicts').'">View Presentation Feedback</a></li>
        </ol>';
    }?>
    <div class="col-md-12">
        <div class="well-sm alert-info">
            Presentation Feedback for <?php if(isset($type))echo '<b>'.$type.'</b>';?>
        </div>
       
        <div>
            <table class="table">
                
                <tr>
                    <td>
                     Student name
                     <?php if(isset($registrationid))
                         echo '<b class="dts1">'.$lname.' '.$sname.'</b>';?>
                    </td>
                    <td class="col-md-6">
                        Student Registration number:
                        <?php if(isset($registrationid))echo '<b class="dts1">'.$registrationid.'</b>';?>
                    </td>
                  </tr>
                  <tr>
                      <td>
                        Department  
                      </td>
                      <td>
                          Programme 
                          <?php if(isset($programe))echo '<b class="dts1">'.$programe.'</b>';?>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                           Student supervisor name 
                      </td>
                  </tr>
                <tr>
                    <td colspan="2">
                       Dissertation/Thesis Title: 
                       <div  class="well well-sm">
                          <?php if(isset($title))echo '<b>'.$title.'</b>';?> 
                      </div> 
                    </td>
                </tr>
                <tr>
                    <td>Presentation date:<?php if(isset($prdate))echo '<b class="dts1">'.$prdate.'</b>';?></td>
                    <td>Presentation at:<?php if(isset($level))echo '<b class="dts1">'.$level.'</b>';?></td>
                </tr>
                <tr>
                    <td colspan="2">
                       Presentation Panel
                        <div class="well well-sm">
                         <?php if(isset($panel))echo '<b>'.$panel.'</b>';?>   
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">  Comments
                      <div  class="well well-sm">
                           <?php if(isset($comments))echo '<b>'.$comments.'</b>';?>
                      </div>   
                    </td>  
                
                </tr>
                <tr>
                    <td colspan="2">
                        Verdicts  
                        <div class="well-sm alert-info">
                            <?php if(isset($verdict))echo '<b>'.$verdict.'</b>';?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
    </div>
</div>
<?php include_once 'footer.php';?>

