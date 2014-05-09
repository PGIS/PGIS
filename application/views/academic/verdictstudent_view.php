<?php include_once 'Headerlogincal.php';?>
<div id="page-wrapper">
    <div class="span12">
    <div class="tab-content" style="display: block">
    <div class="col-lg-12">
    <ul class="nav nav-tabs nav-justified nav-tabs-justified">
        <li class="active"><a data-target=".project" data-toggle="tab"><label>Incoming Verdicts</label></a></li>
        <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".comment" data-toggle="tab"><label>Viewed Verdicts</label></a></li>
    </ul>
        <div class="tab-content" style="display: blocks">
            <div class="project in tab-pane active">
                <div class="pantop"><label style=" padding-top: 20px;">Posted verdicts</label></div>
                <ul class=" list-group">
                    <li class=" list-group-item-info"> Verdicts From: <span><?php echo ''.$supervisor;?></span></li>
                    <li class=" list-group-item">
                        <span class="badge pull-right"><?php echo anchor('project_page/delete/'.$id ,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this verdicts.? Remember this once deleted can not be recovered.!')"));?></span>
                        <?php echo ''.$verdict;?>
                    </li>
                </ul>
           </div>
           <div class="comment in tab-pane <?php if(isset($active1)){echo'active';}?>">
               <div class="col-lg-5">
                   <table class="table table-condensed table-striped" id="mytable3">
                       <thead><tr><th>PROJECT TITLE</th><th>SUPERVISOR NAME</th><th colspan="1">VIEWED<b class="caret"></b></th></tr></thead>
                       <tbody>
                           <?php if(isset($data)){
                           foreach ($data->result() as $row){
                           echo '<tr><td>'.$row->project_title.'</td><td>'.$row->supervisor_name.'</td><td>'.$ow->viewed.'</td><td><label class="btn btn-primary">'.anchor('','<span class="glyphicon glyphicon-share"> view again').'</label></td></tr>';
                           }
                           }?>
                       </tbody>
                   </table>
               </div>
               <div class="col-lg-7">
                   
               </div>
            </div>
            
</div>
</div>
        </div>
</div>
    </div>
<?php include_once 'footer.php';?>



