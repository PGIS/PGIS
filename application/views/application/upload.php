<div class="settings tab-pane <?php if(isset($active7)){echo 'active';}?>" style="padding-left: 3px;">
    <div class='pantop'><h4>Document Upload</h4></div>
    <p >
      
    <h5 class="text-info">Documents to upload</h5>
       <table class="mytable table-bordered">
          <?php if(isset($error)){
                  echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error.'</div>
                        </div>';
                  
                 }elseif (isset ($error1)) {
                       echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error1.'</div>
                        </div>';
                   }elseif (isset ($error2)) {
                echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error2.'</div>
                        </div>';
                   }elseif (isset ($error3)) {
               echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error3.'</div>
                        </div>';
                  }elseif (isset ($error4)) {
               echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error4.'</div>
                        </div>';
                 }elseif (isset ($error5)) {
                  echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error5.'</div>
                        </div>';
               }elseif (isset ($error6)) {
                 echo'<div class="alert fade in">
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                       <div class="alert alert-danger">'.$error6.'</div>
                        </div>';
               }
                        
                        ?>
         <tr>
             <td>Copies of Secondary School Certificates.<span class="pull-right">
            <?php
             if(isset($error)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?></span></td>
            <?php echo form_open_multipart('application/do_upload');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
             <td>Copy of Birth Certificate<span class="pull-right">.
            <?php
             if(isset($error1)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data1)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span></td>
            <?php echo form_open_multipart('application/do_upload1');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
            <td>Copies of Diploma / Advanced Diploma / Postgraduate Diploma Degree Academic Transcripts and
            Certificates. Successful applicants will be required to bring the originals for verification at
            the time of registration.
            <span class="pull-right">.
            <?php
             if(isset($error2)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data2)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span>
            </td>
            <?php echo form_open_multipart('application/do_upload2');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
            <td>CV detailing employment and self-employment experience.
            <span class="pull-right">.
            <?php
             if(isset($error3)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data3)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span>
            </td>
            <?php echo form_open_multipart('application/do_upload3');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
            <td>Brief Statement of Purpose for pursuing the postgraduate programme (maximum 1 page).
            <span class="pull-right">.
            <?php
             if(isset($error4)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data4)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span>
            </td>
            <?php echo form_open_multipart('application/do_upload4');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
            <td>An original receipt (Bank Pay-in-Slip) indicating payment of the non-refundable admission fee
            <span class="pull-right">.
            <?php
             if(isset($error5)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data5)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span>
            </td>
            <?php echo form_open_multipart('application/do_upload5');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
            <td>A letter from employer indicating willingness to release you if admitted (if employed).
            <span class="pull-right">.
            <?php
             if(isset($error6)){
                 echo '<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></button>';
             }elseif (isset ($upload_data6)){
                 echo '<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
             }
             ?>
                 </span>
            </td>
            <?php echo form_open_multipart('application/do_upload6');?>
            <td><input type="file" name="userfile" class="pull-right"></td><td><input type="submit" value="upload" class="btn btn-info btn-xs"></td>
            <?php echo form_close();?>
         </tr>
         <tr>
           
            
         </tr>
        </table>
        <?php
            if(isset($upload_data)){
            echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data.'</div>'
                . '</div>';
            }elseif(isset($upload_data1)){
            echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data1.'</div>'
                . '</div>';
            }elseif (isset ($upload_data1)) {
             echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data2.'</div>'
                . '</div>';
            }elseif (isset ($upload_data2)) {
           echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data3.'</div>'
                . '</div>';
             }elseif (isset ($upload_data3)) {
    echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data4.'</div>'
                . '</div>';
          }elseif (isset ($upload_data4)) {
       echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data5.'</div>'
                . '</div>';
           }elseif (isset ($upload_data5)) {
        echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data5.'</div>'
                . '</div>';
   }elseif (isset ($upload_data6)) {
    echo '<div class="alert fade in">'
                .'<a type="button" class="close" data-dismiss="alert">&times;</a>'
                . '<div class="alert alert-success">'.$upload_data6.'</div>'
                . '</div>';
}
            ?>
        <table class='mytable table-hover' >
            <h5 class="btn btn-success btn-xs">Uploaded Documents</h5>
             <?php
            $user=$this->session->userdata('userid');
            $this->load->helper('directory');
            
            if(is_dir('uploads/'.$user)) {
              $map = directory_map('./uploads/'.$user);
                  $i=1;
                  foreach ($map as $value) {
                     echo "<tr class='mytable'>";
                     echo "<td>$i</td>";
                     echo "<td> $value</td>";
                     ?>
         <td><span class="glyphicon glyphicon-remove-circle"></span>
          <?php echo anchor('application/delete/'.$value,'Remove',
            array('onclick'=>"return confirm('Are you sure you want to delete this file ?')"));?>
            </td>
            <?php
                     echo "</tr>";
                  $i++;
                 }
            }
            ?>
            <td colspan="3">
                 <?php echo form_open('application/do_upload');?>
                        <div class="col-md-12">
                            <div class="col-md-6 pull-left">
                                <input class="subtn btn-primary" type="submit" name="back" value="Back">
                            </div> 
                            <div class="col-md-6 ">
                                <input class="subtn btn-primary" type="submit" name="save" value="Continue">
                            </div> 
                        </div>
                    </td>
                    </form>
         </table>
    </p>
</div>
<script>
$('.filepdf').html('<label class="alert-info"> Allowed types jpg,gif,jpeg </label>');
</script>