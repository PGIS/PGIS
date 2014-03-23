<?php include 'include/header.php';?>

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
       <table class="mytable" border="2">
           
           <tr>
               <td colspan="2" align="center" >
                  1
               </td>
                <td colspan="2" align="center" >
                  2
               </td>
                <td colspan="2" align="center" >
                  3
               </td>
           </tr>
       </table>
       <form action="http://localhost/pgis/index.php/user_admission_c/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">  
           <table>
            <tbody><tr>
               <td><input type="file" name="userfile" size="20"></td>
               <td> <span class="glyphicon glyphicon-circle-arrow-up"></span><input type="submit" value="upload"></td>
            </tr>
          </tbody>
           </table>
 
          </form>   
    </div>


    <?php include 'include/footer.php';?>   