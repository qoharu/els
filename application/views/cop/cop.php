<?php include 'application/views/header.php' ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12 isi">
	            		<div class="col-md-12">
						<a class="btn btn-md btn-block btn-flat btn-danger" href="<?php echo site_url('cop/my_cop') ?>">Dashboard COP</a>
	            		</div>
            	<div class="col-md-12 isi">
            		<div class="pull-right">
						<a href="<?php echo site_url('cop/innovation_archive') ?>" title="Archive" class="btn btn-flat btn-lg bg-navy"><span class="fa fa-file-archive-o"></span> &nbsp;Archive</a>
            			<a href="<?php echo site_url('cop/innovation_new') ?>" class="btn btn-flat btn-lg btn-primary">New Innovation</a>
	            	</div>
						<h3>Innovation</h3>
						<?php foreach ($list_innov as $inov): ?>
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">
									<strong><a href="<?= site_url('cop/innovation_view/'.$inov->id_cop); ?>">
									<?= $inov->title ?>
									</a></strong>
									</h3>
									<span class="pull-right"><?php echo $inov->created_at ?></span>
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
	            	<div class="pull-right">
	            		<a href="<?php echo site_url('cop/bp_topic') ?>" class="btn btn-flat btn-lg bg-orange">Discussion Topic</a>
						<a href="<?php echo site_url('cop/bp_archive') ?>" title="Archive" class="btn btn-flat btn-lg bg-navy"><span class="fa fa-file-archive-o"></span> &nbsp;Archive</a>
						<a href="<?php echo site_url('cop/bp_new') ?>" class="btn btn-flat btn-lg btn-primary">New Best Practice</a>
	            	</div>
						<h3>Best Practice</h3>

						<?php foreach ($list_bp as $bp): ?>
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">
									<strong><a href="<?= site_url('cop/bp_view/'.$bp->id_cop); ?>">
									<?= $bp->title ?>
									</a></strong>
									</h3>
										<span class="pull-right"><?php echo $bp->created_at ?></span>
										<div class="author">
												Oleh : 
											<a href="">
												<strong><?= $bp->fullname ?></strong>
											</a>
										</div>
								</div>
								<div class="box-body">
									<p><?= substr($bp->content, 0, 100) ?></p>
									<span class="pull-right badge bg-blue"><?php echo $bp->scope_name ?></span>
								</div>
							</div>
						<?php endforeach ?>
            	</div>

				</div>
			</div>
		</div>
	</body>
</html>