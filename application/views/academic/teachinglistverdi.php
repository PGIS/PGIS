<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('teaching');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('teaching/project');?>">Submitted project</a></li>
            <li><a href="<?php echo site_url('teaching/replied');?>">Replied project</a></li>
            <li><a href="<?php echo site_url('teaching/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
        <div class="col-md-8">
            <?php
            $query = $this->db->get_where('tb_verdicts', array('supervisor'=>$this->session->userdata('email')));
            $query1=$this->db->select('*')->from('tb_verdicts')->join('tb_project','tb_project.registration_id = tb_verdicts.registrationId')
                    ->where(array('sec_internal_supervisor'=>$this->session->userdata('email')))->get();
            if($query->num_rows()>0){
                echo '<table class="table">'
                . '<thead><tr>'
                        . '<th>Registration number</th>'
                        . '<th>Presentation date</th>'
                        . '<th>View</th>'
                        . '</tr></thead>';
                foreach ($query->result() as $list){
                   ?>
                    <tr>
                        <td><?php echo $list->registrationId;?></td>
                        <td><?php echo $list->pr_date;?></td>
                        <td><a href="<?php echo site_url('teaching/viewVerdicts/'.$list->ver_id);?>">
                            <button type="button" class="btn btn-info btn-xs">View Feedback</button>
                            </a>
                        </td>
                        <td><a href="<?php echo site_url('teaching/downloadpdf/'.$list->ver_id);?>">
                                <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download"> Download pdf</span></button>
                            </a>
                        </td>
                    </tr>
                   <?php
                }
                echo '</table>';
            }elseif ($query1->num_rows()>0) {
             echo '<table class="table">'
                . '<thead><tr>'
                        . '<th>Registration number</th>'
                        . '<th>Presentation date</th>'
                        . '<th>View</th>'
                        . '</tr></thead>';
                foreach ($query1->result() as $row){
                   ?>
            <tr>
                        <td><?php echo $row->registrationId;?></td>
                        <td><?php echo $row->pr_date;?></td>
                        <td><a href="<?php echo site_url('teaching/viewVerdicts/'.$row->ver_id);?>">
                            <button type="button" class="btn btn-info btn-xs">View Feedback</button>
                            </a>
                        </td>
                        <td><a href="<?php echo site_url('teaching/downloadpdf/'.$row->ver_id);?>">
                                <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download"> Download pdf</span></button>
                            </a>
                        </td>
            </tr>
            <?php
               }
               echo '</table>';
            }
            else{
                echo '<div class="alert alert-warning">No any presentation feedback</div>';
            }
            ?>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>

