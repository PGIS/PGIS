
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
    </div><!-- /#wrapper -->
    
    <script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/tabcordion.js') ?>"></script>
    <script>
    $(function() {
    $('.tabcordion').tabcordion()
    });
</script>
    <script>
$(document).on('click', 'a.resize', function() {
$cn = $('.container');
var width = 600, onComplete;
if( !$cn.data('fullWidth') ) {
$cn.data('fullWidth', $cn.width());
$cn.css('maxWidth', $cn.width());
}
else {
width = $cn.data('fullWidth');
$cn.data('fullWidth', null);
onComplete = function() {
$cn.css('maxWidth', null);
};
}
$cn.animate({maxWidth: width}, {complete: onComplete});
$(window).trigger('resize');
return false;
});
</script>
    <script type="text/javascript">
        $(document).ready(function(){
             $('#areatext').hide();
             $('#chkcp').click(function(){
             $('#areatext').show();
             });
             $('#chkp').click(function(){
             $('#areatext').hide();
             });
             $('#chkp1').click(function(){
             $('#areatext').toogle();
             });
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