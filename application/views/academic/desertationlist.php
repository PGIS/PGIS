<?php include_once 'Headerloginsuper.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <div class="well-sm alert-info">
            Student With their respective dissertation/thesis
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Registration Id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                 $query = $this->db->get('tb_project');
                 if($query->num_rows()>0){
                     foreach ($query->result() as $project){
                       ?>
                        <tr>
                            <td class="col-md-2"><?php echo $project->registration_id;?></td>
                            <td class="col-md-8"><?php echo $project->project_title;?></td>
                            <td class="col-md-3">
                                <a href="<?php echo site_url('supervisor/registerFeedback/'.$project->registration_id); ?>">
                                    <button type="button" class="btn btn-info btn-xs">feedback</button>
                                </a>
                                <a href="<?php echo site_url('supervisor/studentVerdicts/'.$project->id); ?>">
                                   <button type="button" class="btn btn-info btn-xs">View</button> 
                                </a>
                            </td>
                        </tr>
                <?php
                     }
                 }
                ?>
            </tbody>
        </table>
    </div>
  <?php include_once 'footer.php'; ?>