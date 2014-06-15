<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="col-md-6 well well-sm">Dear <?php echo $this->session->userdata('userid');?></div>
        <div class="col-md-12">
            <div>
                <pre>You did not finish  the Application as some of the important information are still missing
                Make sure that you finish the Application before deadline
                Application will be closed on 
                   <?php 
                    $query = $this->db->get('tb_system_setting');
                       if($query->num_rows()>0){
                           foreach ($query->result() as $row){
                             $closedate=$row->appdeadline;
                          }
                          echo $closedate;
                       }
                   ?>
                </pre>
            </div> 
            <?php
            $thiquery = $this->db->get_where('tb_finance_application', array('userid' => $this->session->userdata('userid'),'appl_status'=>'rejected'));
            if($thiquery->num_rows()>0){
                echo '<div class="alert alert-danger"><p><h4>Plese note</h4></p>The information you have provided about application fee'
                . ' is not correct.please recheck and submit again.Your application wont be processed untill the'
                        . ' valid information is sent.</div>';
            }
            ?>
    <div class='app'>
        <a href="<?php echo site_url('application/apply');?>">
            <button type="button" class="mybtn btn-primary">continue with online application
            <span class="glyphicon glyphicon-new-window"></span>
            </button>
        </a>
    </div>
        
        </div>
    </div>
</div>
<?php include 'footer.php';?>