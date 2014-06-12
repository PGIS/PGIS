<?php include_once 'Headerlogin.php'; ?>
<div id="page-wrapper">
    <div class="col-md-12">
        <div class="well-sm alert-info">
            Student With their respective dissertation/thesis
        </div>
        <table class="table table-striped" id="verlist">
            <thead>
                <tr>
                    <th>Registration Id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                $this->db->select('*');
                $this->db->from('tb_project');
                $this->db->join('tb_student', 'tb_student.registrationID = tb_project.registration_id');
                $query = $this->db->get();
                 //$query = $this->db->get('tb_project');
                 if($query->num_rows()>0){
                     foreach ($query->result() as $project){
                         if($project->department===$this->session->userdata('mydepartment')){
                       ?>
                        <tr>
                            <td class="col-md-2"><?php echo $project->registration_id;?></td>
                            <td class="col-md-8"><?php echo $project->project_title;?></td>
                            <td class="col-md-3">
                                <a href="<?php echo site_url('department_Coordinator/registerFeedback/'.$project->registration_id); ?>">
                                    <button type="button" class="btn btn-info btn-xs">feedback</button>
                                </a>
                                <a href="<?php echo site_url('department_Coordinator/studentVerdicts/'.$project->id); ?>">
                                   <button type="button" class="btn btn-info btn-xs">View</button> 
                                </a>
                            </td>
                        </tr>
                <?php
                     }}
                 }
                ?>
            </tbody>
        </table>
    </div>
  <?php include_once 'footer.php'; ?>