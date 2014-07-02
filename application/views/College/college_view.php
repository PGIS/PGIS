<?php include_once 'Headerlogincollege.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified nav-tabs-justified">
                <li class="<?php if(isset($active1)){echo'active';}?>"><a data-target=".checked" data-toggle="tab"><label class="glyphicon glyphicon-align-justify">Assigned</label></a></li>
                <li class="<?php if(isset($active2)){echo'active';}?>"><a data-target=".unchecked" data-toggle="tab"><label class="glyphicon glyphicon-align-center">Unassigned</label></a></li>
            </ul>
            <div class="tab-content" style="display: block">
              <div class="checked in tab-pane <?php if(isset($active1)){echo'active';}?>">
                    <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of assigned internal examiner</p></legend></div>
                    <table class="table table-striped" id="mytablesa">
                        <thead>
                            <tr>
                                <th>REGISTRATION ID</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>INTERNAL EXAMINER</th>
                                 <th>EXTERNAL EXAMINER</th>
                                <th>STATUS<b class="caret"></b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($query)){
                              foreach ($query->result() as $row1){
                                  
                               echo '<tr>'
                                       . '<td>'.$row1->registrationID.'</td>'
                                       . '<td>'.$row1->surname.'</td>'
                                       . '<td>'.$row1->other_name.'</td>'
                                       . '<td>'.$row1->internal_examiner.'</td>'
                                       . '<td>'.$row1->external_examiner.'</td>'
                                       . '<td>'.anchor('college/recent_detail/'.$row1->registrationID,'<button class="btn btn-primary btn-xs">Details</button>').'</td>'
                                   . '</tr>';
                              
                              }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="unchecked in tab-pane <?php if(isset($active2)){echo 'active';}?>">
                   <div class="col-lg-7">
            <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of unassigned external & internal examiners</p></legend></div>
                    <table class="table table-striped" id="mytablesz">
                        <thead><tr><th>REGISTRATION</th><th>FULL NAME<th>PROJECT TITLE</th><th>INTERNAL SUP</th><th>Action<b class="caret"></b></th></tr></thead>
                        <tbody>
                            <?php if(isset($query1)){
                              foreach ($query1->result() as $row1){
                               echo '<tr><td>'.$row1->registrationID.'</td><td>'.$row1->surname.' '.$row1->other_name.'</td><td>'.$row1->project_title.'</td><td>'.$row1->Internal_supervisor.'</td><td><div class="btn-group btn-group-xs"><button class="btn btn-success btn-xs" data-toggle="dropdown">assign<b class="caret"></b></button>'
                                       . '<ul class="dropdown-menu" role="menu">'
                                       . '<li onclick="collegeexternal(\''.$row1->id.'\')"><a href="#">External examiner</a></li>'
                                       . '<li onclick="collegeinternal(\''.$row1->id.'\')"><a href="#">Internal examiner</a></li>'
                                       . '</ul>'
                                       . '</td></tr>';
                              }
                           }
                        if(isset($ext)){
                            foreach ($ext->result() as $rowz){
                               echo '<tr><td>'.$rowz->registrationID.'</td><td>'.$rowz->surname.' '.$rowz->other_name.'</td><td>'.$rowz->project_title.'</td><td>'.$row1->Internal_supervisor.'</td><td><div class="btn-group btn-group-xs"><button class="btn btn-success btn-xs" data-toggle="dropdown">assign<b class="caret"></b></button>'
                                       . '<ul class="dropdown-menu" role="menu">'
                                       . '<li onclick="collegeexternal(\''.$rowz->id.'\')"><a href="#">External examiner</a></li>'
                                       . '<li onclick="collegeView(\''.$rowz->id.'\')"><a href="#" class="text text-success" title="assigned"><span class="glyphicon glyphicon-ok"></span> Internal examiner</a></li>'
                                       . '</ul>'
                                       . '</td></tr>';
                              }
                        }?>
                        </tbody>
                    </table>
                
        </div> 
        <div class="col-lg-5">
        <div class="staff"></div>
        </div>
        </div>
 
    </div>
  <script>
    function collegeinternal(id){
        var url="<?php echo site_url('college/extendz');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
            $('.staff').html(data);
        });
    }
    function collegeView(id){
      var url="<?php echo site_url('college/studentDetail');?>";
      var url2=url+'/'+id;
      $.get(url2,function(smz){
          $('.staff').html(smz);
      });
    }
    function collegeexternal(id){
        var url="<?php echo site_url('college/examinerTest');?>";
        var url2=url+'/'+id;
        $.get(url2,function(sms){
           $('.staff').html(sms); 
        });
    }
</script>
 </div>
</div>    
</div>
<?php include_once 'footer.php';?>

