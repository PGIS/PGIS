<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datepicker.js')?>"></script>

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
        $('#managez').dataTable();
        $('#sem').dataTable();
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
    $(document).ready(function() {

        var MaxInputs = 1; //maximum input boxes allowed
        var InputsWrapper = $("#thisInputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#changeDeadLine"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box addedremoveclass

        $(AddButton).click(function(e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<div class="spc"><input type="text" class="form-control"><p>\n\
    <div><button class="btn btn-xs btn-info">Update</button></div></></div>');
                x++; //text box increment
            }
            return false;
        });
    });
</script>
  <script>
  $('.datepicker').datepicker();
  </script>
  
</body>
</html>
