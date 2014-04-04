<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="col-md-6 well well-sm">Dear <?php echo $this->session->userdata('userid');?></div>
        <div class="col-md-12">
            <div>
                <pre>
                Your Application is being processed..please visit your account regularly to check for 
                Application progress
                </pre>
            </div> 
            
    
        
        </div>
    </div>
</div>
<?php include 'footer.php';?>