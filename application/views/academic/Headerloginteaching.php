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
        <link href="<?php echo base_url('assets/css/datepicker.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jquery.ui.all.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jquery-ui.css')?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/datepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
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
                        <li><button class="mybtn btn-block btn-group-lg" style="margin-left: 4px;">
                                <span class="glyphicon glyphicon-dashboard"></span>INTERNAL SUPERVISOR</button></li>
                        <li><a href="<?php echo site_url('teaching'); ?>"><span class="glyphicon glyphicon-eye-open"></span>
                                View posted project</a></li>
                        <li><a href="<?php echo site_url('change_form'); ?>"><span class="glyphicon glyphicon-wrench"></span>
                                Change password</a></li>
                          <?php
                       $length=sizeof($this->session->userdata('roles'));
                        if($length>1){
                           ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                               <span class="glyphicon glyphicon-random"></span> Change role
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php 
                                   foreach ($this->session->userdata('roles') as $roles){
                                             if($roles!=$this->session->userdata('user_role')){
                                                 $encrole1= $this->encrypt->encode($roles);
                                                 $encrole = str_replace('/','_' , $encrole1);
                                                 echo '<li><a href="'.site_url('login/changeRole/'.$encrole).'"><span class="glyphicon glyphicon-log-in"></span> '.$roles.'</a></li>';
                                             }
                                   }
                                ?>
                            
                            </ul>
                        </li>
                           <?php
                        }
                        ?>
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
                            
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </nav>



