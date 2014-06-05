<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
      <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/viewcourz');?>"><span class="glyphicon glyphicon-eye-open"></span> Registered for seminar</a></li>
        </ol>
   <div class="col-lg-6">
       <table class="table table-condensed" id="course">
           <thead><tr><th>course present</th><th>Action</th></tr></thead>
           <tbody>
             <?php
       $rest=$this->db->get('tb_course');
       if($rest->num_rows()>0){
           foreach ($rest->result() as $dt){
             echo '<tr><td>'.$dt->course_code.'</td><td><div class="btn-group btn-group-xs"><button class="btn btn-success btn-xs pull-right" data-toggle="dropdown"> Action<b class="caret"></b></button>';
                       echo '<ul class="dropdown-menu" role="menu">';
                       echo '<li><a href="#" onclick="courescode(\''.$dt->id.'\')" data-target="#lop" data-toggle="modal"><span class="glyphicon glyphicon-book"></span>Register seminar</a></li>';
                       echo '<li><a href="#" onclick="courescodedelete(\''.$dt->id.'\')"><span class="glyphicon glyphicon-trash"></span>Delete course</a></li>';
                       echo '<li><a href="#" onclick="courescodeother(\''.$dt->id.'\')"><span class="glyphicon glyphicon-star"></span>Other</a></li>';
                       echo '</ul></div>';
                       echo '</td></tr>';
               
           }
       }
       ?>
       </tbody>
       </table>
       <div class="modal fade" id="lop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"></h6>
                          </div>
                          <div class="modal-body">
                            <div class="loadz"></div>
                         </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
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
       var formurl="<?php echo site_url('admin_page/course2');?>";
          var url=formurl+'/'+id;
          $.get(url,function(data){
           $('.loadz').html(data);
          });
      }
      function courescodedelete(id){
          var urlz="<?php echo site_url('admin_page/coursedelete');?>";
          var urlz2=urlz+'/'+id;
          $.get(urlz2,function(data){
              location.reload();
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