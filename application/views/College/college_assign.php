<?php include_once 'Headerlogincollege.php';?>
<div id="page-wrapper">
    <div class="span12">
        
        <div class="tab-content" style="display: block">
            <div class="in tab-pane active">
                <div class="col-lg-6">
                    <fieldset>
                        <div class="pantop"><p style="padding-top: 30px;" class="text text-justify text-info"><label>Details For: <?php echo ' '.$registrationID .' ('. ($surname).' )';?></label></p></div>
                        <div>
                            <label>PROJECT TITLE</label>
                            <p class="dts"><?php echo ''.$project_title;?></p>
                        </div>
                        <div>
                            
                            <label>PROJECT DESCRIPTION</label>
                            <p class="dts"><?php echo ''.$project_description;?></p>
                        </div>
                        <div>
                            
                            <label>PROPOSED INTERNAL SUPERVISOR</label>
                            <p class="dts"><?php echo ''.$internal_supervisor;?></p>
                        </div>
                        <div><table class="table table-responsive">
                                <tr><td class="acpt1"><button class="btn btn-primary acpt" data-target="#list" data-toggle="modal">allocate</button></td></tr>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h6 class="modal-title" id="myModalLabel"><label class="pantop">Re-allocate Internal supervisor</label></h6>
                          <div class="loading"></div>
                        </div>
                          <?php echo form_open('college/record_entry/'.$id,array('id'=>'ajax'));?>
                        <div class="modal-body">
                            <table class="table table-condensed table-striped" id="mytable">
                                <thead><tr><th>SELECT</th><th>FULL NAME</th><th>EMAIL</th><th>ACTION</th></tr></thead>
                                <tbody>
                                    
                                    <?php if(isset($teach)){
                                      foreach ($teach->result() as $row){
                                      echo '<tr><td><input type="radio" name="assign" class="form-control" value="'.$row->email.'" required></td><td>'.$row->fullName.'</td><td>'.$row->email.'</td><td><label class="btn btn-warning btn-xs">'.anchor('supervisor/update/'.$row->id,'Details',array('data-target'=>'#details','data-toggle'=>'modal')).'</label></td></tr>';
                                      }
                                      
                                    }?>
                                   
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary">assign</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                  </div>
               <script>
               $('#ajax').submit(function(e){
                   e.preventDefault();
                   var formdata=$(this).serializeArray();
                   var url="<?php echo site_url('college/record_entry/'.$id);?>";
                   $.post(url,formdata,function(data){
                       setTimeout(function(){
                       $('.loading').html(data);
                       },200);
                   });
               }); 
               </script>
</div>
</div>
  
</div>
<?php include_once 'footer.php';?>



