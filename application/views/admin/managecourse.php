<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
        <div class="col-md-6">
            <div class="ajx text-center" style="margin-bottom: 10px;"></div>
           <table class="table" id="managez">
               <thead><tr><th>Course</th><th>Options</th></tr></thead>
           <?php
           $res=$this->db->get('tb_course');
           if($res->num_rows()>0){
               foreach ($res->result() as $coz){
                   echo '<tbody><tr><td>'.$coz->course_name.' '.$coz->course_code.'</td><td><button class="btn btn-success btn-xs" onclick="manage(\''.$coz->id.'\')"><span class="glyphicon glyphicon-share"></span> manage</button>'.' '.'<button class="btn btn-danger btn-xs" onclick="deletecourse(\''.$coz->id.'\')"><span class="glyphicon glyphicon-trash"></span> delete</button></td></tr></tbody>';
               }
           }  else {
               echo '<p class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> No course found..</p>';    
           }
           ?>
           </table>  
        </div>
        <div class="col-md-6">
            <div class="add"></div>
        </div>
    </div>
    <script>
    function manage(id){
       var url="<?php echo site_url('admin_page/coursemanage');?>"; 
       var url2=url +'/'+id;
       $.get(url2,function(data){
           $('.add').html(data);
       });
    }
    function deletecourse(id){
        $('.ajx').html('<label class="label label-warning">Loading...</label>');
        var urd="<?php echo site_url('admin_page/deletecourse');?>";
        var urd2=urd +'/'+id;
        $.get(urd2,function(sms){
            setTimeout(function(){
                $('.ajx').html(sms);
                location.reload();
            },2000);
        });
    }
    </script>
    
</div>
<?php include_once 'footer.php';?>
