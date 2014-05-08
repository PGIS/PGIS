<?php include_once 'Headerloginsuper.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-11">
            <div class="tabcordion tabs-left tabbable" style=" padding-top: 20px;">
                <ul class="nav nav-tabs">
                <li class="active"><a data-target=".listed" data-toggle="tab">Student List</a></li>
                <li><a data-target=".nlist" data-toggle="tab">Student commented</a></li>
            </ul>   
            <div class="tab-content" style="display: block">
                <div class="listed in tab-pane active">
                    <div class="text-center well well-sm">Present students</div>
                    <table class="table table-condensed table-striped" id="mytable">
                        <thead>
                            <tr><th>REGISTRATION ID</th><th>FIRST NAME</th><th>OTHER NAME</th><th>PROJECT TITLE</th><th>ACTION</th></tr>
                        </thead>
                        <tbody>
                     <?php if(isset($verdict)){
     
                       foreach ($verdict->result() as $ras){
                           echo '<tr><td>'.$ras->registration_id.'</td><td>'.$ras->surname.'</td><td>'.$ras->other_name.'</td><td>'.$ras->project_title.'</td><td>'.anchor('supervisor/put_verdict/'.$ras->id,'<span class="glyphicon glyphicon-share"> verdict</span>').'</td></tr>';
     }
                        }?>
                        </tbody>
                    </table>
                </div>
                <div class="nlist in tab-pane">
                    <div class="text-center well well-sm">Present students</div>
                    <table class="table table-condensed table-striped" id="mytable1">
                        <thead>
                            <tr><th>REGISTRATION ID</th><th>FIRST NAME</th><th>OTHER NAME</th><th>PROJECT TITLE</th><th>VERDICTS ADDED</th></tr>
                        </thead>
                        <tbody>
                     <?php if(isset($data1)){
     
                       foreach ($data1->result() as $ras){
                           echo '<tr><td>'.$ras->registration_id.'</td><td>'.$ras->surname.'</td><td>'.$ras->other_name.'</td><td>'.$ras->project_title.'</td><td class="dts">'.strtoupper($ras->check).'</td></tr>';
     }
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
     </div>
        </div>
</div>    
</div>
<?php include_once 'footer.php';?>

