<div>
    <?php
    if(isset($smz)){
        echo '<div class="alert fade in">
             <a type="button" class="close" data-dismiss="alert">&times;</a>
               <div>'.$smz.'</div> 
            </div>';
    }
    ?>
    <?php echo form_open('college/externalAssign/'.$rest,array('id'=>'ajaxc'));?>
    <div class="well well-sm">Assign External Examiner</div>
    <table class="table table-striped" id="myexternal">
        <thead class="alert alert-success"><tr><th>Full name</th><th>Choose</th><th>Action</th></tr></thead>
        <tbody>
        <?php
        $restuf=$this->db->get_where('tb_user',array('designation'=>'external examiner'));
         foreach ($restuf->result() as $row){
         echo '<tr><td>'.$row->fname.' '.$row->mname.'</td><td>'.form_error('examiner','<div class="error">','</div>').'<input type="radio" name="examiner" value="'.$row->email.'"></td>'
                 . '<td><button class="btn btn-success btn-xs" name="save"> assign</button></td></tr>'; 
       }
        ?>
        </tbody>
    </table>
    
    <?php echo form_close();?>
    <script>
        $('#myexternal').dataTable();
        </script>
        <script>
        $('#ajaxc').submit(function(e){
            e.preventDefault();
            var formz=$(this).serializeArray();
            var url=$(this).attr('action');
            formz.push({"name":"save","value": " "});
            $.post(url,formz,function(data){
               $('.staff').html(data);
            });
        });
    </script>
</div>