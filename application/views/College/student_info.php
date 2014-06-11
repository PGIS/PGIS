<div class="col-md-12">
        <div>
            <table class="table">
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