<?php include "header.php" ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12 isi">
            	<div class="col-md-12">
						<a href="<?php echo site_url('cop/innovation_new') ?>" class="btn btn-flat btn-lg btn-primary pull-right">New Innovation</a>
						<a href="" title="Archive" class="btn btn-flat btn-lg bg-navy pull-right"><span class="fa fa-file-archive-o"></span></a>
						<h3>Innovation</h3>
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
					
            	<hr>
            	</div>

            	<div class="col-md-12">
						<a href="" class="btn btn-flat btn-lg btn-primary pull-right">New Best Practice</a>
						<a href="" title="Archive" class="btn btn-flat btn-lg bg-navy pull-right"><span class="fa fa-file-archive-o"></span></a>
						<h3>Best Practice</h3>					
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"><strong><a href="">Kenapa bulan itu bulat, gak kotak atau segitiga?</a></strong></h3>
										<div class="author">
												Oleh : 
											<a href="">
												<strong>Ucu</strong>
											</a>
										</div>
								</div>
								<div class="box-body">
									<p>cutted description</p>
									<span class="pull-right badge bg-blue">direktorat</span>
								</div>
							</div>
					
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><strong><a href="">Kenapa bulan itu bulat, gak kotak atau segitiga?</a></strong></h3>
									<div class="author">
											Oleh : 
										<a href="">
											<strong>Ucu</strong>
										</a>
									</div>
							</div>
							<div class="box-body">
								<p>cutted description</p>
								<span class="pull-right badge bg-blue">direktorat</span>
							</div>
						</div>
            	</div>

				</div>
			</div>
		</div>
	</body>
</html>