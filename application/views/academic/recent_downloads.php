<?php include_once 'Headerloginteaching.php';?>
<div id="page-wrapper">
    <div class="col-lg-12">
        <div class="well well-sm"><label class="dts">Recent post for: <?php echo ' '.' '.$firstname.' '.' '.' '.$othername.''.' '.'(reg#:'.' '.$registration.')';?></label><a href="<?php echo site_url('teaching/replied');?>" class="glyphicon glyphicon-backward pull-right"></a> </div>
          <table class="table table-striped" id="mytablet4">
                                <thead><tr><th>FILE NAME</th><th>POSTED DATE</th><th>ACTION<b class="caret"></b></th></tr></thead>'
                                <tbody>
                                 <?php 
                                 
                                 foreach ($look->result() as $row){
                                     echo '<tr><td>'.substr($row->document,39).'</td><td>'.$row->submission_date.'</td><td>'.anchor('teaching/donforce/'.$row->registrationID,'<span class="glyphicon glyphicon-download-alt">Download</span>').'</td></tr>';
                                 }
                                 ?>
                                </tbody>
                            </table>
                        
    </div>
    </div>
<?php include_once 'footer.php';?>


