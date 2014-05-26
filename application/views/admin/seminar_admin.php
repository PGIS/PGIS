<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
        <div class="col-md-6">
            <table class="table">
           <?php
           $res=$this->db->get('tb_programmes');
           if($res->num_rows()>0){
               echo '<thead><tr><th>Programmes</th><th>Action</th></tr></thead>';
               foreach ($res->result() as $row){
                   echo '<tbody><tr><td>'.$row->programme_name.'</td><td><button class="btn btn-success btn-xs" onclick="addcourse(\''.$row->prog_id.'\')"><span class="glyphicon glyphicon-plus"></span> addcourse</button></td></tr></tbody>';  
               }
           }  else {
               echo '<p class="alert alert-success">Specify other(s)</p>';
               echo '<table class="table table-striped">';
               echo form_open();
               echo' <tr><td><label>Programme name</label></td>';
               echo '<td><input type="text" name="pgname" class="form-control" required></td></tr>';
               echo '<tr><td><label>Course name</label></td>';
               echo '<td><input type="text" name="csname" class="form-control" required></td></tr>';
               echo '<tr><td><label>Course code</label></td>';
               echo '<td><input type="text" name="cdname" class="form-control" required placeholder="IS 600"></td></tr>';
               echo '<tr><td colspan="1"></td><td><button class="btn btn-primary">submit</button></td></tr>';
               echo form_close();
               echo '</table>';
           }
           
           ?>
            </table>  
        </div>
        <div class="col-md-6">
            <div class="add"></div>
        </div>
    </div>
    <script>
    function addcourse(course){
       var url="<?php echo site_url('admin_page/course_form');?>"; 
       var url2=url +'/'+course;
       $.get(url2,function(data){
           $('.add').html(data);
       });
    }
    </script>
</div>
<?php include_once 'footer.php';?>