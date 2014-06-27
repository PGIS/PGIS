<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
        <div class="col-md-6">
            <table class="table" id="sem">
            <thead><tr><th>Programmes</th><th>Action</th></tr></thead>
            <tbody>
           <?php
           $res=$this->db->get('tb_programmes');
           if($res->num_rows()>0){
               
               foreach ($res->result() as $row){
                   echo '<tr><td>'.$row->programme_name.'</td><td><button class="btn btn-success btn-xs" onclick="addcourse(\''.$row->prog_id.'\')"><span class="glyphicon glyphicon-plus"></span> addcourse</button></td></tr>';  
               }
           }
           
           ?>
            </tbody></table>  
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