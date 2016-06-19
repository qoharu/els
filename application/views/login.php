<?php include "header.php" ?>

		<div class="container-text">
			<form class="form-login" action="<?php echo site_url('account/post_login') ?>" method="POST">
				<center><h2 class="form-login-heading center">Please Login</h2></center>
				<br>
				<?php if ($success == 0): ?>
					
				<div class="col-md-12 form-group alert alert-danger alert-dismissable">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <i class="icon fa fa-ban"></i> Login Failed!
	            </div>
				<?php endif ?>
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username (NIK)" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Remember Me
						</label>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-block" type="submit">Login</button>
				</div>
			</form>
		</div>

	</body>
</html>
