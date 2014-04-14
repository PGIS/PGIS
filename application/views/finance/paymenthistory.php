<div id="fndetail">
    <div class="well-sm alert-info">
        Finance history for <?php echo $regno;?>
    </div>
    <div>
        <?php
        if ($history->num_rows() > 0) {
            foreach ($history->result() as $detail) {
                ?>
                <table class="table">
                    <tbody>
                        <tr><td colspan="2" class="warning">Issue date : <?php echo $detail->date_payment; ?></td></tr>
                        <tr>
                            <td>Amount payed :<?php echo '<i id="dtl">'.$detail->amount_paid.'</i>'; ?></td>
                            <td>Recept no :<?php echo '<i id="dtl">'.$detail->receipt_no.'</i>'; ?></td>
                        </tr>
                        <tr>
                            <td>Payment mode :<?php echo '<i id="dtl">'.$detail->mode_payment.'</i>'; ?></td>
                            <td>Payment status :<?php echo '<i id="dtl">'.$detail->regstatus.'</i>'; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
        }
        ?>
    </div>
    <div class="well-sm alert-info">
        Outstanding payment
    </div>
</div>