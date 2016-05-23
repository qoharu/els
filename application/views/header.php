<?php 
	$name = @$this->session->userdata('fullname');
	$uid = @$this->session->userdata('uid');
	$islogin = @$this->session->userdata('islogin');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/select2.min.css') ?>">
		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/skins/skin-black-light.css') ?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/mini.ico') ?>">
		<script src="<?= base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="full hold-transition skin-black-light fixed">
		<header class="main-header">
        <a href="<?php echo site_url('home') ?>" class="logo">
        	<img class="logo-exp" src="<?php echo base_url('assets/img/Experta-Logo.png') ?>">
          <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
      
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-danger">2</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Discussion
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="http://localhost/adminlte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('fullname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="http://localhost/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('fullname').' - '.strtoupper($this->session->userdata('level'))  ?>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('profile/'.$this->session->userdata('uid')); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('account/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

            <div class="modal example-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p id="modal-content">One fine body…</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-flat pull-right modal-close" data-dismiss="modal">OK</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
