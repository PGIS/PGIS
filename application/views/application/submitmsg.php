<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="col-md-6 well well-sm">Dear <?php echo $this->session->userdata('userid');?></div>
        <div class="col-md-12">
            
            <?php
            $sent='sent';
            $this->db->where('app_id', $this->session->userdata('userid')); 
            $query = $this->db->get_where('tb_app_prev_info', array('admision_letter' => $sent));
            if($query->num_rows()==1){
             echo '<div class="well well-sm">';
                echo 'Congratulations for being admitted to the University of Dar es Salaam.<br>';
                echo 'You have received admision letter.To accept the letter click the aceptance button and '
                . 'Download the admision letter.<br>';
                echo '<a href="'.site_url('messages/downlod_admsil').'"><button type="button" class="mybtn btn-primary">Accept Admision letter'
                . ' <span class="glyphicon glyphicon-download-alt"></span></button></a><br>';
                echo '<p>To confirm details in the  admision letter just click accept detail button.</p>';
                echo '<a href="'. site_url('application/fulladmision').'"><button type="button" class="mybtn btn-primary">Confirm Details'
                . ' <span class="glyphicon glyphicon-ok-sign"></span></button></a>';
                echo '</div>';  
             }
            else {
                echo '  
            <div>
                <pre>
                Your Application is being processed..please visit your account regularly to check for 
                Application progress
                </pre>
            </div> ';
            }
               ?> 
            <div>
                
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>