<?php include 'header.php'; ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>New Innovation Post</h3>
					</div>
					<div class="box-body">
						<form class="" action="<?php echo site_url('cop/innovation_post') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input class="form-control input-md" type="text" name="title" placeholder="Judul" required="">
							</div>
							<div class="form-group">
								<textarea name="description" class="form-control input-md textarea" id="" rows="12" maxlength="500" required="" placeholder="Deskripsi"></textarea>	
							</div>
							<div class="form-group">
								<select name="directorate" class="form-control invite-be" multiple required="">
								<?php
									$scope = ""; 
									foreach ($be as $data) {
										if ($data->id_user != $this->session->userdata('uid')) {
											echo "<option value='".$data->id_user."'>";
											echo $data->fullname." - ".$data->directorate_name;
											echo "</option>";
										}
										$scope = $data->scope_name;
									}
								?>
								</select>
							</div>
							<input class="btn col-md-4 btn-primary btn-flat pull-right" type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		$('.textarea').wysihtml5();
	</script>
