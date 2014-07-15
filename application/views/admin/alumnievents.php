<?php include_once 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('adminAlumni/alumniList'); ?>">List of alumni</a></li>
        <li ><a href="<?php echo site_url('adminAlumni'); ?>">Add event</a></li>
        <li class="active"><a href="<?php echo site_url('adminAlumni/eventManage'); ?>">Event management</a></li>
     </ol>
    <div class="col-md-12">
        <div class="well-sm alert-info">
            Provide information about the event
        </div>
        <?php
            if(isset($posted)){
                echo '<div class="alert alert-success">Event successfull posted</div>';
            }
            ?>
        <?php echo form_open('adminAlumni/saveevent');?>
            <table class="table">
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td class="col-md-2">Event name</td>
                        <td>
                            <?php echo form_error('eventname', '<i class="error">', '</i>'); ?>
                        <input type="text" class="form-control" name="eventname" >
                        </td>
                    </tr>
                     <tr>
                         <td>Event </td>
                         <td> 
                             <textarea  class="form-control" rows="5" name="descrip"></textarea>
                        </td>
                    </tr>
                    
                     <tr>
                         <td>Venue</td>
                         <td>
                            <input type="text" class="form-control" name="venue" required>
                        </td>
                    </tr>
                     <tr>
                         <td colspan="2" >
                             <p class="col-md-4">Event date
                                 <input type="text" class="form-control datepicker" name="evedate" required></p>   
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <input type="checkbox" name="email"> Send to alumni's Email</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="mobile"> Send to alumni's Mobile phone</td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-info btn-sm" name="posevents">Post event</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php include_once 'footer.php'; ?>