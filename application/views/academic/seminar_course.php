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
       <tr>
           <td>SEMINAR DAY</td><td class="dts">&nbsp;<?php echo ''.$row->seminar_day;?><input type="checkbox" name="smd" value="<?php echo $row->seminar_day;?>"></td>
       </tr>
       <tr>
           <td>SEMINAR HOURS</td>
           <td><table class="table table-bordered">
                   <tr><td class="dts">&nbsp;&nbsp;<?php echo ''.$row->morning_hour;?> <input type="radio" name="smh" value="<?php echo ''.$row->morning_hour;?>"></td></tr>
                   <tr><td class="dts">&nbsp;&nbsp;<?php echo ''.$row->afternoon_hour;?><input type="radio" name="smh" value="<?php echo ''.$row->afternoon_hour;?>"></td></tr>
           </table>
           </td>
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
