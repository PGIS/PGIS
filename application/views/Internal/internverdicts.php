<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
          <?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo '<a href='.$url.'><button class="btn btn-info btn-xs">back</button></a>'; 
?>
    </div>
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
                        <?php if(isset($department))echo '<b class="dts1">'.$department.'</b>';?>
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
                        Verdict 
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

