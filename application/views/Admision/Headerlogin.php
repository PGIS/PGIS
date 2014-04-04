<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/gif">
    <title>PGIS</title>
    
    
    
    <link href="<?php echo base_url('assets/css/bootstrap-combined.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
  </head>



        <link href="<?php echo base_url('assets/css/bootstrap-combined.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
    </head>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
          <ul class="nav navbar-nav side-nav">
              <li>
                    <button  class="mybtn btn-primary">
                        <span class="glyphicon glyphicon-dashboard"></span>COICT ADMISSION PANEL
                    </button>
              </li> 
            <li><a href="<?php echo site_url('admision');?>"><span class="glyphicon glyphicon-list"></span>
	    Unchecked Applications</a></li>
            <li><a href="<?php echo site_url('admision/admitted_applicants');?>">
	    <span class="glyphicon glyphicon-tasks"></span> Admitted applicant's</a></li>
	    
            <li><a href="<?php echo site_url('messages');?>">
                    <span class="glyphicon glyphicon-envelope"></span> Messages</a>
            </li>
             <li><a href="<?php echo site_url('change_form');?>"><span class="glyphicon glyphicon-wrench"></span>
	    Change password</a></li>
            <li><a href="<?php echo site_url('logout');?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
	  
	  <ul class="nav navbar-nav navbar-right navbar-user">
	    <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<span class="glyphicon glyphicon-user"></span>
		<?php
		 if($this->session->userdata('logged_in')){
		    echo $this->session->userdata('userid');
		}
		?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                
              </ul>
            </li>
	  </ul>
	  
        </div><!-- /.navbar-collapse -->
      </nav>
      
