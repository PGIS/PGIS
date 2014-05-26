<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/course1');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
        <div class="col-md-6">
           <table class="table">
           <?php
           $res=$this->db->get('tb_course');
           if($res->num_rows()>0){
               foreach ($res->result() as $coz){
                   echo '<tbody><tr><td>'.$coz->course_name.' '.$coz->course_code.'</td><td><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-share"></span>manage</button>'.' '.'<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>delete</button></td></tr></tbody>';
               }
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