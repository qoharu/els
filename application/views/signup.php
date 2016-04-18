<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign Up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?php echo base_url('assets/css/signup.css') ?>" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/mini.ico') ?>">
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
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">ELS</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.html"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
					<li><a href="index.html"><span class="glyphicon glyphicon-menu-hamburger"></span> MENU</a></li> <!--tambah dropdown-->
				</ul>
			</div>
		</div>
	</nav>

		<div class="container">
			<form class="form-signup" action="<?php echo site_url('account/post_register') ?>" method="POST">
				<h2 class"form-signup-heading">Please Sign Up</h2>
				<br>

					<input type="text" name="fullname" class="form-control" placeholder="Fullname" required autofocus>
					<input type="text" name="nip" class="form-control" placeholder="NIP" required autofocus>
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<select name="posisi" class="form-control">
						<option value="karyawan"> Karyawan</option>
						<option value="be">BE</option>
					</select>
				<br>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
			</form>

		</div>

	</body>
</html>
