<?php include 'application/views/header.php' ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>New Open Discussion</h3>
						<small><?php echo date('D, d-m-Y') ?></small>
					</div>
					<div class="box-body">
						<form class="" action="<?php echo site_url('discussion/open_create_post') ?>" method="post" >
							<div class="form-group">
								<input class="form-control input-md" type="text" name="title" placeholder="Judul" required="">
							</div>
							<div class="form-group">
								<select name="id_scope" class="form-control input-md">
									<?php foreach ($scope as $data): ?>
										<option value="<?php echo $data->id_scope ?>"><?php echo $data->scope_name ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<textarea name="content" class="form-control input-md textarea" id="" rows="12" maxlength="500" required="" placeholder="Deskripsi"></textarea>	
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