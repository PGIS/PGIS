<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
     <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('adminAlumni/alumniList'); ?>">List of alumni</a></li>
        <li ><a href="<?php echo site_url('adminAlumni'); ?>">Add event</a></li>
        <li class="active"><a href="<?php echo site_url('adminAlumni/eventManage'); ?>">Event management</a></li>
     </ol>
    <div class=" col-lg-11">
        <table class="table">
            <tr class="alert alert-info"><td>Present List of Member of Alumni</td></tr>
        </table>
        <table class="table table-striped table-hover" id="alumni">
            <thead><tr><th>REGISTRATION ID</th><th>FULL NAME</th><th>EMAIL</th><th>MOBILE NUMBER</th></tr></thead>
            <tbody>
                <?php
                if(isset($alumn)){
                    foreach ($alumn->result() as $row){
                        echo '<tr><td>'.$row->registrationID.'</td><td>'.$row->surname.' '.$row->other_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile1.'</td></tr>';
                    }
                }
                ?>
            </tbody>
            
        </table>
    </div>
</div>
<?php include_once 'footer.php';?>