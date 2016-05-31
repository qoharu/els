<?php include 'application/views/header.php' ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
						<h3>Discussion Archive</h3>
							<form>
						<div class="input-group">
			                    <input type="text" name="q" class="form-control" placeholder="Search" >
			                    <span class="input-group-btn">
			                    	<button class="btn btn-primary btn-flat" type="submit">Search</button>
			                	</span>
		                </div>
		                	</form>
		                <div class="isi"></div>
						<?php foreach ($archive as $inov): ?>
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">
									<strong><a href="<?= site_url('discussion/view_discussion/'.$inov->id_discussion); ?>">
									<?= $inov->title ?>
									</a></strong>
									</h3>
										<div class="author">
												Oleh : 
											<a href="">
												<strong><?= $inov->fullname ?></strong>
											</a>
										</div>
								</div>
								<div class="box-body">
									<p><?= substr($inov->content, 0, 100) ?></p>
								</div>
							</div>
						<?php endforeach ?>
						<?php echo $page ?>
				</div>
			</div>
		</div>
	</body>
</html>