<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <div class="well-sm alert-info">
            <h3>Welcome 
                <?php if ($this->session->userdata('logged_in')) {
                         echo $this->session->userdata('userid');
                    }
                 ?>.
            </h3>
            You have login as accountant, College of Information and Communication Technology
        </div>
        <br>
        <div class="col-md-12 center-block">
        <div class="col-md-6 ">
            <a href="<?php echo site_url('financeadmin'); ?>">
                <div class="alert alert-warning">
                   <h5 class="">Finance Management</h5>
                    <p class="">
                        Verification of Application fee .<br>
                        Verification of Tuition fee.
                    </p> 
                </div>
                
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo site_url('financehistory'); ?>">
                <div class="alert alert-info">
                   <h5 class="">Payment History</h5>
                    <p class="">
                        View Student payment History.<br>
                        View outstanding payments
                    </p> 
                </div>
                
            </a>
        </div>
        
        <div class="col-md-6 col-md-offset-3">
            <a href="<?php echo site_url('change_form'); ?>">
                <div class="alert alert-danger">
                   <h5 class="">manage your profile</h5>
                    <p class="">Change password and contacts information </p> 
                </div>
                
            </a>
        </div>
    </div>
    </div>
</div>
<?php include_once 'footer.php';?>