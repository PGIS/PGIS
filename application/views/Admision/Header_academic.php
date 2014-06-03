<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PGIS</title>



        <link href="<?php echo base_url('assets/css/bootstrap-combined.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/all.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/tooltip.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jquery-ui.css')?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/datepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/core.js')?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.ui.widget.js')?>"></script>
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
                    <a class="navbar-brand visible-lg" href="#">
                        <img src="<?php echo base_url('assets/img/mwenge.gif'); ?>"class="imge" height="35">
                        POSTGRADUATE INFORMATION SYSTEM
                    </a>
                    <a class="navbar-brand hidden-lg" href='#'>
                        <img src="<?php echo base_url('assets/img/mwenge.gif'); ?>"class="imge" height="35">PGIS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo site_url('admision'); ?>"><span class="glyphicon glyphicon-list"></span>
                                Unchecked Applications</a></li>
                        <li><a href="<?php // echo site_url('');           ?>">
                                <span class="glyphicon glyphicon-tasks"></span> Rejected Applications</a></li>
                        <li><a href="<?php // echo site_url('');           ?>"><span class="glyphicon glyphicon-list-alt"></span>
                                Pending Application</a></li>
                        <li><a href="<?php // echo site_url('');           ?>"><span class="glyphicon glyphicon-comment"></span>  Messaging</a></li>
                        <li><a href="<?php echo site_url('user_admission_c/read_content'); ?>"><span class="glyphicon glyphicon-ok"></span> Mark Applicant Thesis</a></li>
                        <li><a href="<?php echo site_url('logout'); ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php
                                if ($this->session->userdata('logged_in')) {
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
