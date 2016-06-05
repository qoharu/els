<?php include 'application/views/header.php' ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/daterangepicker-bs3.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/daterangepicker.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Edit Profile</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('account/post_edit/') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group col-md-12">
								<div class="input-group ">
									<input class="form-control input-md " type="text" name="NIK" placeholder="NIK" required="" value="<?php echo $profile->NIK ?>">
									<div class="input-group-addon">
			                        	NIK
			                      	</div>
								</div>
							</div>

							<div class="form-group col-md-12">
								<div class="input-group ">
									<input class="form-control input-md " type="text" name="fullname" placeholder="Fullname" required="" value="<?php echo $profile->fullname ?>">
									<div class="input-group-addon">
			                        	Fullname 
			                      	</div>
								</div>
							</div>

							<div class="form-group col-md-12">
								<div class="input-group ">
									<select class="form-control input-md" name="gender" required="">
										<option value="M">MALE</option>
										<option value="F">FEMALE</option>
									</select>
									<div class="input-group-addon">
			                        	Gender 
			                      	</div>
								</div>
							</div>

							<div class="form-group col-md-12">
								<div class="input-group ">
									<input class="form-control input-md " id="date" type="text" name="birthdate" placeholder="Birthdate" required="" value="<?php echo $profile->birthdate ?>">
									<div class="input-group-addon">
			                        	Birthdate 
			                      	</div>
								</div>
							</div>

							<div class="form-group col-md-12">
									<select class="form-control input-md expert" name="expert" required="">
										<?php foreach ($expert as $data): ?>
											<option value="<?php echo $data->id_expert ?>"><?php echo $data->expert_name ?></option>	
										<?php endforeach ?>
									</select>
							</div>

							<div class="form-group col-md-12">
								<div class="input-group ">
									<input class="form-control input-md " id="date" type="file" name="picture" accept="image/*" required="">
									<div class="input-group-addon">
			                        	Picture
			                      	</div>
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
	<script type="text/javascript">
		$("#date").daterangepicker({
			timePicker: false,
	        singleDatePicker: true,
	        showDropdowns: true,
	        format: 'YYYY-MM-DD'
		});

		$(".expert").select2({
			placeholder: "Expert"
		});
	</script>
