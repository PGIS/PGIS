<div>
    <?php 
    foreach ($result as $row){
    ?>
    <form>
        <table class="table">
            <tr>
                <td>Full name</td>
                <td><input class="form-control" value="<?php echo $row->surname.' '.$row->other_name;?>"></td>
            </tr>
            <tr>
                <td colspan="2">Current programme
                    <input class="form-control" value="<?php echo $row->program;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Enter new programme
                   <input class="form-control" name="newprogramme"> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-sm btn-info">Change course</button> 
                </td>
            </tr>
        </table>
    <?php }?>
    </form>
</div>
