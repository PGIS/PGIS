<?php
$course=$this->db->select('*')->from('tb_seminar')
        ->where(array('id'=>$record))->get();
foreach ($course->result() as $row){
 ?>
<div class="ajax">
 <?php echo form_open('seminary/seminary_form/'.$row->id);?>
    <table class="table table-condensed">
    <tr>
    <td>COURSE</td><td class="dts">&nbsp; <?php echo ''.$row->course;?></td>
    </tr>
    <tr>
      <td>Seminar day</td><td><?php echo ''.$row->seminar_day;?> &nbsp;&nbsp;<input type="checkbox" name="smd" value=" <?php echo $row->seminar_day;?>"></td>
    </tr>
    <tr>
       <td>SEMINAR HOURS</td>
        <td><table class="table table-bordered">
                   <?php
                   if(($row->morning_hour)!==NULL && ($row->morning_hour)!=='0' && ($row->morning_hour)!==''){
                   echo '<tr><td class="dts">&nbsp;&nbsp;'.$row->morning_hour.'<input type="radio" name="smh" value="'.$row->morning_hour.'" class="pull-right"></td></tr>';
                   }  else {
                   echo '';
                   }
                  if(($row->afternoon_hour)!=='0' && ($row->afternoon_hour)!==NULL && ($row->afternoon_hour)!==''){
                    echo '<tr><td class="dts">&nbsp;&nbsp;'.$row->afternoon_hour.'<input type="radio" name="smh" value="'.$row->afternoon_hour.'" class="pull-right"></td></tr>'; 
                      }  else {
                          echo ''; 
                      }
                  if(($row->evening_hour)!=='0' && ($row->evening_hour)!==NULL && ($row->evening_hour)!==''){
                             echo '<tr><td class="dts">&nbsp;&nbsp;'.$row->evening_hour.'<input type="radio" name="smh" value="'.$row->evening_hour.'" class="pull-right"></td></tr>'; 
                      }  else {
                       echo ''; 
                      }
        ?>
           </table>
           </td>
    </tr>
       <tr>
            <?php
            if(($row->seminar_desc)!==NULL && ($row->seminar_desc)!=='0'){
                echo '<td>SEMINAR DESCRIPTION</td><td class="dts">&nbsp;'.$row->seminar_desc.'</td>';  
            }
            ?>
        </tr>
        <tr>
            <?php
            if(($row->seminar_date)!==NULL && ($row->seminar_date)!=='0'){
                echo '<td>SEMINAR DATE</td><td class="dts">&nbsp;'.$row->seminar_date.'</td>';  
            }
            ?>
        </tr>
        <tr>
           <td>SEMINAR VENUE</td><td class="dts">&nbsp;<?php echo ''.$row->semina_venue;?></td>
       </tr>
        <tr>
            <td colspan="2">
                <button class="btn btn-primary btn-sm">Register</button>
            </td>
        </tr>
    </table>
    <?php echo form_close();?>
 
</div>
<div class="loads" style="padding-top: 50px;"></div>



<?php
}  
?>





