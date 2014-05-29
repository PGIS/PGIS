
<footer class='footer'><p><strong><i>&copy;  PGIS rights Reserved</i></strong></p></footer>
</div><!-- /#wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script>
    $(document).ready(function() {

        var MaxInputs = 1; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box added

        $(AddButton).click(function(e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<p><div class="input-group"><input type="text" class="form-control"><span class="input-group-btn"><a href><button class="btn btn-warning" type="button">&times;</button></a></span></div></p>');
                x++; //text box increment
            }
            return false;
        });

        $("body").on("click", ".removeclass", function(e) { //user click on remove text
            if (x > 1) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox
            }
            return false;
        })

    });
</script>
 <script>
    $(document).ready(function() {

        var MaxInputs = 1; //maximum input boxes allowed
        var InputsWrapper = $("#thiInputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreField"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box addedremoveclass

        $(AddButton).click(function(e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<p><div class="input-group"><input type="text" class="form-control"><span class="input-group-btn"><a class="removeclass"><button class="btn btn-warning" type="button">&times;</button></a></span></div></p>');
                x++; //text box increment
            }
            return false;
        });

        $("body").on("click", ".removeclass", function(e) { //user click on remove text
            if (x > 1) {
                $('.input-group').remove(); //remove text box
                x--; //decrement textbox
            }
            return false;
        })

    });
</script>   
</body>
</html>