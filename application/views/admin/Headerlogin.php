<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PGIS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand visible-lg" href="<?php echo site_url('admin_page');?>">
                        <img src="<?php echo base_url('assets/img/mwenge.gif'); ?>"class="imge" height="35">
                        POSTGRADUATE INFORMATION SYSTEM
                    </a>
              <a class="navbar-brand hidden-lg" href='#'>
                        <img src="<?php echo base_url('assets/img/mwenge.gif'); ?>"class="imge" height="35">PGIS</a>            
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
              <li><button  class="mybtn btn-primary">
                        <span class="glyphicon glyphicon-dashboard"></span> ADMINISTRATIVE PANEL
                 </button>
              </li>
            <li><a href="<?php echo site_url('admin_page/add');?>"><span class="glyphicon glyphicon-plus-sign"></span>  Add user</a></li>
            <li><a href="<?php echo site_url('admin_page/addcourse');?>"><span class="glyphicon glyphicon-plus"></span> Add Programme</a></li>
            <li><a href="<?php echo site_url('register');?>"><span class="glyphicon glyphicon-wrench"></span> Change password</a></li>
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
                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>

                  </ul>
                </li>
	  </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
