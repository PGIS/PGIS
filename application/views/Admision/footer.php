
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
        $('#pop').popover();
    </script>
  </body>
</html>