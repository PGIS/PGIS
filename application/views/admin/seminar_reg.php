<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
      <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/viewcourz');?>"><span class="glyphicon glyphicon-eye-open"></span> Registered for seminar</a></li>
        </ol>
   <div class="col-lg-6">
       <select name="mycourse" class="form-control">
          <option value="">SELECT COURSE TO REGISTER</option>
       <?php
       $rest=$this->db->get('tb_course');
       if($rest->num_rows()>0){
           foreach ($rest->result() as $dt){
               echo '<option onclick="courescode(\''.$dt->id.'\')">'.$dt->course_code.'</option>';
               
           }
       }  else {
           echo '<option>No course found</option>';   
       }
       ?>
     </select>
    <div class="panel" style="margin-top: 20px;">
     <div class="panel-body">
       <div class="loadz"></div>
       </div>
       </div>
  </div>
  <div class="col-lg-6">
  <label class="text-primary" style="margin-top: 10px;">Specify other seminar</label>
      <div class="loads">
           <?php echo form_open('admin_page/specify',array('id'=>'jux'));?>
           <table class="table table-condensed"> 
               <tr><td><label> Seminar Title*</label></td><td><input type="text" name="cstitle" class="form-control" required></td></tr>
               <tr><td><label> Seminar Description*</label></td><td><textarea type="text" name="csdec" class="form-control" required></textarea></td></tr>
               <tr><td><label> Seminar venue*</label></td><td><input type="text" name="csvenue" class="form-control" required></td></tr>
               <tr><td><label> Seminar date*</label></td><td><input type="text" name="csdate" class="form-control datepicker"></td></tr>
               <tr><td><label> Seminar Time*</label></td><td><input type="text" name="cstime" class="form-control"></td></tr>
               <tr><td colspan="1"></td><td><button class="btn btn-primary btn-sm pull-right">submit</button></td></tr>
           </table>
           <?php echo form_close();?>
      </div>  
  </div>
      <script>
      function courescode(id){
          $('.loadz').html('<label class="label label-warning">Loading..</label>');
          var formurl="<?php echo site_url('admin_page/course2');?>";
          var url=formurl+'/'+id;
          $.get(url,function(data){
              setTimeout(function(){
              $('.loadz').html(data);
              },2000);
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