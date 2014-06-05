<?php include_once 'Headerlogincollege.php';?>
<div id="page-wrapper">
    <div class="span12">
        <div class="col-lg-7">
            <div class="pantop"><legend class="text text-info" style="padding-top: 20px;"><p>Records of unassign external supervisors</p></legend></div>
                    <table class="table table-striped" id="mytablesa">
                        <thead><tr><th>REGISTRATION</th><th>FULL NAME<th>PROJECT TITLE</th><th>INTERNAL SUP</th><th>Action<b class="caret"></b></th></tr></thead>
                        <tbody>
                            <?php if(isset($query)){
                              foreach ($query->result() as $row1){
                               echo '<tr><td>'.$row1->registration_id.'</td><td>'.$row1->surname.' '.$row1->other_name.'</td><td>'.$row1->project_title.'</td><td>'.$row1->Internal_supervisor.'</td><td><div class="btn-group btn-group-xs"><button class="btn btn-success btn-xs" data-toggle="dropdown">assign<b class="caret"></b></button>'
                                       . '<ul class="dropdown-menu" role="menu">'
                                       . '<li onclick="collegeexternal(\''.$row1->id.'\')"><a href="#">External supervisor</a></li>'
                                       . '<li onclick="collegeinternal(\''.$row1->id.'\')"><a href="#">Internal supervisor</a></li>'
                                       . '</ul>'
                                       . '</td></tr>';
                              }
                        }
                        ?>
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
</script>
<?php include_once 'footer.php';?>

