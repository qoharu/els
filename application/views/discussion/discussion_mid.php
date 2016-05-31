<?php
	include 'application/views/header.php';
	$j = array('Ecommerce', 'Enterprise Management', 'Strategic Planning and Business', 'Information Communication Technology');
	$i = 0;
?>

<div class="pull-right col-md-3 isi">
        <a href="http://localhost/els/discussion/discussion_archive" title="Archive" class="btn btn-flat btn-lg bg-navy"><span class="fa fa-file-archive-o"></span> &nbsp;Archive</a>

        <?php if (isbe()): ?>
            <a class="btn btn-flat btn-lg btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
        <?php endif ?>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 isi ">
				<?php foreach ($j as $judul): ?>
				<?php if (!empty($forum[$i]->title)): ?>
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
				<?php endif ?>
            	<?php $i++ ?>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>