<?php include 'include/header.php'; ?>

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
        $user = $this->session->userdata('userid');
        $this->load->helper('directory');
        if (is_dir('uploads/' . $user)) {

            $map = directory_map('./uploads/' . $user);

            $i = 1;

            foreach ($map as $value) {
                echo "<tr class='mytable'>";
                echo "<td>$i</td>";
                echo "<td>$value</td>";
                echo "<td>from $user</td>";
                echo "<td>Document Description</td>";
                echo "<td><a href='" . site_url('user_admission_c/do_download/' . $user . '/' . $value) . "'>Download to mark</a></td>";
            }
        }
        foreach ($useridz as $valuez) {
//            $map_files=  directory_map('./uploads/'.$valuez);
            print_r($valuez);
            echo '</br>';    
        }
       
        ?>
    </table>
    <form action="http://localhost/pgis/index.php/user_admission_c/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">  
        <table>
            <tbody><tr>
                    <td><input type="file" name="userfile" size="20" style="padding-top: 29px"></td>
                    <td> <span class="glyphicon glyphicon-circle-arrow-up"></span>
                        <input type="submit" value="upload results" ></td>
                </tr>
            </tbody>
        </table>

    </form> 
</div>

<?php include 'include/footer.php'; ?>   