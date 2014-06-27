<?php include_once 'Headerdephead.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="col-md-6 active"><a href="#home" data-toggle="tab">Manage Student Progress</a></li>
            <li class="col-md-6"><a href="#profile" data-toggle="tab">View Student Progress</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <br>
                <div class="col-md-6">
                   <?php 
                    $res=  $this->db->get_where('tb_student',array('department'=>$this->session->userdata('mydepartment')));
                    if($res->num_rows()>0){
                        echo 
                        '<table class="table" id="studenttable">
                               
                                <thead>
                                   <tr>
                                        <th>Student Name</th>
                                        <th>Registration #</th>
                                        <th>Record event</th>
                                   </tr>   
                                </thead>
                                <tbody>';
                       foreach($res->result() as $strecord){
                           ?>
                        <tr>
                            <td><?php echo $strecord->surname .' '.$strecord->other_name;?></td>
                            <td><?php echo $strecord->registrationID;?></td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-info">Event</button>
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                  <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="postpone('<?php echo $strecord->registrationID; ?>')">Postponement</a></li>
                                  <li><a href="#" onclick="disco('<?php echo $strecord->registrationID; ?>')">Discontinue</a></li>
                                  <li><a href="#" onclick="extension('<?php echo $strecord->registrationID; ?>')">Extension</a></li>
                                  <li><a href="#" onclick="resume('<?php echo $strecord->registrationID; ?>')">Resume</a></li>
                                  <li><a href="#" onclick="freezing('<?php echo $strecord->registrationID; ?>')">Freezing</a></li>
                                </ul>
                              </div>
                            </td>
                            
                        </tr>
                           
                           <?php
                       }
                       echo ' </tbody></table>';
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">Record Student Progress</h3>
                        </div>
                    <div class="panel-body" id="events">
                      
                    </div>
                   </div>  
                </div>
            </div>
            
            
            
            <div class="tab-pane" id="profile">
              
                <div class="col-md-10 col-lg-offset-1">
                    <form>
                        <div class="col-md-6">
                           Choose Student progress to view  
                        </div>
                        <div class="col-md-6">
                            <select class="form-control input-sm" name="event"  id="cye">
                                <option>Freezing</option>
                                <option>Postponement</option>
                                <option>Extension</option>
                                <option>Discontinue</option>
                            </select> 
                        </div>
                    </form>
                </div>
                <div class="col-md-12" id="eventview">
                    <div class="col-md-6">
                    <?php
                      echo '<div class="well-sm alert-info">Student with freezing record</div>';
                      $this->db->select('*');
                      $this->db->from('tb_event_freez');
                      $this->db->where('status', NULL);
                      $this->db->join('tb_student', 'tb_student.registrationID = tb_event_freez.registration_ID');
                      $myquer = $this->db->get();
                      if($myquer->num_rows()>0){
                           echo 
                        '<table class="table" id="studentable">
                                <thead>
                                   <tr>
                                        <th>Student Name</th>
                                        <th>Registration #</th>
                                        <th>View status</th>
                                   </tr>   
                                </thead>
                                <tbody>';
                          foreach ($myquer->result() as $frlist){
                              if($frlist->department==$this->session->userdata('mydepartment')){
                                  echo '<tr>';
                                  echo '<td>'.$frlist->surname .' '.$frlist->other_name.'</td>'; 
                                  echo '<td>'.$frlist->registrationID.'</td>';?> 
                                  <td><button onclick="fetchRecorededFreezing('<?php echo $frlist->registrationID; ?>')" class="btn btn-xs btn-info">View</button></td>
                                 <?php echo '</tr>';
                              }
                          }
                         echo ' </tbody></table>';
                      }else{
                          echo '<br><div class="alert alert-warning">Student with freezing record </div>';
                      }
                    ?>
                    </div>
                    <div class="col-md-6" id="viewrevnt">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function fetchRecorededFreezing(id) {
    var url = "departStudentManage/fetchRecordedFreez/" + id;
    $.get(url, function(data) {
        $('#viewrevnt').html(data);
    });
}
</script>
<?php include_once 'footer.php'; ?>

