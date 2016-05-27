<?php include 'application/views/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>

<div class="container">
	<div class="row isi">
		<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Course Summary</h3>
					</div>
					<div class="box-body">
						<form class="" action="<?php echo site_url('course/post_close/'.$id_course); ?>" method="post">
							<div class="form-group">
								<textarea name="summary" class="form-control input-md textarea" rows="12" maxlength="500" required="" placeholder="Summary"></textarea>	
							</div>
							<input class="btn col-md-4 btn-primary btn-flat pull-right" type="submit">
						</form>
					</div>
				</div>
			</div>
	</div>
</div>


	<script type="text/javascript">
		$('.textarea').wysihtml5();
	</script>