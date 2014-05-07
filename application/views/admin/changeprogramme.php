<?php include 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('admin_page/addcourse'); ?>">Add Programme</a></li>
        <li class="active"><a href="<?php echo site_url('admin_page/manageprograme'); ?>">Manage programmes</a></li>
        <li><a href="<?php echo site_url('admin_page/changestudentprogramme'); ?>">Change Student course</a></li>
    </ol>
    <div class="col-md-10 col-lg-offset-1">
        <form id="changeprogramme">
        <table class="table">
            <tr>
                <td>Enter Student registration number</td>
                <td><input type="text" class="form-control" name="chcouname" required></td>
                <td><button type="submit" class="btn btn-info btn-sm">find detail</button></td>
            </tr>
        </table>
        </form>
        <div class="col-lg-12" id="studentprogamme">
            
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>