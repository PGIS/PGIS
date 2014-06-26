<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <?php
    if(isset($firstin)){
        echo ''
        . '<div class="alert alert-success">Congratulation You can now continue with registration</div>';
        
    }
    ?>
    <div class="col-md-12 center-block">
        <div class="col-md-6 ">
            <a href="<?php echo site_url('finance_page/finance'); ?>">
                <div class="alert alert-warning">
                   <h5 class="">Registration</h5>
                    <p class="">complete registration by paying fee and other direct cost,and view 
                         payments detail
                    </p> 
                </div>
                
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo site_url('project_page'); ?>">
                <div class="alert alert-info">
                   <h5 class="">Project progress</h5>
                    <p class="">
                    <li>submits proposal and proposal progress</li>
                    <li>submits dissertation/thesis progress</li>
                        </p> 
                </div>
                
            </a>
        </div>
        <div class="col-md-6">
           <a href="<?php echo site_url('calendar/display_cal'); ?>">
                <div class="alert alert-info">
                   <h5 class="">Events and seminar</h5>
                    <p class="">view calendar events and register for seminar</p> 
                </div>
                
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo site_url('change_form'); ?>">
                <div class="alert alert-warning">
                   <h5 class="">manage your profile</h5>
                    <p class="">Change password and contacts information </p> 
                </div>
                
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <?php
        $query = $this->db->get_where('tb_event_extend', array('registration_ID	' => $this->session->userdata('registration_id'),'status'=>NULL));
        $query1 = $this->db->get_where('tb_event_freez', array('registration_ID	' => $this->session->userdata('registration_id'),'status'=>NULL));
        $query2 = $this->db->get_where('tb_event_postpone', array('registration_ID' => $this->session->userdata('registration_id'),'status'=>NULL));
        if($query->num_rows()>0){
            
           foreach ($query->result() as $fr){
                $from=$fr->from;
                $to=$fr->to;
                $period=$fr->period;
            }
            echo ''
            . '<div class="alert alert-danger">'
               . 'You are currently in Extension Period. Your extension is from '.$from.
            ' to <b>'.$to.'</b> a period of '.$period.' months<div>';
            
        }elseif ($query1->num_rows()>0) {
            
            foreach ($query1->result() as $fr){
                $from=$fr->from;
                $to=$fr->to;
            }
            echo ''
            . '<div class="alert alert-danger">'
               . 'You are currently in Freezing Period from '.$from.
            ' <br>You are expecting to resume your studies on <b>'.$to.'</b> <div>';
            
        }elseif ($query2->num_rows()>0) {
            
             foreach ($query2->result() as $fr){
                $from=$fr->from;
                $to=$fr->to;
            }
            echo ''
            . '<div class="alert alert-danger">'
               . 'You are currently in posponement period from '.$from.
            ' <br>You are expected to resume your studies on <b>'.$to.'</b> <div>';
               
        }
        
        
        ?>
    </div>
</div>
<?php include_once 'footer.php';?>