<table class="table">
    <?php
    $res=$this->db->get_where('tb_int_feedback',array('int_id'=>$com));
    foreach ($res->result() as $row){
    ?>
    <tr><td><label>Comments</label><span class="pull-right text-info"><?php echo ''.$row->feedback_date;?></span></td></tr>
    <tr><td><?php echo ''.$row->comment;?></td></tr>
    <tr><td><label>Conclusion</label></td></tr>
    <tr><td><?php echo ''.$row->conclusion;?></td></tr>
    <?php
    }
    ?>
</table>
