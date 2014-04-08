<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    
    <p><h3 align="center">Already registered</h3></p>
    <p style="margin-left: 30px;"><?php echo anchor('admin_page',' Registered Members');?></p>
     
      <form action="<?php echo site_url('admin_page/search');?>" method="post" class='form-inline'>
          <p>
               <table><td>
                    <input type="text" style='width: 200px;' name="searchterm" placeHolder="search member" class="form-control">
               <input type="submit" name="sub" value="search" class='btn'>
               </td></table>
               
          </p>
      </form>
     <table border='' align='center' style="background-color:#cccccc;">
          <tr><th>ID</th><th>Username</th><th>First name</th><th>Middle name</th><th>Designation</th><th style="text-indent: 50px;">E-mail</th><th colspan="0"><p align="center">Action</p></th></tr>
      <?php foreach ($results as $row): ?>
         <tr><td><?php echo $row->id;?></td><td><?php echo ucfirst(strtolower(addslashes($row->userid)));?></td><td><?php echo ucfirst(strtolower(addslashes($row->fname)));?></td>
          <td><?php echo ucfirst(strtolower(addslashes($row->mname)));?></td><td><?php echo ucfirst(strtolower(addslashes($row->designation)));?></td><td><?php echo ucfirst(strtolower(addslashes($row->email)));?></td>
       <td><img src="<?php echo base_url('assets/photo/delete.png');?>"><?php echo anchor('admin_page/delete/' .$row->id,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?')"));?></td>
       </tr>
        <?php endforeach;?>
        </table><br>
        <p align="center"><?php echo $pagination;?></p>
         <p style="margin-left: 100px;"><img src="<?php echo base_url('assets/photo/add.png');?>"><?php echo anchor('admin_page/add','Add');?></p>
</div>
<?php include_once 'footer.php'?>

