<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
  <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><center> Registration for Seminar</center></h3>
            </div>
       <div class="panel-body" align="center">
           <?php if(!empty($smg)){ echo '<p class="alert alert-success">'.$smg.'</p>';}
  ?>
  <form action="<?php echo site_url('seminary');?>" method="POST">
      Registration number<br>
      <input type="text" value="" name="usn"><br><br>
 <select name="day">
<option>Select day</option>		
<option valu="monday">Monday</option>
<option valu="tuesday">Tuesday</option>
<option valu="wednesday">Wednesday</option>
<option valu="thursday">Thursday</option>
<option valu="friday">Friday</option>
</select><br><br>
<select name="hr">
<option>Select Hour</option>			
<option value="7 am">0700-0800</option>
<option value="8 am">0800-0900</option></option>
<option value="9 am">0900-1000</option>
<option value="10 am">1000-1100</option>
<option value="11 am">1100-1200</option>
<option value="12 pm">1200-1300</option>
<option value="1 pm">1300-1400</option>
<option value="2 pm">1400-1500</option>
<option value="3 pm">1500-1600</option>
<option value="4 pm">1600-1700</option>
<option value="5 pm">1700-1800</option>
<option value="6 pm">1800-1900</option>
</select><br><br>
<input type="submit" name="submit" value="Register">
</form>      
   </div>  
</div>
<?php 
include_once 'footer.php';
?>
 

