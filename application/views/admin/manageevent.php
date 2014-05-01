<?php include_once 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <ol class="breadcrumb">
        <li ><a href="<?php echo site_url('adminAlumni'); ?>">Add event</a></li>
        <li class="active"><a href="<?php echo site_url('adminAlumni/eventManage'); ?>">Event management</a></li>
     </ol>
    <?php 
    if(isset($remove)){
        echo '<div class="alert alert-info">'.$remove.'</div>';
    }
    ?>
    <div class="col-md-12">
        List of events
        <table class="table table-striped">
            <thead>
                <th>Event name</th>
                <th>Date</th>
                <th>Event Description</th>
                <th>Action</th>
            </thead>
            <tbody>
               
                    <?php
                     $query = $this->db->get('tb_alumni_events');
                     if($query->num_rows()>0){
                         foreach ($query->result() as $events){
                             echo ' <tr>';
                             echo '<td>'.$events->name.'</td>';
                              echo '<td>'.$events->date.'</td>'; 
                              echo '<td>'.$events->description.'</td>';
                              echo '<td class="col-md-2">'
                              . '<a href="'.site_url('adminAlumni/eventDelete/'.$events->event_id).'">'
                               . '<button class="btn btn-danger btn-xs">Remove</button></a>'
                              . ' <button class="btn btn-success btn-xs">Edit</button></td>'
                              . '</tr>';
                         }
                     }
            
                     ?>
            </tbody>
        </table>
        
    </div>
</div>
<?php include_once 'footer.php'; ?>
