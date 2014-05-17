<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
     <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('adduser'); ?>">Add user</a></li>
     </ol>
    <p><h4 align="center">Already registered</h4></p>
<table class="table table-striped table-condensed" id="admintable">
        <thead>
            <tr>
              <th>Username</th>
              <th>First name</th>
              <th>Middle name</th>
              <th>Designation</th>
              <th>E-mail</th>
              <th>Edit</th>
              <th>Action</th>
            </tr>
        </thead>
          
      <?php foreach ($results as $row): ?>
         <tr>
             <td><?php echo ucfirst(strtolower(addslashes($row->userid)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->fname)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->mname)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->designation)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->email)));?></td>
             <td><a href="#" class="alert-success"><span class="glyphicon glyphicon-edit "></span>   Edit</a></td>
             <td><img src="<?php echo base_url('assets/photo/delete.png');?>"><?php echo anchor('admin_page/delete/' .$row->id,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?')"));?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
<?php include_once 'footer.php'?>

