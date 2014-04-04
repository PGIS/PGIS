
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
    </div><!-- /#wrapper -->
    <script>
window.brunch = window.brunch || {};
window.brunch['auto-reload'] = {
enabled: true
};
    </script>
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/tabcordion.js') ?>"></script>
    
    <script>
    $(function() {
    $('.tabcordion').tabcordion()
    });
    </script>
   
    
    <script type="text/javascript">
                       $(document).ready(function(){
                            $("#disabi").hide();
                            $("#yes").click(function(){
                            $('#disabi').show();
                            });
                            $("#no").click(function(){
                            $('#disabi').hide();
                            });
                        }); 
                    </script>
  </body>
</html>