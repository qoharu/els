<?php include 'application/views/header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Change Password</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('account/changepwd_post/'.$user) ?>" method="post">

							<div class="form-group col-md-12">
				                <div class="input-group">
				                  <input class="form-control input-md" type="password" id="password" name="password" placeholder="New Password" required="">
				                  <span class="input-group-btn">
				                    <a class="btn btn-flat btn-default" id="passbtn" ><i class="fa fa-eye"></i></a>
				                  </span>
				                </div>
				              </div>

							<div class="form-group col-md-4 pull-right">
								<input class="btn btn-block btn-primary btn-flat" type="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php echo $user ?>
<script type="text/javascript">
$("#passbtn").click(function(){
  if ($("#password").attr('type') == "password") {
    $("#password").attr('type', 'text');
    $("#passbtn").html("<i class='fa fa-eye-slash'></i>");
  }else{
    $("#password").attr('type', 'password');
    $("#passbtn").html("<i class='fa fa-eye'></i>");
  }
});
</script>