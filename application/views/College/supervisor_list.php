<div class="panel panel-info">
 <?php
 if(isset($success)){
     echo '<div class="alert fade in">'
     . '<a type="button" class="close" data-dismiss="alert">&timesb;</a>'
      . '<div>'.$success.'</div>'
      . '</div>';
 }
 ?>
    <?php echo form_open('college/externalAllocation/'.$ext ,array('id'=>'load'));?>
    <table class="table table-striped" id="super">
        <thead><tr><th>Full name</th><th>Email</th><th>Choose</th><th>Action</th></tr></thead>
        <tbody>
        <?php
        $res=$this->db->select('*')->from('tb_user')->like('designation','external supervisor')->get();
        if($res->num_rows()>0){
            foreach ($res->result() as $row){
                echo '<tr><td>'.ucfirst($row->fname).' '.ucfirst($row->mname).'</td><td>'.$row->email.'</td><td>'.form_error('super','<div class="error">','</div>').'<input type="radio" name="super" value="'.$row->email.'"></td>'
                        . '<td><button class="btn btn-success btn-xs" name="save">Assign</button></td></tr>';  
            }
        }
        ?>
        </tbody>
    </table>
    <?php echo form_close();?>
</div>
<script>
    $('#super').dataTable();
</script>
<script>
    $('#load').submit(function(e){
        e.preventDefault();
        var formz=$(this).serializeArray();
        var url=$(this).attr('action');
        formz.push({"name": "save","value": " "});
        $.post(url,formz,function(data){
            $('.external').html(data);
        });
    });
</script>
