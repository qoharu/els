<!DOCTYPE html>
<html lang="en">
<head>
	<title>Experta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/index.css') ?>" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/mini.ico') ?>">
	<script src="<?php echo base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</head>
<!--Header-->
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
					<li><a href="#myPage">HOME</a></li>
					<li><a href="#about">ABOUT</a></li>
					<li><a href="#logreg">LOGIN/SIGN UP</a></li>
					<!--<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">A</a></li>
							<li><a href="#">B</a></li>
							<li><a href="#">C</a></li>
						</ul>
					</li>
					<li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>-->
				</ul>
			</div>
		</div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!--Untuk indikator bulat dibawah gambar-->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li> <!-- Wrapper/gambar dimulai dari 0, active-->
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!--Untuk wrapper/gambar yang di slide-->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?php echo base_url('assets/img/sld-capture.png') ?>" alt="Capture" width="1200" height="700">
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/sld-share.png') ?>" alt="Share" width="1200" height="700">
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/sld-apply.png') ?>" alt="Apply" width="1200" height="700">
				</div>
			</div>
	
		<!--Kursor slider kanan kiri-->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
	</div>

	<div id="about" class="elsabout">
		<div class="container text-center">
				<h3>EXPERT LOCATOR SYSTEM</h3>
				<br>
				<h4>Your knowledge sharing media</h4>
				<p>Expert Locator System (ELS) adalah media sharing knowledge dalam bentuk forum antar sesama karyawan Telkomsel</p>
			<div class="row"> <!-- coba tambah text-center nanti-->
				<h3>FEATURES</h3>
					<br>
					<br>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/img/groupdisc.png') ?>" alt="GroupDiscussion"> <!--coba tambah <class="img-circle feature-icon"> -->
					<br>
					<p><strong>Group Discussion</strong></p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/img/copinov.png') ?>" alt="COPInov">
					<br>
					<p><strong>Communities Of Practice</strong></p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/img/coursejour.png') ?>" alt="Coursejour">
					<br>
					<p><strong>Course And Journal</strong></p>
				</div>
			</div>
		</div>	
	</div>

	<div id="logreg" class="elslogregis"> 
		<div class="container text-center">
				<h3>Sudah memiliki akun ?</h3>
				<br>
			<!--Button 1-->
				<div class="clearfix col-md-4"></div>
					<div class="col-lg-4">
						<a href="<?php echo site_url('account/login') ?>" class="btn btn-block"><span class="glyphicon glyphicon-log-in"></span>	Login</a>
					</div>
				<div class="clearfix col-md-4"></div>
			<!--End Button 1-->
			<!--Space Antar Button-->
				<div class="clearfix col-md-12">
						<br>
				</div>
			<!--End Space Antar Button-->
			<!--Button 2-->
				<div class="clearfix col-md-4"></div>
					<div class="col-lg-4">
						<a href="<?php echo site_url('account/register') ?>" class="btn btn-block"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
					</div>
				<div class="clearfix col-md-4"></div>
			<!--End Button 2-->
		</div>
	</div>

<!--Footer-->
<footer class="text-center">
	<a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</a><br><br>
	<p>&copy 2016</p><br>
	<p>Mahasiswa TA</p>
</footer>

<!--Animasi Scrolling-->
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
})
</script>

<!--<div class="input-group input-group-lg">
  <span class="input-group-addon">
    <span class="glyphicon glyphicon-envelope"></span>
  </span>
  <input class="form-control" type="text" placeholder="Email address">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-addon">
    <span class="glyphicon glyphicon-lock"></span>
  </span>
  <input class="form-control" type="password" placeholder="Password">
</div> -->

</body>
</html>


