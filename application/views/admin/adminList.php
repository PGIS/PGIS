<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
     <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('adduser'); ?>">Add user</a></li>
        <li class="active"><a href="<?php echo site_url('admin_page/systemSettings'); ?>">
                <span class="glyphicon glyphicon-cog"></span>   System Settings</a></li>
     </ol>
<div class="col-lg-6">
<p><h4>Already registered</h4></p>
<table class="table table-striped table-condensed" id="admintable">
    <thead class="alert alert-success">
            <tr>
              <th>Username</th>
              <th>Designation</th>
              <th>E-mail</th>
              <th>Edit</th>
              <th>Action</th>
            </tr>
        </thead>
          
      <?php foreach ($results as $row): ?>
         <tr>
             <td><?php echo ucfirst(strtolower(addslashes($row->userid)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->designation)));?></td>
             <td><?php echo ucfirst(strtolower(addslashes($row->email)));?></td>
             <td><button class="btn btn-success btn-xs" onclick="useredit(<?php echo $row->id;?>)"><span class="glyphicon glyphicon-edit "></span> Edit</button></td>
             <td><img src="<?php echo base_url('assets/photo/delete.png');?>"><?php echo anchor('admin_page/delete/' .$row->id,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?')"));?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
    <div class="col-lg-6">
        
        <div class="loads" style="margin-left: 80px;">
        </div>
    </div>
</div>

<script>
    function useredit(id){
        var url="<?php echo site_url('admin_page/list_details');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
            $('.loads').html(data);
        });
    }
</script>
<?php include_once 'footer.php'?>

