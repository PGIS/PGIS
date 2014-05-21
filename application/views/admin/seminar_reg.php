<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
  <div class="well well-sm"><p align="center">Seminar Registration in a Week</p></div>
  <div class="col-lg-4">
     <select name="mycourse" class="form-control">
          <option value="">SELECT COURSE TO REGISTER</option>
          <option value="IS 601" data-target="#list" data-toggle="modal">IS 601</option>
          <option value="IS 602" data-target="#list2" data-toggle="modal">IS 602</option>
          <option value="IS 603" data-target="#list3" data-toggle="modal">IS 603</option>
          <option value="IS 604" data-target="#list4" data-toggle="modal">IS 604</option>
          <option value="IS 605" data-target="#list5" data-toggle="modal">IS 605</option>
          <option value="IS 606" data-target="#list6" data-toggle="modal">IS 606</option>
          <option value="IS 607" data-target="#list7" data-toggle="modal">IS 607</option>
          
      </select>
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
                  echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->student_name.''.' '.$row->other_name.'</td><td>'.$row->course.'</td><td>'.$row->semina_day.'</td><td>'.$row->semina_hour.'</td><td>'.$row->semina_venue.'</td></tr>';     
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
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 601</label></h6>
                          <div class="loading"></div>
                        </div>
                          <?php echo form_open('admin_page/course1',array('id'=>'load'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 601</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 601">IS 601</option>
                                    </select></td></tr>
                            </table>
                            <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 602</label></h6>
                          <div class="loading1"></div>
                        </div>
                          <?php echo form_open('admin_page/course2',array('id'=>'load1'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 602</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 602">IS 602</option>
                                    </select></td></tr>
                            </table>
                            <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 603</label></h6>
                          <div class="loading2"></div>
                        </div>
                          <?php echo form_open('admin_page/course3',array('id'=>'load2'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 603</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 603">IS 603</option>
                                    </select></td></tr>
                            </table>
                            <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 604</label></h6>
                          <div class="loading3"></div>
                        </div>
                          <?php echo form_open('admin_page/course4',array('id'=>'load3'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 604</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 604">IS 604</option>
                                    </select></td></tr>
                            </table>
                             <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 605</label></h6>
                          <div class="loading4"></div>
                        </div>
                          <?php echo form_open('admin_page/course5',array('id'=>'load4'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 605</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 605">IS 605</option>
                                    </select></td></tr>
                            </table>
                             <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 606</label></h6>
                          <div class="loading5"></div>
                        </div>
                          <?php echo form_open('admin_page/course6',array('id'=>'load5'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 606</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 606">IS 606</option>
                                    </select></td></tr>
                            </table>
                             <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <div class="modal fade" id="list7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">IS 607</label></h6>
                          <div class="loading6"></div>
                        </div>
                          <?php echo form_open('admin_page/course7',array('id'=>'load6'));?>
                        <div class="modal-body">
                            <table class="table table-condensed">
                            <tr><td>
                           <label>Seminar day</label><input type="text" name="smd" class="form-control " required placeholder="seminar day"></td>
                                <td>
                                    <label>IS 607</label>
                                    <select name="course" class="form-control">
                                        <option value="IS 607">IS 607</option>
                                    </select></td></tr>
                            </table>
                             <label>Seminar Hour</label>
                            <table class="table table-condensed">
                                <tr><td>Morning<input type="text" name="smm" class="form-control " placeholder="hour">
                                 </td><td>Afternoon<input type="text" name="sma" class="form-control "placeholder="hour">
                                 </td><td>Evening<input type="text" name="sme" class="form-control " placeholder="hour"></td></tr>
                            </table>
                            <label>Seminar Venue</label><input type="text" name="smv" class="form-control " required placeholder="seminar venue">
                            <label>Maximum Limit</label><input type="text" name="max" class="form-control ">
                            
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">register</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
      <script>
      $('#load').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading').html(data);
       });
      });
      $('#load1').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading1').html(data);
       });
      });
      $('#load2').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading2').html(data);
       });
      });
      $('#load3').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading3').html(data);
       });
      });
      $('#load4').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading4').html(data);
       });
      });
      $('#load5').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading5').html(data);
       });
      });
      $('#load6').submit(function(e){
          e.preventDefault();
      var formdata= $(this).serializeArray();
       var url= $(this).attr('action');
       $.post(url,formdata,function(data){
           $('.loading6').html(data);
       });
      });
      </script>
       
 </div>
<?php include_once 'footer.php';