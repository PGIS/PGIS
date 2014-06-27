<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <div class="col-md-12">
        <div class="col-md-6 well well-sm">Dear <?php echo $this->session->userdata('userid');?></div>
        <div class="col-md-12">
            <div class="alert alert-warning">
                The application for postgraduate programs has been closed.The open date will be announced. 
                You will be notified when the application is Opened.
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
