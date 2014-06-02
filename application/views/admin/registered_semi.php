<?php include_once 'Headerlogin.php';?>
  <div id="page-wrapper">
      <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/seminacourse');?>"><span class="glyphicon glyphicon-play-circle"></span> Add course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/managecourse');?>"><span class="glyphicon glyphicon-plus"></span> Manage course</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/coursez');?>"><span class="glyphicon glyphicon-bookmark"></span> Seminar register</a></li>
        </ol>
      <div class="col-lg-5">
      <table class="table table-condensed" id="course">
      <thead><tr><th>Course</th></tr></thead>
          <tbody>
              <?php
              $result=$this->db->get('tb_seminar');
              if($result->num_rows()>0){
                  foreach ($result->result() as $cs){
                      echo '<tr><td>'.$cs->course.'<button class="btn btn-success btn-xs pull-right" onclick="courezcode(\''.$cs->id.'\')">view registered</button></td></tr>';
                  }
              }
              ?>
          </tbody>
      </table>
      </div>
    <div class="col-lg-7">
        
        <div class="info"></div>
    </div>
      <script>
      function courezcode(id){
          $('.info').html('<img src="<?php echo base_url('assets/img/load.gif');?>">');
          var formurl="<?php echo site_url('admin_page/courseview');?>";
          var url=formurl+'/'+id;
          $.get(url,function(data){
              setTimeout(function(){
              $('.info').html(data);
              },2000);
          });
      }
      </script>
       
 </div>
<?php include_once 'footer.php';