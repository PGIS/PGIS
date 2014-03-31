<div class="settings tab-pane <?php if(isset($active7)){echo 'active';}?>" style="padding-left: 3px;">
    <div class='pantop'><h4>Document Upload</h4></div>
    <p >
      
       <h5>Documents to upload</h5>
       
        <table class="mytable" border='1'>
       
        <?php
            if(isset($error)){
                 echo '<div class="alert alert-danger">'.$error.'</div>';
             }
        ?>
         <tr>
            <td colspan=2>Copies of Secondary School Certificates.</td>
         </tr>
         <tr>
            <td colspan=2>Copy of Birth Certificate.</td>
         </tr>
         <tr>
            <td colspan=2>Copies of Diploma / Advanced Diploma / Postgraduate Diploma Degree Academic Transcripts and
            Certificates. Successful applicants will be required to bring the originals for verification at
            the time of registration.</td>
         </tr>
         <tr>
            <td colspan=2>CV detailing employment and self-employment experience.</td>
         </tr>
         <tr>
            <td colspan=2>Brief Statement of Purpose for pursuing the postgraduate programme (maximum 1 page).</td>
         </tr>
         <tr>
            <td colspan=2>An original receipt (Bank Pay-in-Slip) indicating payment of the non-refundable admission fee</td>
         </tr>
         <tr>
            <td colspan=2>A letter from employer indicating willingness to release you if admitted (if employed).</td>
         </tr>
         <tr>
           
            
         </tr>
        </table>
        <div class="well">
          <?php echo form_open_multipart('application/do_upload');?>
          <table>
            <tr>
               <td><input type="file" name="userfile" size="20" /></td>
               <td> <span class="glyphicon glyphicon-circle-arrow-up"></span><input type="submit" value="upload" /></td>
            </tr>
          </table>
 
          </form>
        </div>
         
          <?php
            if(isset($upload_data)){
            echo '<div class="alert alert-success">'.$upload_data.'</div>';
            }
            ?>
        <table class='mytable table-hover' >
         <h5>Uploaded Documents</h5>
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
        
         </table>
    </p>
</div>