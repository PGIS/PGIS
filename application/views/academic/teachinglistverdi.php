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
                    </tr>
                   <?php
                }
                echo '</table>';
            }else{
                echo '<div class="alert alert-warning">No any presentation feedback</div>';
            }
            ?>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>

