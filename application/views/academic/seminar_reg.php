<?php include_once 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <div class="well well-sm"><p align="center"><b class="text text-success">Seminar Registration in a Week</b></p></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Seminar register</center></h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-4">
                <table class="table table-striped tab1">
                    <thead><tr>
                    <th>Courses
                    </th>
                        </tr></thead>
                    <tbody>
                    <?php 
                    $res=$this->db->get('tb_seminar');
                    if($res->num_rows()>0){
                        foreach ($res->result() as $row){
                            echo '<tr class="td1">
                    <td><button class="btn btn-success btn-xs"  onclick="rgistercourse(\''.$row->id.'\')" data-target="#home" data-toggle="modal">
                                    <span class="glyphicon glyphicon-book"></span> Register
                                    </button>'.'  '.$row->course.'</td>
                    </tr>';  
                        }  
                        
                    }
                    
                    ?>
                </tbody>
                </table>
                </div>
                <div class="col-lg-8">
                    <div id="load">
                    </div>
                </div>
            </div>
            
    </div>
</div>
 
    <?php include'footer.php';
    
