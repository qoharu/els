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
		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/skins/skin-black-light.min.css') ?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/mini.ico') ?>">
		<script src="<?= base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="full">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url('home') ?>">
					<img src="<?php echo base_url('assets/img/Experta-Logo.png') ?>">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="navbar nav navbar-nav navbar-right">
					<?php if ($islogin): ?>
						<li class="dropdown messages-menu">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				            <i class="fa fa fa-bell">(4)</i>
				          </a>
				          <ul class="dropdown-menu">
				            <li class="header">You have 4 messages</li>
				            <li>
				              <!-- inner menu: contains the actual data -->
				              <ul class="menu">
				                <li><!-- start message -->
				                  <a href="#">
				                    <div class="pull-left">
				                      <i class="fa fa-user"></i>
				                    </div>
				                    <h4>
				                      Sender Name
				                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
				                    </h4>
				                    <p>Message Excerpt</p>
				                  </a>
				                </li><!-- end message -->
				              </ul>
				            </li>
				            <li class="footer"><a href="#">See All Messages</a></li>
				          </ul>
				        </li>
						<li><a href="<?php echo site_url('account/user/'.$uid) ?>"><?php echo $name ?></a></li>
						<li><a class="" href="<?php echo site_url('account/logout') ?>"><span class="fa fa-sign-out"></span> Logout</a></li>	
					<?php endif ?>
					<!--<li><a href="index.html"><span class="glyphicon glyphicon-menu-hamburger"></span> MENU</a></li>-->
				</ul>
			</div>
		</div>
	</nav>

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
