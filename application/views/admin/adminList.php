<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
     <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page'); ?>">User management</a></li>
        <li class="active"><a href="<?php echo site_url('adduser'); ?>">Add user</a></li>
        <li class="active"><a href="<?php echo site_url('admin_page/systemSettings'); ?>">
                <span class="glyphicon glyphicon-cog"></span>   System Settings</a></li>
     </ol>
    <div class="col-lg-12">
        <ul class=" nav nav-tabs nav-justified">
            <li class="<?php if(isset($active)){ echo 'active';}?>"><a data-target=".user" data-toggle="tab">Applicant</a></li>
            <li class="<?php if(isset($activez)){ echo 'active';}?>"><a data-target=".staff" data-toggle="tab">Staffs</a></li>
        </ul>
<div class=" tab-content" style=" display: block">
    <div class="user in tab-pane <?php if(isset($active)){ echo 'active';}?>">
<div class="col-lg-6">
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
        
        <div class="loads" style="margin-left: 80px; padding-top: 30px;">
        </div>
    </div>
    </div>
    <div class="staff in tab-pane <?php if(isset($activez)){ echo 'active';}?>">
        <div class="col-lg-7" style=" padding-top: 20px;">
            <table class="table table-striped table-condensed" id="adminstaff">
    <thead class="alert alert-success">
            <tr>
              <th>Username</th>
              <th>Designation</th>
              <th>Full name</th>
              <th>E-mail</th>
              <th>Edit</th>
              <th>Action</th>
            </tr>
        </thead>
          
      <?php foreach ($stff->result() as $row1): ?>
         <tr>
             <td><?php echo $row1->userid;?></td>
             <td><?php echo $row1->designation;?></td>
             <td><?php echo $row1->fullName;?></td>
             <td><?php echo $row1->email;?></td>
             <td><button class="btn btn-success btn-xs" onclick="staffedit(<?php echo $row1->id;?>)"><span class="glyphicon glyphicon-edit "></span> Edit</button></td>
             <td><img src="<?php echo base_url('assets/photo/delete.png');?>"><?php echo anchor('admin_page/deletestaff/' .$row1->staffId,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?')"));?></td>
        </tr>
        <?php endforeach;?>
    </table> 
        </div>
        <div class="col-lg-5">
            <div class="colo" style="margin-left: 80px; padding-top: 30px;"></div>
        </div>
    </div>
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
    function staffedit(id){
        var urlz="<?php echo site_url('admin_page/staffedits');?>";
        var urlz2=urlz+'/'+id;
        $.get(urlz2,function(sms){
            $('.colo').html(sms);
        });
    }
</script>
<?php include_once 'footer.php'?>

