
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
    </div><!-- /#wrapper -->
   
   <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script> 
    $(document).ready(function(){ 
        $('#mytable').dataTable(); 
    });
    $(document).ready(function(){ 
        $('.datepicker').datepicker(); 
    });
     $(document).ready(function(){ 
        $('#mytable1').dataTable(); 
    });
     $(document).ready(function(){ 
        $('#mytablet').dataTable(); 
    });
     $(document).ready(function(){ 
        $('#mytable3').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytables').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytablesa').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytablet').dataTable(); 
    });
     $(document).ready(function(){ 
        $('#mytablet1').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytablet2').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytablet3').dataTable(); 
    });
    $(document).ready(function(){ 
        $('#mytablet4').dataTable(); 
    });
</script>
   <script>
        $('#pop').popover();
    </script>
   <script>
    function viewdetail(id) {
        var url = "<?php echo site_url('teaching/viewDetail'); ?>";
        var url2 = url + '/' + id;
        $.get(url2, function(data) {
            $('#details').html(data);
        });
    }
</script>
  </body>
</html>
