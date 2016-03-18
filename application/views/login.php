<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?php echo base_url('assets/css/login.css') ?>" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico') ?>">
		<script src="<?php echo base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">ELS</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.html"><span class="glyphicon glyphicon-home fa-fw"></span> HOME</a></li>
					<!--<li><a href="index.html"><span class="glyphicon glyphicon-menu-hamburger"></span> MENU</a></li>-->
				</ul>
			</div>
		</div>
	</nav>

		<div class="container-text">
			<form class="form-login">
				<h2 class"form-login-heading">Please Login</h2>
				<br>
				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" id="inputUsername" class="form-control" placeholder="Email" required>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Remember Me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</form>

		</div>

	</body>
</html>
