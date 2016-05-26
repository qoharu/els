<?php include 'application/views/header.php' ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/daterangepicker-bs3.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/daterangepicker.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<a class="btn btn-sm btn-warning pull-right" target="_blank" href="<?php echo site_url('discussion/view_discussion/'.$detail->id_discussion) ?>">Review Discussion</a>
						<h3>Open Course</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('course/post_new/'.$detail->id_step) ?>" method="post" >
							<div class="form-group col-md-12">
								<input class="form-control input-md" type="text" name="title" placeholder="Judul" required="">
							</div>
							<div class="form-group col-md-4">
								<div class="input-group ">
									<div class="input-group-addon">
			                        	<i class="fa fa-users"></i>
			                      	</div>
									<input class="form-control input-md " type="number" value="20" name="quota" placeholder="Quota" required="">
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="input-group ">
									<div class="input-group-addon">
			                        	<i class="fa fa-calendar"></i>
			                      	</div>
									<input class="form-control input-md " id="datetime" type="text" name="datetime" placeholder="Date Time" required="">
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="input-group ">
									<div class="input-group-addon">
			                        	<i class="fa fa-map-marker"></i>
			                      	</div>
									<input class="form-control input-md " type="text" name="location" placeholder="Tempat" required="">
									<input type="hidden" name="id_scope" value="<?php echo $detail->id_scope ?>">
								</div>
							</div>

							<div class="form-group col-md-12">
								<span class="badge bg-blue"><?php echo $detail->scope_name ?></span>
							</div>
							<div class="form-group col-md-12">
								<textarea name="description" class="form-control input-md textarea" id="" rows="12" maxlength="500" required="" placeholder="Deskripsi"></textarea>	
							</div>
							<div class="form-group col-md-4 pull-right">
								<input class="btn btn-block btn-primary btn-flat" type="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		$("#datetime").daterangepicker({
			timePicker: true,
	        singleDatePicker: true,
	        timePicker24Hour : true,
	        showDropdowns: true,
	        timePickerIncrement: 30,
	        format: 'YYYY-MM-DD H:mm:ss'
		});

		$('.textarea').wysihtml5();
	</script>
