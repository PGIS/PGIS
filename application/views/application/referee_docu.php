<?php include_once 'Headerlogin1.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-11">
            <div class="pantop"><h4>REFEREE MAIN TASK</h4>
            <p>
              Please give the details of what You know about this applicant.  
            </p></div>
                <?php if(!empty($smg)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$smg.'</strong></p>
        </div>
            </div>';}?>
                <?php if(!empty($smg1)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-danger"><strong style="margin-left:50px">'.$smg1.'</strong></p>
        </div>
            </div>';}?>
            <?php echo form_open('referee_page/referee_doc');?>
                <table class="table table-striped"><tr><td>
                    <label for="applicant">Applicant name*</label>
                    <input type="tex" name="app_id" class="form-control" required autofocus>
                 </td><td>
                    <label for="applicant">Referee name*</label>
                    <input type="tex" name="referee_id" class="form-control" required autofocus></td></tr></table>
            <table class="table table-striped">
                <tr><th></th><th>Excellent</th><th>Good</th><th>Average</th><th>Poor</th><th>Very Poor</th></tr>
                <tr><td>Intellectual ability</td><td><input type="radio" name="edit" value="excellent"></td><td><input type="radio" name="edit" value="good"></td><td><input type="radio" name="edit" value="average"></td><td><input type="radio" name="edit" value="poor"></td><td><input type="radio" name="edit" value="very poor"></td></tr>
                <tr><td>Capacity for Original Thinking</td><td><input type="radio" name="edit1"value="excellent"></td><td><input type="radio" name="edit1" value="good"></td><td><input type="radio" name="edit1" value="average"></td><td><input type="radio" name="edit1" value="poor"></td><td><input type="radio" name="edit1" value="very poor"></td></tr>
                <tr><td>Maturity</td><td><input type="radio" name="edit2" value="excellent"></td><td><input type="radio" name="edit2" value="good"></td><td><input type="radio" name="edit2" value="average"></td><td><input type="radio" name="edit2" value="poor"></td><td><input type="radio" name="edit2" value="very poor"></td></tr>
                <tr><td>English Language Proficiency</td><td><input type="radio" name="edit3" value="excellent"></td><td><input type="radio" name="edit3" value="good"></td><td><input type="radio" name="edit3" value="average"></td><td><input type="radio" name="edit3" value="poor"></td><td><input type="radio" name="edit3" value="very poor"></td></tr>
                <tr><td>Ability to work with other</td><td><input type="radio" name="edit4" value="excellent"></td><td><input type="radio" name="edit4" value="good"></td><td><input type="radio" name="edit4" value="average"></td><td><input type="radio" name="edit4" value="poor"></td><td><input type="radio" name="edit4" value="very poor"></td></tr>
            </table>
            <label for="addition coments">Give additional comments*</label>
            <font class="alert-danger"><?php echo form_error('addcoment');?></font>
            <textarea class="form-control" rows="1"  name="addcoment" required></textarea>
            <table class="table"><tr><td><input type="submit" class="btn btn-info btn-primary" name="sb" value="save"></td>
                <td align="right"><input type="submit" class="btn btn-info btn-primary" name="sb1" value="save and quit"></td></tr></table>
            <?php echo form_close();?>
        </div>
        </div>
        </div>
<?php include_once 'footer.php';?>

