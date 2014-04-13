
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script> 
    $(document).ready(function(){ 
        $('#mytable').dataTable(); 
    });
    
     $(document).ready(function(){ 
        $('#mytable1').dataTable(); 
    });
</script>
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
            alert("You have chosen to accept the information provided");
            window.location.reload(true);
        });
    }
    
    function denying(id){
        var url = "financeadmin/verifyappfee/"+id+"/rejected";
        $.get(url, function(data) {
            $('#resajax').html(data);
            alert("You have chosen to alert the user that infrormation provided is Wrong");
            window.location.reload(true);
        });
    }
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