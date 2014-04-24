<?php include_once 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <div class="well well-sm">
            View finance detail for respective student
        </div>
    </div>
    <div class="col-md-5">
        <table class="table table-striped" id="fincedetail">
            <thead>
            <th>Registration #</th>
            <th>Recept #</th>
            </thead>
            <tbody>
                <?php
               
                $this->db->order_by("registration_id"); 
                $sudentlist = $this->db->get('tb_finance');
                if ($sudentlist->num_rows() > 0) {
                    foreach ($sudentlist->result() as $stlist) {
                        ?>
                        <tr>
                            <td><a onclick="finahistory('<?php echo $stlist->registration_id; ?>')"><?php echo $stlist->registration_id; ?></a></td>
                            <td><a onclick="finahistory('<?php echo $stlist->registration_id; ?>')"><?php echo $stlist->receipt_no; ?></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" id="finhisto">

    </div>

</div>
<?php include_once 'footer.php'; ?>