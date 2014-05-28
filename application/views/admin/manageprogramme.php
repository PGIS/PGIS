<?php include 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li ><a href="<?php echo site_url('admin_page/addcourse');?>">Add Programme</a></li>
            <li class="active"><a href="<?php echo site_url('admin_page/manageprograme');?>">Manage programmes</a></li>
             <li><a href="<?php echo site_url('admin_page/changestudentprogramme');?>">Change Student course</a></li>
        </ol>
        <div class="col-md-10">
            <?php
            if(isset($prdelete)){
            echo '<div class="alert alert-warning fade in">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                The programme has been deleted
            </div>';}
              ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Programme name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = $this->db->get('tb_programmes');
                    if( $query->num_rows()>0){
                        foreach($query->result() as $prog){
                            $programname=character_limiter($prog->programme_name, 55);
                            echo '<tr>'. 
                                 '<td>'.ucwords($programname).'</td>'.
                                 '<td>';?>
                                    <button class="btn btn-success btn-xs"  onclick="editprograme(<?php echo $prog->prog_id;?>)" data-toggle="modal" data-target="#editModal">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    <?php
                                   echo ' <a href="'.site_url('admin_page/deleteprograme/'.$prog->prog_id).'" onclick="return confirm(\'Are you sure you want to delete ?\');"><button class="btn btn-danger btn-xs" >'
                                    . '<span class="glyphicon glyphicon-trash"></span> Delete</button></td></a>'.
                                '</tr>';
                        }
                    }
                    ?>
                </tbody>
                    </table>
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Edit Programme</h4>
                            </div>
                            <div class="modal-body">
                                 <div class="succedited"></div>
                                <div id="editprog">
                              
                                </div>
                            </div>
                          </div>
                        </div>
                     </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php';?>