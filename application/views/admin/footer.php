
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#admintable').dataTable();
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
</script>
<script>
    $("#changeprogramme").submit(function(event) {
        event.preventDefault();
        var url = "<?php echo site_url('admin_page/changeProgramme'); ?>";
        var fdata = $('#changeprogramme').serializeArray();
        $.post(url, fdata, function(data) {
            $('#studentprogamme').html(data);
        });
    });
</script>
</body>
</html>