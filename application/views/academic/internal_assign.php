<div class="succ">
<p class="alert alert-warning"><span class="glyphicon glyphicon-info-sign"></span> List of Staff Present to be assigned</p>
<?php echo form_open('college/record_internal/'.$registid,array('id'=>'ajax'));?>
<table class="table table-condensed table-striped" id="dist">
      <thead><tr><th>CHOOSE</th><th>FULL NAME</th><th>EMAIL</th></tr></thead>
      <tbody>

          <?php
          $res=  $this->db->select('*')->from('tb_user')->join('tb_staff','tb_staff.staffId = tb_user.userid')
                 ->where(array('designation'=>'Teaching staff'))->get();
          foreach ($res->result() as $row){
             echo '<tr><td><input type="radio" name="assign" class="form-control" required value="'.$row->email.'"></td><td>'.$row->fullName.'</td><td>'.$row->email.'</td></tr>';
            }
            
          ?>

      </tbody>
  </table>
  <button class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-cloud"></span> assign</button>
<?php echo form_close();?>
</div>
<script>
    $('#ajax').submit(function(e){
        e.preventDefault();
        var fomz=$(this).serializeArray();
        var furl=$(this).attr('action');
        $.post(furl,fomz,function(data){
            $('.succ').html(data);
        });
    });
$('#dist').dataTable();
</script>                       