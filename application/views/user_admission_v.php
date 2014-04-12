<?php include_once 'Admision/Header_academic.php'; ?>
<div id="wrapper">

</div>
<div id="page-wrapper">
    <div>
        <center>

            <p>

            </p>

        </center>
    </div>

    <button type="button" class="btn btn-default btn-lg btn-block">Submitted Thesis</button>
    <table class="mytable table-hover" >

        <tr class="mytable">


        </tr>
    </table>

    <table class='mytable table-hover' >
        <?php
        foreach ($useridz as $valuez) {
            foreach ($valuez as $name) {

                $map_files = directory_map('./uploads/' . $name);
                $j = 1;
                foreach ($map_files as $valuez) {
                    echo "<tr class='mytable'>";
//                    echo "<td>$j</td>";
                    echo "<td>$valuez</td>";
                    echo "<td>from $name</td>";
                    echo "<td>Document Description</td>";
                    echo "<td><a href='" . site_url('user_admission_c/do_download/' . $name . '/' . $valuez) . "'>Download to mark</a></td>";

                    echo "<td id='upload'><a href='#'><button type='button' class='btn btn-default'>upload results</button></a></td>";
                    
                    echo"</tr>";

                    $j++;
                }
            }
        }
        ?>
    </table>
    <form  action="<?php echo site_url('user_admission_c/do_upload/'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">  

        <table class="table">
            <tbody><tr>
                    <td><input type="file" name="userfile" size="20"></td>
                    <td> <span class="glyphicon glyphicon-circle-arrow-up"></span>
                        <input type="submit" value="upload results" ></td>
                </tr>
            </tbody>
        </table>

    </form> 

</div>
<script>
$(document).ready(function(){
 $("#form").hide();
 $("#upload").click(function(){
   $("#form").show();
   $("#upload").hide();
 });
});
</script>


<?php include 'include/footer.php'; ?>   
