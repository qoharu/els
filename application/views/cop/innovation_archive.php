<?php include 'application/views/header.php' ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12 isi">
						<h3>Innovation Archive</h3>
						<?php foreach ($list_innov as $inov): ?>
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">
									<strong><a href="<?= site_url('cop/innovation_view/'.$inov->id_cop); ?>">
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

				</div>
			</div>
		</div>
	</body>
</html>