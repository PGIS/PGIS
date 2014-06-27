<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-12">
            <div class="well well-sm">
                <p class="text-info">List of students with their respective dissertation/Thesis</p>
            </div>
            <div>
                <table class="table table-condensed table-striped table-hover" id="tbx"> 
                    <?php
                    if(isset($ret)){
                        echo '<thead>'
                        . '<tr><th>Registration Id</th>'
                         . '<th>Full name</th><th>Title</th>'
                        . '<th class="text-center"><b class="glyphicon glyphicon-text-width"></b></th>'
                          . '</tr></thead>';   
                        foreach ($ret->result() as $row){
                            echo '<tbody>'
                            . '<tr><td>'.$row->registration_id.'</td>'
                            . '<td>'.$row->surname.' '.$row->other_name.'</td>'
                            . '<td>'.$row->project_title.'</td>'
                            . '<td class="text-center">'.anchor('college_Coordinator/pr_feed/'.$row->registration_id,'<button class="btn btn-success btn-xs">feedback</button>').'  '.anchor('college_Coordinator/recent_detailcollege/'.$row->id,'<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-share"></span>view</button>').'</td></tr></tbody>';
                        }
                        
                    }
                    
                    ?>
                    
                </table>
            </div>   
        </div>
</div>
</div>
<?php include_once 'footer.php';?>

