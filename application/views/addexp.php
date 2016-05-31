<?php include 'application/views/header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Add Experience</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('account/addexp_post/') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group ">
								<div class="input-group col-md-12 ">
									<input class="form-control input-md " type="text" name="keterangan" placeholder="Description" required="">
								</div>
							</div>

							<div class="form-group">
								<div class="input-group col-md-12 ">
									<input class="form-control input-md " id="date" type="file" name="file">
									<div class="input-group-addon">
			                        	Bukti Tugas - PDF
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