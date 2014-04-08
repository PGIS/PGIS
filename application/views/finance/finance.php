<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <ul class="nav nav-tabs">
        <li  class="active"><a href="#appl" data-toggle="tab">Applicants fee</a></li>
        <li><a href="#reg" data-toggle="tab">Registration fee</a></li>
        <li><a href="#inst" data-toggle="tab">instructors’ payment</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="appl">
            <div class="col-md-12">
                <div class="col-md-4">
                    <table class="table table-striped">
                        <thead><h5>List of applicants need verification</h5></thead>
                        <th>Username</th>
                        <th>Action</th>
                        <tr>
                            <?php
                            $query = $this->db->get_where('tb_user', array('designation' =>'applicant'));
                            if($query->num_rows()>0){
                                $i=1;
                                foreach ($query->result() as $list){
                                    echo '<tr>';
                                    echo '<td>'.$list->userid.'</td>';?>
                                     <td><button onclick="ajaxFunction('<?php echo $list->userid;?>')" class="subtn default">verify</button></td>
                                     <?php
                                    echo '</tr>';
                                    $i++;
                                }
                            }else{
                                echo '<tr><td colspan="2" class="danger">no new application fee payment found</td></tr>';
                                
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8 " id="resajax">
                    registration fee
                </div>
            </div>
        </div>
      <div class="tab-pane" id="reg">..2.</div>
      <div class="tab-pane" id="inst">..3.</div>
    </div>
    
</div>
<?php include_once 'footer.php';?>

