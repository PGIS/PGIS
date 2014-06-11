<?php
if ($this->session->userdata('user_role')==='department coordinator') {
       include_once 'Headerlogin.php';
}elseif ($this->session->userdata('user_role')==='head of department') {
      include_once 'Headerdephead.php';
}
 ?>
<div id="page-wrapper">
    <div class="well-sm alert-info">
        Presentation detail for:<?php if(isset($student_id))echo '<b>'.$lname.' '.$sname.'</b>';?><br>
        Registration number:<?php if(isset($student_id))echo '<b>'.$student_id.'</b>';?><br>
        Project title:<?php if(isset($ptitle))echo '<b>'.$ptitle.'</b>';?>
    </div>
    <div class="col-md-10">
        <table class="table" id="presf">
            <thead>
                <tr>
                    <th>Presentation date</th>
                    <th>Presentation at</th>
                    <th>Presentation for</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = $this->db->get_where('tb_verdicts', array('registrationId' =>$student_id));
                if($query->num_rows()>0){
                    foreach ($query->result() as $rlist){
                       ?>
                        <tr>
                            <td><?php echo $rlist->pr_date;?></td>
                            <td><?php echo $rlist->level;?></td>
                            <td><?php echo $rlist->type;?></td>
                            <td>
                                <a href="<?php 
                                if ($this->session->userdata('user_role')==='department coordinator') {
                                     echo site_url('department_Coordinator/viewVerdicts/'.$rlist->ver_id);
                                 }elseif ($this->session->userdata('user_role')==='head of department'){
                                     echo site_url('headDepartmet/viewVerdicts/'.$rlist->ver_id);
                                 }
                                ?>">
                                    <button type="button" class="btn btn-info btn-xs">View Feedback</button>
                                </a>
                            
                                <a href="<?php
                                if ($this->session->userdata('user_role')==='department coordinator') {
                                    echo site_url('department_Coordinator/downloadpdf/'.$rlist->ver_id);
                                 }elseif ($this->session->userdata('user_role')==='head of department'){
                                    echo site_url('headDepartmet/downloadpdf/'.$rlist->ver_id);
                                 }
                                ?>">
                                    <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download">Download PDF</span></button>
                                </a>
                            </td>
                        </tr>
                       <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once 'footer.php'; ?>