
<div class="col-md-12"><footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer></div>
</div><!-- /#wrapper -->
<script src="<?php echo base_url('assets/js/datepicker.js')?>"></script>
<script>
    window.brunch = window.brunch || {};
    window.brunch['auto-reload'] = {
        enabled: true
    };
</script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/tabcordion.js') ?>"></script>
<script>
    $(function() {
        $('.tabcordion').tabcordion()
    });
    $('.datepicker').datepicker();
    $('.datepicke').datepicker();
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#disabi").hide();
        $("#yes").click(function() {
            $('#disabi').show();
        });
        $("#no").click(function() {
            $('#disabi').hide();
        });
    });
</script>
<script>
    $("#cye").change(function() {
        var f = document.getElementById("cye").value;
       
        var url = "finance_page/"+$.trim(f);
        $.get(url, function(data) {
            $('#yearlydetail').html(data);
        });
    });
</script>
</body>
</html>