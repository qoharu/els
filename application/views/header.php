<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css') ?>">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/mini.ico') ?>">
		<script src="<?php echo base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo site_url('home/dash') ?>"><span class="glyphicon glyphicon-home fa-fw"></span> HOME</a></li>
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
