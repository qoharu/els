<?php include 'application/views/header.php' ?>
<?php //echo $this->session->userdata('uid') ?>
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-md-offset-3 isi">
			<div class="box box-primary">
			<div class="box-header with-border">
				<h3>Upload Journal</h3>
			</div>
			<div class="box-body">
				<form class="" action="<?php echo site_url('journal/post_new') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input class="form-control input-md" type="text" name="title" placeholder="Judul" required="">
					</div>
					<div class="form-group">
						<textarea name="description" class="form-control input-md" id="" rows="5" maxlength="500" required="" placeholder="Deskripsi"></textarea>	
					</div>
					<div class="form-group">
						<select name="directorate" class="form-control" id="" required="">
							<option selected disabled>Direktorat</option>
							<?php foreach ($directorate as $dir): ?>
								<option value="<?php echo $dir->id_directorate ?>"><?php echo $dir->directorate_name ?> </option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<input class="form-control" type="file" name="file" required="">
					</div>
					<input class="btn col-md-4 btn-primary btn-flat pull-right" type="submit">
				</form>
				
			</div>
			</div>
		</div>
		</div>
		</div>
</body>
</html>