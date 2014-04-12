
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

<script>

    function ajaxFunction(id) {
        var url = "financeadmin/applidetails/" + id;
        $.get(url, function(data) {
            $('#resajax').html(data);
        });
    }
    
    function verifying(id){
        var url = "financeadmin/verifyappfee/"+id+"/accepted";
        $.get(url, function(data) {
            $('#resajax').html(data);
            alert("You have chosen to accept the information provided")
            window.location.reload(true);
        });
    }
    $(document).ready(function() {
       
        //4 methods implementing ajax using jquery
        // $.post(url, {json} , callback );
        // $.get(url,  callback );
        // $.ajax({});
        // $.load(url, opt, callback);
        
    });
    $("#yes").click(function(){
       $('#resajax').html('null'); 
        });

</script>
<script>
    function retrivedetails(id) {
         var url = "financeadmin/registrdetails/" + id;
        $.get(url, function(data) {
            $('#regfindet').html(data);
        });
       
        }
</script>
</body>
</html>