<div class="ajax">
<?php echo form_open('seminary/seminary_form/'.$record,array('id'=>'sub'));?>  
  <table class="table table-condensed">
  <?php
      $res=$this->db->get_where('tb_seminar',array('id'=>$record));
      if($res->num_rows()===1){
          foreach ($res->result() as $row){
      ?>
      <tr>
          <td>COURSE</td><td class="dts">&nbsp; <?php echo ''.$row->course;?></td>
       </tr>
       <tr><?php
            if(($row->seminar_day)!==NULL && ($row->seminar_day)!==0){
                echo '<td>SEMINAR DAY</td><td class="dts">&nbsp;'.$row->seminar_day.'<input type="checkbox" name="smd" value="'. $row->seminar_day.'"></td>';   
            }
           ?>
           
       </tr>
       <tr>
           
           <td>SEMINAR HOURS</td>
           <td><table class="table table-bordered">
                   <?php
                   if(($row->morning_hour)!==NULL && ($row->morning_hour)!=='0'){
                       echo '<tr><td class="dts">&nbsp;&nbsp;'.$row->morning_hour.'<input type="radio" name="smh" value="'.$row->morning_hour.'" class="pull-right"></td></tr>';
                    }  else {
                        echo '';
                    }
                   ?>
                   <?php
                   if(($row->afternoon_hour)!=='0' && ($row->afternoon_hour)!==NULL){
                       echo '<tr><td class="dts">&nbsp;&nbsp;'.$row->afternoon_hour.'<input type="radio" name="smh" value="'.$row->afternoon_hour.'" class="pull-right"></td></tr>'; 
                   }  else {
                       echo ''; 
                   }
                   ?>
                   <?php
                   if(($row->evening_hour)!=='0' && ($row->evening_hour)!==NULL){
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
           <button type="submit" class="btn btn btn-primary btn-sm" id="submit">register</button>
           </td>

        </tr>
<?php
}
}
?>
    </table> 
<?php echo form_close();?>
</div>
<div class="loads" style="padding-top: 50px;"></div>
<script>
$('#sub').submit(function(e){
    e.preventDefault();
    $('.loads').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
    var datz=$(this).serializeArray();
    var url=$(this).attr('action');
    $.post(url,datz,function(data){
        $('.ajax').hide();
        setTimeout(function(){
          $('.loads').html(data);  
        },2000);
    });
});
</script>
