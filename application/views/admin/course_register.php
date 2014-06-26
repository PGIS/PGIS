<div class="ajax">   
<?php
$resd=$this->db->get_where('tb_course',array('id'=>$rec));
foreach ($resd->result() as $tz){
    echo ''.$tz->course_name.' '.$tz->course_code;
?>
<?php echo form_open('admin_page/course1/'.$tz->id,array('id'=>'load'));?>
  <table class="table table-condensed">
          <tr><td>
                  <select name="smd" class="form-control" required>
                      <option>Select seminar day</option>
                      <option>Monday</option>
                      <option>Tuesday</option>
                      <option>Wednesday</option>
                      <option>Thursday</option>
                      <option>Friday</option>
                  </select>
          </tr>
          </table>
          <label>Seminar Hour</label>
          <table class="table table-condensed">
               <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
               </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
               </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
          </table>
          <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
          <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
          
          <div style="margin-top:10px;"><button class="btn btn-primary btn-sm pull-right">register</button></div>
          <?php echo form_close();?>

 <?php
}
?> 
</div>
          <script>
          $('#load').submit(function(e){
              e.preventDefault();
              var dataz=$(this).serializeArray();
              var url=$(this).attr('action');
              $.post(url,dataz,function(sms){
                 $('.ajax').html(sms);
              });
          });
          </script>