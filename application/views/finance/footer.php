
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
    </div><!-- /#wrapper -->
    
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
   
<script>
   
  function ajaxFunction(id){
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState === 4){
      var ajaxDisplay = document.getElementById('resajax');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 ajaxRequest.open("GET", "financeadmin/applidetails/"+id, true);
 ajaxRequest.send(); 
 
}  

</script>
<script>
   
  function retrivedetails(id){
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState === 4){
      var ajaxDisplay = document.getElementById('regfindet');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 ajaxRequest.open("GET", "financeadmin/registrdetails/"+id, true);
 ajaxRequest.send(); 
 
}  

</script>
  </body>
</html>