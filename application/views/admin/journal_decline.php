<?php include 'application/views/header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<h3>Decline Journal</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('admin/decline_journal_post/'.$id) ?>" method="post">
							<div class="form-group ">
								<div class="input-group col-md-12">
									<textarea class="form-control input-md" name="keterangan" placeholder="Description" required=""></textarea>
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