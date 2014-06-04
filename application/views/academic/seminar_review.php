<?php
      $res=$this->db->get_where('tb_seminar',array('id'=>$record));
      if($res->num_rows()===1){
          foreach ($res->result() as $row){
      ?>
    <?php 
    $rez=$this->db->get_where('tb_sem_reg',array('student_name'=>$this->session->userdata('userid'),'course'=>$row->course),1);
    if($rez->num_rows()===1){
        foreach ($rez->result() as $naz){
            
     ?>
       <tr>
          <td>COURSE</td><td class="dts">&nbsp; <?php echo ''.$row->course;?></td>
       </tr>
       <tr>
           <?php
           if($naz->semina_day){
               echo '<td>SEMINAR DAY</td><td class="dts">&nbsp;'.$naz->semina_day.'<input type="checkbox" name="smd" checked="" disabled></td>';   
           }
           ?>
           
       </tr>
       <tr>
           
           <td>SEMINAR HOURS</td>
           <td><table class="table table-bordered">
                   <?php
                   if($naz->semina_hour){
                       echo'<tr><td class="dts">&nbsp;&nbsp;'.$naz->semina_hour.'<input type="radio" name="smh" checked="" class="pull-right" disabled></td></tr>';
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
             <a class="btn btn-primary btn-sm dt" href="<?php echo site_url('seminary/edit/'.$naz->id);?>" onclick="return confirm('Are you sure you want to be removed from the list')">Edit</a>
            </td>
          </tr>
          <tr><td colspan="1"></td><td class="text-center"><div class="edit"></div></tr>
        <?php
        echo '<div class="alert alert-info fade in">
             <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
             <span class="glyphicon glyphicon-info-sign"></span> You have registed to this course
             if you to remove from this seminar please click <strong>Edit</strong>
             </div>';
         }
        }else{
        echo form_open('seminary/seminary_form/'.$record, array('id'=>'sub'));
        echo '<tr>
          <td>COURSE</td><td class="dts">&nbsp; '.$row->course.'</td>
          </tr>';
        if(($row->seminar_day)!==NULL && ($row->seminar_day)!==0){
        echo '<tr>
         <td>SEMINAR DAY</td><td class="dts">&nbsp;'.$row->seminar_day.'<input type="checkbox" name="smd" value="'. $row->seminar_day.'"></td>  
          </tr>';
         }
         echo '<tr>';
         echo '<td>SEMINAR HOURS</td>';
         echo '<td><table class="table table-bordered">';
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
         echo '</table></td>';
         echo '</tr>';
         echo'<tr>';
       if(($row->seminar_desc)!==NULL && ($row->seminar_desc)!=='0'){
                echo '<td>SEMINAR DESCRIPTION</td><td class="dts">&nbsp;'.$row->seminar_desc.'</td>';  
            }
         echo'</tr>';
         echo'<tr>';
        if(($row->seminar_date)!==NULL && ($row->seminar_date)!=='0'){
            echo '<td>SEMINAR DATE</td><td class="dts">&nbsp;'.$row->seminar_date.'</td>';  
        }
        echo'</tr>';
       echo'<tr>
           <td>SEMINAR VENUE</td><td class="dts">&nbsp;'.$row->semina_venue.'</td>
         </tr>';
       echo'<tr>
           <td colspan="2">
           <button class="btn btn-primary btn-sm">register</button>
           </td>
       
        </tr>';
       echo '</form>';
        }
    
        ?>
<?php
}

}
?>