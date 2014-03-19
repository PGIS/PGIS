<div class="emprecod tab-pane ">
        <div class='pantop'><h4>Employment Record</h4></div>
        <p>
           <table class="table table-striped">
            <?php echo form_open('application/personal_info'); ?>
                <tr>
                     <td>Institution (Current Employer)
                        <div>
                            <textarea  name="current_employer" class="form-control"></textarea>
                        </div>
                     </td>
                     <td >Position
                         <div><input name="position" type="text" class="form-control"></div>
                     </td>
                </tr>
                <tr>
                    <td>From:
                        <p><input name="from" type="text" id="datepicker" class="form-control"></p>
                    </td>
                    <td>To:
                        <p><input name="to" type="text" id="datepicker" class="form-control"></p>
                    </td>
                </tr>
                <tr>
                    <td>Nature of Work (Responsibilities) (You may use a separate sheet).
                        <div>
                            <textarea name="responsbility" class="form-control" rows=4 ></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                   <td colspan="2">
                            <p>If you are admitted into our Postgraduate Programme,
                            do you think your employer will release you?(choose one)</p> 
                            <p>Yes       <input name="empp" type="radio"value="yes"> If Yes provide evidence.</p>
                            <p>No        <input name="empp" type="radio"value="no"></p>
                            
                    </td>
                </tr>
           </table>
            <input class="subtn" type="submit" name="save" value="Save">
        </form>
        </p>
</div>