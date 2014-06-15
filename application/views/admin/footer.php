<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script>
   $('.datepicker').datepicker(); 
</script>
<script>
    $(document).ready(function() {
    $('#admintable').dataTable();
    });
</script>
<script>
    $(document).ready(function() {
    $('#adminstaff').dataTable();
    });
</script>
<script>
    function editprograme(id) {
        var url = "<?php echo site_url('admin_page/editprograme'); ?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            $('#editprog').html(data);
        });
    }
    
    $(document).ready(function(){ 
        $('#course').dataTable(); 
    });
</script>
<script>
    
    $("#changeprogramme").submit(function(event) {
        event.preventDefault();
        $('#studentprogamme').html('<img src="<?php echo base_url('assets/img/loading.gif');?>">');
        var url = "<?php echo site_url('admin_page/changeProgramme'); ?>";
        var fdata = $('#changeprogramme').serializeArray();
        $.post(url, fdata, function(data) {
            $('#studentprogamme').html(data);
        });
    });
</script>
<script>
   $('.datepicker').datepicker(); 
</script>
</body>
</html>
