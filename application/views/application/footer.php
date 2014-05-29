
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
    </div><!-- /#wrapper -->
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
     $(document).ready(function(){ 
        $('.datepicker').datepicker(); 
    });
    </script>
    <script>
    $('.ajax').submit(function(e){
        $('#ld').hide();
        e.preventDefault();
        $('.loading').html('<label class="label label-warning">Loading...</label>');
        var dataz=$(this).serializeArray();
        var url2=$(this).attr('action');
        $.post(url2,dataz,function(data){
           $('#cl').hide(); 
           setTimeout(function(){
               $('.loading').html(data);
           },2000);
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
  <script>
    $("#1").change(function() {
        var f = document.getElementById("1").value;
        var url = "<?php echo site_url('application/courses');?>";
         var url2=url+'/'+$.trim(f);
        $.get(url2, function(data) {
            $('#2').html(data);
        });
    });
</script>
</html>
