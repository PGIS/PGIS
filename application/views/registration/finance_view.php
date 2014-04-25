<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
      <div class="span12">
        <div class="tabcordion tabs-left tabbable">
            <ul class="nav nav-tabs">
                <li class="<?php if(isset($active)){ echo'active';}?> ">
                    <a data-target=".home" data-toggle="tab" <?php if(isset($recept_no)){ echo'class="red"';}?>>
                       Registration Form  <?php if(isset($recept_no)){ echo'<span class="red glyphicon glyphicon-warning-sign"></span>';}?></a>
                </li>
            <ul class="alert-info">
                <li><label>Options Links</label></li>
            </ul>
                <li class="<?php if(isset($active2)){ echo 'active';}?>">
                    <a data-target=".course" data-toggle="tab">Postponement</a>
                </li>
                <li class="<?php if(isset($active3)){ echo 'active';}?>">
                    <a data-target=".ready" data-toggle="tab">Freezing</a>
                </li>
                <li class="<?php if(isset($active4)){ echo 'active';}?>">
                    <a data-target=".forum" data-toggle="tab">Extension</a>
                </li>
                <li>
                     <a data-target=".preview" data-toggle="tab">Summary preview</a>
                </li>
            </ul>
            <div class="tab-content tb" style="display:block">
                <div class="home in tab-pane <?php if(isset($active)){ echo 'active';}?>">
                    <div class="pantop"><h4>Tuition fee detail*</h4></div>
                    <?php if(!empty($result)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <a type="button" class="close" data-dismiss="alert">&times;</a>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result.'</strong></p>
        </div>
            </div>';}?>
                <?php if(isset($recept_no)){
                          echo '<div class="alert alert-danger fade in">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                        Information you provided lately wasnt correct
                        please correct the information and submit
                    </div>';
                      }?>    
                   <div class="col-md-12">
                        <?php echo form_open_multipart('finance_page/finance');?>
                      
                        <table class="table table-condensed table-striped">
                            <tr>
                                <td>
                                    Registration Fees For:
                                </td>
                                <td>
                                    <select name="reg_fees" class="form-control check" required>
                                        
                                        <option  value="year_one">Year 1</option>
                                        <option value="year_one">Year 2</option>
                                        <option value="year_three">Year 3</option>
                                        <option value="year_four">Year 4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                 <td>
                                  Amount payed
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Amount" required name="amnt"
                                           value="<?php if(isset($amount)){echo $amount;}?>">
                                 </td>
                               
                            </tr>
                            <tr>
                                <td>Recept number/Transaction id</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="ReceiptNo" required name="rescpt"
                                         value="<?php if(isset($recept_no)){echo $recept_no;}?>">
                                </td>
                            </tr>
                            <tr><td>Academic Year:
                                </td>
                                <td><input type="text" name="acy" placeholder="2014/2015" class="form-control" required
                                               value="<?php if(isset($accyear)){echo $accyear;}?>"></td></tr> 
                       
                            <tr>
                                <td >
                                    Mode of Payment
                                </td>
                                <td>
                                    <font class="alert-danger"><?php echo form_error('pay_mode');?></font>
                                    <select name="pay_mode" class="form-control" required>
                                        <option ><?php if(isset($modepay)){echo $modepay;}?></option>
                                        <option >Half semester</option>
                                        <option >Full(Whole) year</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date of payment
                                </td>
                                <td>
                                    <font class="alert-danger"><?php echo form_error('date_payment');?></font>
                                    <input type="text" name="date_payment" class="form-control datepicker" required
                                           value="<?php if(isset($pay_date)){echo $pay_date;}?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Upload supporting doc*
                                    <?php if(isset($recept_no)){echo '<div class="red">new</div>';}?>
                                    <input type="file" name="userfile"  required>
                                </td>
                            </tr>
                        </table>
                            <p align="right"><input type="submit" class="btn btn-info" value="submit" name="feesave" data-loading-text="loading..."></p>
                           <?php echo form_close();?>
                            
                    </div>
                    
                </div>
              <div class="course in tab-pane <?php if(isset($active2)){ echo 'active';}?>">
              <div class="pantop"><h4>Request for Postponement:</h4></div>
        <?php if(!empty($result1)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result1.'</strong></p>
        </div>
            </div>';}?>
        <label>Want to postpone?*</label>
            <?php echo form_open('registration_page/student');?>
                <table class="table table-condensed table-striped">
                    <tr>
                        <td>
                            <label>Postponement:</label>
                        </td>
                        <td>
                            <select name="post" class="form-control" required autofocus>
                                <option id="cl3"></option><option id="cl">1st postponement</option><option id="cl1">2nd postponement</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date:</label>
                        </td>
                        <td>Year 1
                            <input type="text" class="form-control datepicker" placeholder="dd-Mm-YYY"  name="dt" required autofocus>
                        </td>
                    </tr>     
                    <tr>
                        <td colspan="2">
                            <label>Reasons for postponement:</label>
                            <textarea name="rsp" required rows="2" class="form-control" placeholder="Reason ....."></textarea>
                        </td>
                    </tr>
                </table>
            <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
            <?php echo form_close();?>
    </div>
        <div class="ready in tab-pane <?php if(isset($active3)){ echo 'active';}?>">
        <div class="pantop"><h4>Request for Freezing:</h4></div>
        <?php if(!empty($result2)){echo'<div class="bs-docs-example">
            <div class="alert fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p class="alert alert-success"><strong style="margin-left:50px">'.$result2.'</strong></p>
            </div>
                </div>';}
         ?>
             <label>Want to freeze?*</label>
            <?php echo form_open('registration_page/freezing');?>
                <table class="table table-condensed table-striped">
                    <tr>
                        <td>
                            <label>Freezing:</label>
                        </td>
                        <td>
                            <select name="frz" class="form-control" required>
                                <option id="pf0"></option>
                                <option id="pf">1st freezing</option>
                                <option id="pf1">2nd freezing</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Freezing date</label>  
                        </td>
                        <td>
                          <input type="text" class="form-control datepicker" placeholder="Date:frez" name="frzd" required>  
                        </td>
                    </tr>
                    <tr>
                        <td><label>Freezing resume date</label></td>
                        <td><input type="text" class="form-control datepicker" placeholder="Date:resu"  name="rsud" required></td>
                    </tr>
                      <tr>
                          <td colspan="2">
                              <label>Reasons for Freezing:</label>
                              <textarea name="rsf" required rows="6" class="form-control" placeholder="Type something here.."></textarea>
                          </td>
                      </tr>   
                           
                </table>
            <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
            <?php echo form_close();?>
        </div>
        
       <div class="forum in tab-pane <?php if(isset($active4)){ echo 'active';}?>">
        <div class="pantop"><h4>Request for Extension:</h4></div>
        <?php if(!empty($result3)){echo'<div class="bs-docs-example">
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="alert alert-success"><strong style="margin-left:50px">'.$result3.'</strong></p>
        </div>
            </div>';}?>
        <label>Want to extend?*</label>
             <?php echo form_open('registration_page/extension');?>
                <table class="table table-condensed table-striped">
                    <tr>
                        <td><label>Extension:</label></td>
                        <td>
                            <select name="ext" class="form-control" required>
                                <option id="ext0"></option>
                                <option id="ext">1st extension</option>
                                <option id="ext1">2nd extension</option>
                                <option id="ext2">3rd extension</option>
                                <option id="ext3">4th extension</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Extension date</td>
                        <td>
                            <input type="text" class="form-control datepicker" placeholder="Date:ext"  name="exdate" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Extension Duration</td>
                        <td><input type="text" class="form-control" placeholder="Month(perd)" name="period" required></td>
                    </tr>
                    <tr>
                        <td colspan="6"><label>Reasons for Extending:</label>
                            <textarea name="rsex" required rows="6" class="form-control" placeholder="Type something here.."></textarea>
                        </td>
                    </tr>Year 1
                       
                </table>
            <p align="center"><input type="submit" class="btn btn-info" value="submit"></p>
           
        </div>
                <div class="preview tab-pane">
                    <div class="col-md-12">
                        <div class="pantop"><center>Payment detail summary</center></div>
                        <div class="col-md-12">
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <td><label>Choose detail you want to view</label></td>
                                    <td> 
                                        <select name="data_year" id="cye">
                                            <option></option>
                                            <option value="year_one">Year 1</option>
                                            <option value="year_two">Year 2</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                           
                    </div>
                         <div  class="col-md-12" id="yearlydetail">
                                
                            </div>
                </div>
        </div>
  </div>
    
</div>
        </div>
<?php include_once 'footer.php';?>
