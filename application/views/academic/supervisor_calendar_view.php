<?php include_once 'Headerloginsuper.php';?>
<div id="page-wrapper">
  <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title"><center> Add Events</center></h3>
            </div>
       <div class="panel-body">
           
       <?php echo $calendar;?>
           <script>
           $(document).ready(function(){
               $('.calendar .day').click(function(){
                   day_num=$(this).find('.day_num').html();
                   day_data=prompt('Enter your event',$(this).find('.content').html());
                   if(day_data!==null){
                      $.ajax({
                          url:window.location,
                          type:"POST",
                          data:{
                             day:day_num,
                             data:day_data
                         },
                      success:function(smg){
                         location.reload(); 
                      }
                      }); 
                   }
               });
           });
           
           
           </script>
       
   </div>  
</div>
    </div>
<?php include_once 'footer.php';?>

