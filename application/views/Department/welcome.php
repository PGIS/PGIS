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
            You have login as  
             <?php if ($this->session->userdata('mydepartment')) {
                         echo strtoupper($this->session->userdata('mydepartment'));
                    }
                 ?> Department Coordinator 
        </div>
        <br>
        <div class="col-md-12 center-block">
        <div class="col-md-6 ">
            <a href="<?php echo site_url('department_Coordinator'); ?>">
                <div class="alert alert-warning">
                   <h5 class="">Applicants admission</h5>
                    <p class="">
                        Process application for applicants at department level.
                    </p> 
                </div>
                
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo site_url('department_Coordinator/presentationFeedback'); ?>">
                <div class="alert alert-info">
                   <h5 class="">Presentation Feedback</h5>
                    <p class="">
                       Register and view presentation feedback 
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