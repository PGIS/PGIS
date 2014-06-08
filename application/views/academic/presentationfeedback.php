<?php include_once 'Headerloginsuper.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <?php echo form_open('supervisor/registerFeedback/'.$registrationID);?>
            <div class="well-sm alert-info">
                Presentation feedback for <?php if(isset($surname)){
                echo '<b>'.$surname.' '.$lastname.'</b>'.
                '<span class="le">Registration #:'.$registrationID.'</span>'
                        ;}?>
            </div>
            <?php 
                if(isset($saved)){
                    echo '<div class="alert alert-success">Verdicts Saved</div>';
                }
            ?>
            <table class="table">
                <tr>
                    <td class="col-md-4">
                        Presentation for
                        <?php echo form_error('prtype','<div class="error">', '</div>'); ?>
                        <select class="form-control input-sm" name="prtype" required >
                            <option></option>
                            <option>Proposal progress</option>
                            <option>dissertation/thesis progress</option>
                        </select> 
                    </td>
                    <td class="col-md-4">
                        Level
                        <?php echo form_error('level','<div class="error">', '</div>'); ?>
                        <select class="form-control input-sm" name="level" required>
                           <option>Department level</option>
                       </select> 
                    </td>
                    <td class="col-md-4">
                        Presentation date
                        <?php echo form_error('prdate','<div class="error">', '</div>'); ?>
                        <input class="form-control input-sm datepicker" name="prdate" type="text" required>  
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Comments
                        <?php echo form_error('comments','<div class="error">', '</div>'); ?>
                        <textarea name="comments" class="form-control" rows="8" required></textarea>
                        <script type="text/javascript">
                          CKEDITOR.replace( 'comments' );
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Verdict
                        <?php echo form_error('verdict','<div class="error">', '</div>'); ?>
                        <textarea name="verdict" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Participants panel
                        <?php echo form_error('panel','<div class="error">', '</div>'); ?>
                        <textarea name="panel" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p>
                            <button type="submit" name="save" class="btn btn-info btn-xs">Submit</button>
                        </p>
                    </td>
                </tr>
            </table>

        </form> 

    </div>
    <script>
    $('.datepicker').datepicker();
    </script>
</div>
<?php include_once 'footer.php'; ?>
