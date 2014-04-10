<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
              <li class="active">
                  
              </li>
            </ul>
<div class="tab-content" style="display: block;">
    <div class="course in tab-pane active">
    <div class="home in tab-pane <?php if(isset($active2)){echo'active';}?>">
        <div class="pantop"><h4>Payment Results</h4></div>
 
        <div class="col-md-6">
            <table class="table table-striped table-condensed"><tr><td><label>Select year</label></td><td><select name="data" id="chose">
                            <option class="norow"></option><option class="year1">Year 1</option><option class="year2">Year 2</option><option class="year3">Year 3</option><option class="year4">Year 4</option>
                          </select></td></tr></table>
               
            <table class="table table-striped cont"> 
                <tr><td><label class="dts">Academic Year </label> </td><td><b><?php echo ' '.$academic;?></b></td></tr>
             <tr><td><strong class="dts">Application Name</strong></td><td><b><?php echo ' '.ucfirst(strtolower(addslashes($application_id)));?></b></td></tr>
             <tr><td><strong class="dts">Registration Fees For</strong></td><td><b><?php echo ' '.$registration;?></b></td></tr>
             <tr><td><strong class="dts">Registration Fees Amount</strong></td><td><b><?php echo' '.$registration_amount?></b></td></tr>
             <tr><td><strong class="dts">Registration Fees Receipt</strong></td><td><b><?php echo ' '.$registration_receipt;?></b></td></tr>
             <tr><td><strong class="dts">Outstanding Fees</strong></td><td><b><?php echo' '.($registration_total-$registration_amount);?></b></td></tr>
             <tr><td><strong class="dts">Payment Mode</strong></td><td><b><?php echo ' '.$payment;?></b></td></tr>
             <tr><td><strong class="dts">Payment Date</strong></td><td><b><?php echo ' '.$date_pay;?></b></td></tr>
           
        </table>
        </div>
        <div class="col-md-6">
            
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel">image</h6>
                        </div>
                        <div class="modal-body">
                            <img src="<?php echo ''.$support_doc;?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
         </div>
            <div class="bs-docs-example" style="padding-bottom: 24px;">
                <a data-toggle="modal" href="#myModal" style="color:white;" class="btn btn-primary btn-large">View your document</a><label>Supporting Document</label></div>
        <table class="table table-striped">
            <label>OPTIONAL CHOICES*</label>
            <tr><td><strong class="dts">Number of Postponement</strong></td><td><b><?php echo ''.$postponement;?></b></td></tr>
            <tr><td><strong class="dts">Date of Postponement</strong></td><td><b><?php echo ''.$postponement_date;?></b></td></tr>
            <tr><td><strong class="dts">Postponement Reasons</strong></td><td><b><?php echo ''.$post_reasons;?></b></td></tr>
            <tr><td><strong class="dts">Number of Freezing</strong></td><td><b><?php echo ''.$freezing;?></b></td></tr>
            <tr><td><strong class="dts">Date of Freezing</strong></td><td><b><?php echo ''.$freez_date;?></b></td></tr>
            <tr><td><strong class="dts">Date of Resume</strong></td><td><b><?php echo''.$resume_date;?></b></td></tr>
            <tr><td><strong class="dts">Reasons for Extension</strong></td><td><b><?php echo ''.$freez_reasons;?></b></td></tr>
            <tr><td><strong class="dts">Number of Extension</strong></td><td><b><?php echo ''.$extension;?></b></td></tr>
            <tr><td><strong class="dts">Date of Extension</strong></td><td><b><?php echo ''.$ext_date;?></b></td></tr>
            <tr><td><strong class="dts">Extension Period</strong></td><td><b><?php echo ''.$period;?></b></td></tr>
            <tr><td><strong class="dts">Reasons for Extending</strong></td><td><b><?php echo ''.$exte_reasons;?></b></td></tr>
        </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
    <script>
   $(document).ready(function(){
      $('.norow').click(function(){
        $('.cont').hide();
          alert('You must select registration year');
       }); 
       $('#chose').on('change',function(){
            var year = $(this).val();
            $.ajax({
                url: window.location,
                type:"POST",
                data:{
                   data:year 
                },
                success:function(smg){
                    location.reload();
            }
            });
       });
       
    });
    
    </script>
<?php include_once 'footer.php';?>

