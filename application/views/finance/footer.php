
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#mytable').dataTable();
    });

    $(document).ready(function() {
        $('#mytable1').dataTable();
        $('#appfeevalid').dataTable();
       
    });
    $(document).ready(function() {
         $('#fincedetail').dataTable();
        $('input').addClass('tablesearch');
    });
</script>
<script>
    function finahistory(regid) {
         var url = "financehistory/historyfinance/"+regid;
        $.get(url, function(data) {
            $('#finhisto').html(data);
        });
    }
</script>
<script>

    function ajaxFunction(id) {
        var url = "financeadmin/applidetails/" + id;
        $.get(url, function(data) {
            $('#resajax').html(data);
        });
    }

    function verifying(id) {
        if(confirm('You have chosen to accept the information provided.click ok to continue')){
        var url = "financeadmin/verifyappfee/" + id + "/accepted";
        $.get(url, function(data) {
            $('#resajax').html(data);
            window.location.reload(true);
        });
    }
    }

    function denying(id) {
        var url = "financeadmin/verifyappfee/" + id + "/rejected";
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
    function tuitverifying(id) {

        if (confirm('You about to accept the tution fee datail.are you sure?')) {
            var url = "financeadmin/tutionfeeverify/" + id + "/accepted";
            $.get(url, function(data) {
                $('#regfindet').html(data);
                window.location.reload(true);
            });

        }
    }
    function tutdenying(id) {
        if (confirm('You about to Reject the tution fee datail.are you sure?')) {
            var url = "financeadmin/tutionfeeverify/" + id + "/rejected";
            $.get(url, function(data) {
                $('#regfindet').html(data);
                window.location.reload(true);
            });
        }
    }

</script>
</body>
</html>