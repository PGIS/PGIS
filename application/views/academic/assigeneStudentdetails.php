
    <?php 
         $this->db->select('*');
         $this->db->where('registrationID', $regid); 
         $this->db->from('tb_student');
         $this->db->join('tb_project', 'tb_project.registration_id = tb_student.registrationID');
         $myquer = $this->db->get();
         foreach ($myquer->result() as $stdetail){
             ?>
    <table class="table">
        <tr>
            <td>Student Name:<?php echo '<b class="dts1">'.$stdetail->surname.' '.$stdetail->other_name.'</b>';?></td>
            
        </tr>
        <tr>
            <td>Registration number:<?php echo '<b class="dts1">'.$stdetail->registrationID.'</b>';?></td>
            
        </tr>
        <tr>
            <td>Course:<?php echo '<b class="dts1">'.$stdetail->program.'</b>';?></td>
            
        </tr>
        <tr>
            <td>Thesis/Dissertation:<?php echo '<b class="dts1">'.$stdetail->project_title.'</b>';?></td>
            
        </tr>
    </table>    
            <?php
         }
    ?>
