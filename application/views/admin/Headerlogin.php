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
          <a class="navbar-brand" href="<?php echo site_url('frontpage');?>">
		<img src="<?php echo base_url('assets/img/mwenge.gif');?>"class="imge" height="35">    POSTGRADUATE IFORMATION SYSTEM
	  </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="<?php echo site_url('admin_page/add');?>">Add user</a></li>
            <li><a href="<?php echo site_url('register');?>">Change password</a></li>
            <li><a href="<?php echo site_url('logout');?>">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>