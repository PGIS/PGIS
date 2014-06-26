<?php
if($info=='postponement'){
?>
<br>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            Recorded Postponement for<b><?php echo $full_name;?></b> With registration Number:<b><?php echo $id;?></b>
        </h3>
    </div>
    <div class="panel-body">
       <table class="table">
            <tr>
                <td>
                    Postponement Description
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>". $description."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Date of postponement                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$from."</b>";
                    ?>
                </td>postponement
            </tr>
            <tr>
                <td>
                     Date of resumption
                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$to."</b>";
                    ?>
                </td>
            </tr>
            
        </table>
    </div>
</div>
<?php 

}elseif ($info=='extension') {
?>
<br>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            Recorded extension for<b><?php echo $full_name;?></b> With registration Number:<b><?php echo $id;?></b>
        </h3>
    </div>
    <div class="panel-body">
       <table class="table">
            <tr>
                <td>
                    Extension Description
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>". $description."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Extension start date                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$from."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                     Date of resumption
                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$to."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Period (months) 
                </td>
                <td>
                   <?php
                    echo "<b class='dts'>".$period."</b>";
                    ?> 
                </td>
            </tr>
            
        </table>
    </div>
</div>
<?php
}elseif ($info=='freezing') {
?>
<br>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            Recorded Freezing for<b><?php echo $full_name;?></b> With registration Number:<b><?php echo $id;?></b>
        </h3>
    </div>
    <div class="panel-body">
       <table class="table">
            <tr>
                <td>
                    Freezing Description
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>". $description."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Freezing date                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$from."</b>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                     Date of resumption
                     
                </td>
                <td>
                    <?php
                    echo "<b class='dts'>".$to."</b>";
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php
}elseif ($info=='freezing') {
?>
<div class="panel panel-danger">
  <div class="panel-heading">
      <h4 class="panel-title">
       Recorded Discontinuation for<b><?php echo $full_name;?></b> With registration Number:<b><?php echo $id;?></b>   
      </h4>
  </div>
  <div class="panel-body">
    Discontinuation was recorded on
  </div>
</div>
<?php
}
?>
