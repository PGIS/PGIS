<?php
        $rest=$this->db->get_where('tb_seminar',array('id'=>$view));
          foreach ($rest->result() as $tc){
        ?>
        <div class=" panel panel-info"><label class="label label-success">Registered for seminar: </label><span class="label label-danger pull-right"><?php echo ''.$tc->course;?></span></div>
      <table class="table table-condensed tbs">
          <thead><tr><th>REGISTRATION NUMBER</th><th>FULL NAME</th><th>COURSE</th><th>SEMINAR DAY</th><th>SEMINAR HOUR</th><th>SEMINAR VENUE</th></tr></thead>
      <tbody>
          <?php
          
          $res=$this->db->select('*')->from('tb_sem_reg')->join('tb_student','tb_student.registrationID = tb_sem_reg.registration_id')
                 ->where(array('course'=>$tc->course))->get();
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
        <?php
        }
        ?>
        <script>
        $(document).ready(function(){ 
        $('.tbs').dataTable(); 
    });
        </script>

