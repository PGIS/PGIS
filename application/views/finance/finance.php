<?php include 'Headerlogin.php'; ?>

<div id="page-wrapper">
    <ul id="myTab" class="nav nav-tabs nav-justified nav-tabs-justified">
        <li class="active"><a href="#appl" data-toggle="tab">Fee verification</a></li>
        <li><a href="#reg" data-toggle="tab">Tuition fee</a></li>
        <li><a href="#inst" data-toggle="tab">Valid application fee</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="appl">
            <div class="col-md-12">
                <div class="col-md-6">
                    <table class="table table-condensed table-striped" id="mytable">
                        <thead><h4>Verification for Application fee</h4>
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

        <div class="tab-pane" id="reg">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="tp"><h4>Verification for registration fee</h4></div>
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
            <div class="col-md-10">
                <p><h4>Applicant with valid Application fee payment information</p></h4>
                <table class="table table-striped" id="appfeevalid">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>payment date</th>
                            <th>Application id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res=  $this->db->select('*')->where('tb_finance_application.appl_status','accepted')->from('tb_finance_application')
                                ->join('tb_app_personal_info', 'tb_app_personal_info.userid = tb_finance_application.userid')->get();
                        if($res->num_rows()>0){
                            foreach ($res->result() as $thsapp){
                                echo '<tr>';
                                echo '<td>'.$thsapp->surname.' '.$thsapp->other_name.'</td>';
                                echo '<td>'.$thsapp->payment_date.'</td>';
                                echo '<td>'.$thsapp->app_id.'</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include_once 'footer.php'; ?>

