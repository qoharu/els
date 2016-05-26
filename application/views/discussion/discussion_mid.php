<?php
	include 'application/views/header.php';
	$j = array('Ecommerce', 'Enterprise Management', 'Strategic Planning and Business', 'Information Communication Technology');
	$i = 0;
?>

<div class="pull-right col-md-2 isi">
        <a class="btn btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 isi ">
				<?php foreach ($j as $judul): ?>
					
            	<div class="col-md-12">
					<h3><?php echo $judul ?></h3>					
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">
									<strong>
										<a href="<?php echo site_url('discussion/view_discussion/'.@$forum[$i]->id_discussion) ?>"><?php echo @$forum[$i]->title ?></a>
									</strong>
								</h3>
								<div class="author">
									Oleh : 
									<a href="<?php echo site_url('profile/'.@$forum[$i]->id_user) ?>">
										<strong><?php echo @$forum[$i]->fullname ?></strong>
									</a>
								</div>
							</div>
							<div class="box-body">
								<p><?php echo substr(@$forum[$i]->content, 0, 100) ?></p>
								<span class="pull-right badge bg-blue"><?php echo @$forum[$i]->views ?> views</span>
							</div>
						</div>
            	</div>
            	<?php $i++ ?>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>