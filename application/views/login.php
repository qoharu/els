<?php include "header.php" ?>

		<div class="container-text">
			<form class="form-login" action="<?php echo site_url('account/post_login') ?>" method="POST">
				<center><h2 class"form-login-heading center">Please Login</h2></center>
				<br>
				<input type="email" class="form-control" name="email" placeholder="Email" required>
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Remember Me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-flat btn-block" type="submit">Login</button>
			</form>

		</div>

	</body>
</html>
