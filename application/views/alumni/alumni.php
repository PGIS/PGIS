<?php include_once 'Headerlogin.php'; ?>

<div id="page-wrapper">
    <div class="col-md-12 center-block">
        <ul class="nav nav-tabs nav-justified ">
            <li class="active"><a href="#home" data-toggle="tab">Posted events</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="col-md-12">
                   
                    <table class="table table-striped">
                        <h5> Upcoming events</h5>
                        <thead>
                            <th>event name</th>
                            <th>event description</th>
                            <th>date</th>
                        </thead>
                        <tbody>
                            <?php 
                            $query = $this->db->get('tb_alumni_events');
                            if($query->num_rows()>0){
                                foreach ($query->result() as $event){
                              ?> 
                               <tr>
                                    <td class="col-md-3">
                                        <?php echo $event->name;?>
                                    </td>
                                    <td class="col-md-7">
                                        <?php echo $event->description;?>
                                    </td>
                                    <td class="col-md-2">
                                        <?php echo $event->date;?>
                                    </td>
                                </tr> 
                              <?php     
                                } 
                            }
                            ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>