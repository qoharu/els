<?php include 'application/views/header.php' ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
							<div class="col-md-12">
		                		<a href="<?php echo site_url('discussion/open_create') ?>" class="btn pull-right btn-primary isi btn-flat" >Create New</a>
							</div>
						<h3>Open Discussion</h3>

						<!-- <div class="input-group">
							<form>
			                    <input type="text" name="q" class="form-control" placeholder="Search" >
			                    <span class="input-group-btn">
			                    	<button class="btn btn-primary btn-flat" type="submit">Search</button>
			                	</span>
		                	</form>
		                </div> -->
		                <div class="isi"></div>
						<?php foreach ($list as $data): ?>
							<?php 
							$data->fullname = (empty($data->fullname)) ? explode('@', $data->email)[0] : $data->fullname;
							?>
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">
									<strong><a href="<?= site_url('discussion/open_view/'.$data->id_discussion); ?>">
									<?= $data->title ?>
									</a></strong>
									</h3>
										<span class="pull-right"><?php echo $data->created_at ?></span>
										<div class="author">
												Oleh : 
											<a href="<?php echo site_url('account/user/'.$data->id_user) ?>">
												<strong><?= $data->fullname ?></strong>
											</a>
										</div>
								</div>
								<div class="box-body">
									<p><?= substr($data->content, 0, 100) ?></p>
								</div>
							</div>
						<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>