<div class="span12 load">
    <?php
    $res=$this->db->get_where('tb_course',array('id'=>$manage),1);
    foreach ($res->result() as $row){
    ?>
     <?php echo form_open('admin_page/updatecourse/'.$manage,array('id'=>'form'));?>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="input-group">
            <label>Programme name:</label>
            <input type="text" name="pgname" class="form-control pull-right" value="<?php echo ''.$row->prog_name;?>">
            </div>
        </li>
        <li class="list-group-item">
            <div class="input-group">
            <label>Course name:</label>
            <input type="text" name="csname" class="form-control pull-right" value="<?php echo ''.$row->course_name;?>">
            </div>
        </li>
        <li class="list-group-item">
            <div class="input-group">
            <label>Course code:</label>
            <input type="text" name="cdname" class="form-control pull-right" value="<?php echo ''.$row->course_code;?>">
            </div>
        </li>
        <li class="list-group-item">
            <div class="input-group">
                <button class="btn btn-success btn-sm">update course</button>
            </div>
        </li>
    </ul>
    <?php echo form_close();?>
    <?php
    }
    ?>
</div>

<script>
    $('#form').submit(function(e){
        e.preventDefault();
        $('.load').html('<label class="label label-warning">Loading..</label>');
        var fomx=$(this).serializeArray();
        var urx=$(this).attr('action');
        $.post(urx,fomx,function(data){
            setTimeout(function(){
                $('.load').html(data);
            },2000);
        });
    });
</script>

