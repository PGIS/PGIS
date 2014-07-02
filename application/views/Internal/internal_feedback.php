<?php include_once 'Headerlogininternal.php';?>
<div id="page-wrapper">
    <div class="well well-sm">
        <p class="text text-info">Students to be </p>
    </div>
    <div class="col-lg-6">
        <table class="table table-bordered table-striped" id="pagez">
            <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>DISSERTATION TITLE</th><th>ACTION<b class="caret"></b></th></tr></thead> 
            <tbody>
                <?php
                if(isset($given)){
                    foreach ($given->result() as $row){
                        echo '<tr><td>'.$row->registration_id.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->project_title.'</td><td><button class="btn btn-success btn-xs" onclick="studentFeedBack(\''.$row->id.'\')">feedback</button></td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
    <div class="feedback">
    </div>
    </div>
</div>
<script>
    function studentFeedBack(id){
        $('.feedback').html('<img src="<?php echo base_url('assets/img/load.gif');?>">');
        var url="<?php echo site_url('internal/inputFeedback');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
            setTimeout(function(){
            $('.feedback').html(data);
            },2000);
        });
    }
</script>
<?php include_once 'footer.php';?>