<?php include 'Headerlogin.php'; ?>

<div id="page-wrapper">
    <ul id="myTab" class="nav nav-tabs">
        <li  class="dropdown">
            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Applicants fee<b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <li ><a href="#appl" tabindex="-1" data-toggle="tab">Fee verification</a></li>
                <li><a href="#aplist" tabindex="-1" data-toggle="tab">Payed fee</a></li>
            </ul>
        </li>   
        <li ><a href="#reg" data-toggle="tab">Tuition fee</a></li>
        <li><a href="#inst" data-toggle="tab">instructors’ payment</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="appl">
            <div class="col-md-12">
                <div class="col-md-6">
                    <table class="table table-condensed table-striped" id="mytable">
                        <thead><h5>List of applicants need verification</h5>
                        <th>Applicant Name</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $this->db->where('appl_status', 'no');
                            $query = $this->db->get_where('tb_app_personal_info', array('submited' => 'yes'));
                            if ($query->num_rows() > 0) {
                                $i = 1;
                                foreach ($query->result() as $list) {
                                    $this->db->where('appl_status', 'unchecked');
                                    $mquery = $this->db->get_where('tb_finance_application', array('userid' => $list->userid));
                                    if ($mquery->num_rows() > 0) {
                                        foreach ($mquery->result() as $mlist) {
                                            echo '<tr>';
                                            echo '<td>' . $list->surname.' '.$list->other_name. '</td>';
                                            ?>
                                        <td><button onclick="ajaxFunction('<?php echo $mlist->userid; ?>')" class="btn-info btn btn-xs"> verify</button></td>
                                        <?php
                                        echo '</tr>';
                                    }
                                }
                                $i++;
                            }
                        } 
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 " id="resajax">

                </div>
            </div>
        </div>

        <div class="tab-pane" id="aplist">
            <div class="col-md-8">
                <p><h5>Applicant with valid Application fee payment information</p></h5>
                <table class="table table-striped" id="appfeevalid">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>payment date</th>
                            <th>Application id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $myquery = $this->db->get_where('tb_finance_application', array('appl_status' =>'accepted'));
                        if($myquery->num_rows()>0){
                            foreach ($myquery->result() as $thsapp){
                                echo '<tr>';
                                echo '<td>'.$thsapp->userid.'</td>';
                                echo '<td>'.$thsapp->payment_date.'</td>';
                                echo '<td>'.$thsapp->app_id.'</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div >

        <div class="tab-pane" id="reg">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="tp">Verification for registration fee</div>
                    <table class="table table-responsive table-striped" id="mytable1">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mquery = $this->db->get_where('tb_finance', array('regstatus' => 'unchecked'));
                            if ($mquery->num_rows() > 0) {
                                $i = 1;
                                foreach ($mquery->result() as $mlist) {
                                    echo '<tr>';
                                    echo '<td>' . $mlist->registration_id . '</td>';
                                    ?>
                                <td><button onclick="retrivedetails('<?php echo $mlist->registration_id; ?>','<?php echo $mlist->receipt_no; ?>')" class="btn-info btn btn-xs">verify</button></td>
                                <?php
                                echo '</tr>';
                                $i++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6"id="regfindet" >

                </div>
            </div>

        </div>

        <div class="tab-pane" id="inst">
            <div class="col-md-12">
                Instructor payments information
                <table>
                   
                </table>
            </div>
        </div>
    </div>

</div>
<?php include_once 'footer.php'; ?>

