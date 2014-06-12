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
               
                <li class="<?php if(isset($active4)){ echo 'active';}?>">
                    <a data-target=".forum" data-toggle="tab">Extension</a>
                </li>
                <li>
                     <a data-target=".preview" data-toggle="tab">Summary preview</a>
                </li>
            </ul>
            <div class="tab-content tb" style="display:block">
                <div class="home in tab-pane <?php if(isset($active)){ echo 'active';}?>">
                    <div class="pantop"><h4>Payments detail</h4></div>
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
                                    Academic Year:
                                </td>
                                <td>
                                    <select name="acy" class="form-control" required>
                                        <option><?php if(isset($accyear)){echo $accyear;}
                                        $year=  date('Y');
                                        ?></option>
                                        <option><?php echo ($year-5).'/'.($year-4)?></option>
                                        <option><?php echo ($year-4).'/'.($year-3);?></option>
                                        <option><?php echo ($year-3).'/'.($year-2);?></option>
                                        <option><?php echo ($year-2).'/'.($year-1)?></option>
                                        <option><?php echo ($year-1).'/'.($year);?></option>
                                        <option><?php echo ($year).'/'.($year+1)?></option>
                                       
                                    </select>
                                    
                                </td>
                            </tr> 
                       
                            <tr>
                                <td>
                                    Payment For:
                                </td>
                                <td>
                                    <select name="reg_fees" class="form-control check" required>
                                        <option  value="Tuition Fee">Tuition Fee</option>
                                        <option value="Direct Cost">Direct Cost</option>
                                        <option value="year_three">Tuition Fee AND Direct Cost</option>
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
              
        
       <div class="forum in tab-pane <?php if(isset($active4)){ echo 'active';}?>">
        <div class="pantop"><h4>Request for Extension:</h4></div>
        <div>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exdet">
                    <span class="glyphicon glyphicon-euro"></span>
                    Extension payment detail.(only for approved extension)
                </button>
            
            <div class="modal fade" id="exdet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h6 class="modal-title" id="myModalLabel">Extension payment detail</h6>
                    </div>
                    <div class="modal-body">
                       <div class="col-md-12">
                        <?php echo form_open_multipart('finance_page/finance');?>
                      
                        <table class="table table-condensed table-striped">
                            <tr>
                                <td>
                                    Academic Year:
                                </td>
                                <td>
                                    <select name="acy" class="form-control" required>
                                        <option><?php if(isset($accyear)){echo $accyear;}
                                        $year=  date('Y');
                                        ?></option>
                                        <option><?php echo ($year-5).'/'.($year-4)?></option>
                                        <option><?php echo ($year-4).'/'.($year-3);?></option>
                                        <option><?php echo ($year-3).'/'.($year-2);?></option>
                                        <option><?php echo ($year-2).'/'.($year-1)?></option>
                                        <option><?php echo ($year-1).'/'.($year);?></option>
                                        <option><?php echo ($year).'/'.($year+1)?></option>
                                       
                                    </select>
                                    
                                </td>
                            </tr> 
                       
                            <tr>
                                <td>
                                    Payment For:
                                </td>
                                <td>
                                    <select name="reg_fees" class="form-control check" required>
                                        <option  value="Tuition Fee">Extension Fee</option>
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
                            <tr>
                                <td >
                                    Extension Duration
                                </td>
                                <td>
                                    <font class="alert-danger"><?php echo form_error('pay_mode');?></font>
                                    <select name="pay_mode" class="form-control" required>
                                        <?php 
                                         for($i=1;$i<10;$i++){
                                             echo ' <option >'.$i;
                                             if($i>1){
                                                 echo ' Months';
                                             }  else {
                                                    echo ' Month';
                                             }
                                             echo '</option>';
                                         }
                                        ?>
                                       
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date of payment
                                </td>
                                <td>
                                    <font class="alert-danger"><?php echo form_error('date_payment');?></font>
                                    <input type="text" name="date_payment" class="form-control datepicke" required
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
                           
                           <?php echo form_close();?>
                            
                    </div> 
                    </div>
                    <div class="modal-footer">
                         <input type="submit" class="btn btn-info btn-xs" value="submit" name="feesave">
                      <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            
        </div>
            
        </div>
            <div class="preview tab-pane">
                <div class="col-md-12">
                    <div class="pantop"><center>Payment detail summary</center></div>
                    <div class="col-md-12">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <td><label>Choose detail you want to view</label></td>
                                <td> 
                                    <select name="data_year" id="cye" class="form-control">
                                        <option></option>
                                        <?php

                                        $this->db->distinct();
                                        $this->db->select('academic_year');
                                        $this->db->where(array('application_id'=>$this->session->userdata('userid')));
                                        $myuery = $this->db->get('tb_finance');
                                        if($myuery->num_rows()>0){
                                            foreach ($myuery->result() as $acc){
                                             echo '<option value="'.$acc->academic_year.'">'.$acc->academic_year.'</option>'; 
                                            }
                                        }
                                        ?>
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
        </div>
<?php include_once 'footer.php';?>
