<?php include_once 'Headerloginsuper.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <?php echo form_open('supervisor/presentationFeedback');?>
            <p>Presentation comment</p>
            <table class="table">
                <tr>
                    <td class="col-md-6">
                        Presentation for
                        <select class="form-control input-sm" name="prtype" required >
                            <option></option>
                            <option>Proposal progress</option>
                            <option>dissertation/thesis progress</option>
                        </select> 
                    </td>
                    <td>
                        Level
                        <select class="form-control input-sm" name="level" required>
                            <option></option>
                            <option>Department level</option>
                            <option>College level</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Comments
                        <textarea name="comments" class="form-control" rows="8" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Vedic
                        <textarea name="verdics" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Participants panel
                        <textarea name="panel" class="form-control" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>
                            <button type="submit" name="save" class="btn btn-info btn-xs">Submit</button>
                        </p>
                    </td>
                </tr>
            </table>

        </form> 

    </div>
</div>
<?php include_once 'footer.php'; ?>