<?php include_once 'Headerloginexternalsup.php';?>
<div id="page-wrapper">
    <ol class="breadcrumb">
            <li class="active"><a href="<?php echo site_url('externalSup');?>">Student assigned</a></li>
            <li><a href="<?php echo site_url('externalSup/project');?>">Submitted dissertation</a></li>
            <li><a href="<?php echo site_url('externalSup/replied');?>">Replied dissertation</a></li>
             <li><a href="<?php echo site_url('externalSup/verdicts');?>">View Presentation Feedback</a></li>
        </ol>
        <div class="col-md-8">
            <?php
            $this->db->select('*');
            $this->db->from('tb_verdicts');
            $this->db->join('tb_project','tb_project.registration_id = tb_verdicts.registrationId');
            $this->db->where(array('external_supervisor'=>$this->session->userdata('email')));
            $query=$this->db->get();
            if($query->num_rows()>0){
                echo '<table class="table" id="double">'
                . '<thead><tr>'
                        . '<th>Registration number</th>'
                        . '<th>Presentation date</th>'
                        . '<th>View</th>'
                        . '<th>Download</th>'
                        . '</tr></thead>';
                foreach ($query->result() as $list){
                   ?>
                    <tr>
                        <td><?php echo $list->registrationId;?></td>
                        <td><?php echo $list->pr_date;?></td>
                        <td><a href="<?php echo site_url('externalSup/viewVerdicts/'.$list->ver_id);?>">
                            <button type="button" class="btn btn-info btn-xs">View Feedback</button>
                            </a>
                        </td>
                        <td><a href="<?php echo site_url('externalSup/downloadpdf/'.$list->ver_id);?>">
                                <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download"> Download pdf</span></button>
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

