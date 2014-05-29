<?php include 'include/errorheader.php';?>

<div id="page-wrapper">
    <div class="alert alert-danger col-md-12">
        <div class="col-lg-offset-2 col-md-8">
            <h2><span class="glyphicon glyphicon-exclamation-sign"></span>
            Something went wrong</h2>
        </div>
        <div class="col-md-12">
             Please repeat again.Remember to provide valid information
        </div>
    </div>
    <div class="col-md-12">
        <button type="button" class="col-md-4 col-lg-offset-4 btn btn-warning" data-toggle="collapse" data-target="#erro">
            Reporting an error
        </button>
        <div id="erro" class="collapse col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Error reporting</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Email
                               <div class="input-group">
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" class="form-control" placeholder="Your email address">
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Problem description
                                <textarea class="form-control" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-xs btn-info">Submit problem</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php';?>	
