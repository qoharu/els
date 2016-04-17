<?php include "header.php" ?>

		<div class="container-text">
			<form class="form-login" action="<?php echo site_url('account/post_login') ?>" method="POST">
				<center><h2 class"form-login-heading center">Please Login</h2></center>
				
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" required>
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
					<button class="btn btn-lg btn-primary btn-flat btn-block" type="submit">Login</button>
				</div>
			</form>
		</div>

	</body>
</html>
