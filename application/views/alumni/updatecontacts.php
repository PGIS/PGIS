<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div class="col-md-10 col-lg-offset-1">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" class="success"><center>Update contact information.</center></th>
                </tr>
            </thead>
            
            <tbody>
            <form>
                <tr>
                    <td class="col-md-4">
                      Email address  
                    </td>
                    <td class="col-md-7">
                        <div id="InputsWrapper">
                           <p>
                                <input class="form-control" name="email" type="text" value="joramkimati@gmail.com">
                           </p> 
                        </div>
                       <button type="button" class="btn btn-info btn-xs" id="AddMoreFileBox">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Add Email address
                      </button>
                    </td>
                </tr>
                <tr>
                    <td>
                       Mobile phone number  
                    </td>
                    <td>
                        <div id="thiInputsWrapper">
                             <p>
                                <input class="form-control" name="no" type="text" value="078475828747">  
                              </p>
                        </div>
                        
                      <button type="submit" class="btn btn-info btn-xs" id="AddMoreField">
                          <span class="glyphicon glyphicon-plus-sign"></span>
                          Add mobile phone number</button> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div  class="pull-right">
                            <button type="submit" class="btn btn-info btn-sm">Update contacts</button> 
                        </div> 
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>     
</div>

<?php include_once 'footer.php';?>
