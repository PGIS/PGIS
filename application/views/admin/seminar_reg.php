<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
      <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
   <div class="col-lg-4">
       <select name="mycourse" class="form-control">
          <option value="">SELECT COURSE TO REGISTER</option>
       <?php
       $rest=$this->db->get('tb_course');
       if($rest->num_rows()>0){
           foreach ($rest->result() as $dt){
               echo '<option data-target="#list" data-toggle="modal" onclick="courescode(\''.$dt->id.'\')">'.$dt->course_code.'</option>';
               
           }
       }  else {
           echo '<option>No course found</option>';   
       }
       ?>
     </select>
      <label class="text-primary">Specify other seminar</label>
      <div class="loads">
           <?php echo form_open('admin_page/specify',array('id'=>'jux'));?>
           <table class="table table-condensed"> 
               <tr><td><label> Course Title*</label></td></tr>
               <tr><td><input type="text" name="cstitle" class="form-control" required></td></tr>
               <tr><td><label> Course Description*</label></td></tr>
               <tr><td><textarea type="text" name="csdec" class="form-control" required></textarea></td></tr>
               <tr><td><label> Seminar venue*</label></td></tr>
               <tr><td><input type="text" name="csvenue" class="form-control" required></td></tr>
               <tr><td><label> Seminar date*</label></td></tr>
               <tr><td><input type="text" name="csdate" class="form-control datepicker"></td></tr>
               <tr><td><label> Seminar Time*</label></td></tr>
               <tr><td><input type="text" name="cstime" class="form-control"></td></tr>
               <tr><td><button class="btn btn-primary btn-sm pull-right">submit</button></td></tr>
           </table>
           <?php echo form_close();?>
      </div>
  </div>
  <div class="col-lg-7">
      <div class=" panel panel-info"><label class="label label-success">Registered for seminar</label></div>
      <table class="table table-condensed tbs">
          <thead><tr><th>REGISTRATION NUMBER</th><th>FULL NAME</th><th>COURSE</th><th>SEMINAR DAY</th><th>SEMINAR HOUR</th><th>SEMINAR VENUE</th></tr></thead>
      <tbody>
          <?php 
          $res=$this->db->select('*')->from('tb_sem_reg')->join('tb_student','tb_student.registrationID = tb_sem_reg.registration_id')
                  ->get();
          if($res->num_rows()>0){
              foreach ($res->result() as $row){
                   if(($row->semina_day)!=='0'){
                  echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->student_name.''.' '.$row->other_name.'</td><td>'.$row->course.'</td><td>'.$row->semina_day.'</td><td>'.$row->semina_hour.'</td><td>'.$row->semina_venue.'</td></tr>';     
              }  else {
                  echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->student_name.''.' '.$row->other_name.'</td><td>'.$row->course.'</td><td></td><td>'.$row->semina_hour.'</td><td>'.$row->semina_venue.'</td></tr>'; 
              }
              }
          }
          
          ?>
      </tbody>
      </table>
      <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h6 class="modal-title" id="myModalLabel"><label class="pantop">Course register</label></h6>
                       </div>
                         <div class="modal-body">
                             <div class="loads"></div>
                         </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                        <script>
                        $('.datepicker').datepicker();
                        </script>
                    </div>
                  </div>
  </div>
      <script>
      function courescode(id){
          var formurl="<?php echo site_url('admin_page/course2');?>";
          var url=formurl+'/'+id;
          $.get(url,function(data){
              $('.loads').html(data);
          });
      }
      $('#jux').submit(function(e){
          e.preventDefault();
          $('.loads').html('<label class="label label-warning">Submitting....</label>');
          var fomz=$(this).serializeArray();
          var url=$(this).attr('action');
          $.post(url,fomz,function(data){
              setTimeout(function(){
                  $('.loads').html(data);
              },2000);
          });
      });
      </script>
       
 </div>
<?php include_once 'footer.php';