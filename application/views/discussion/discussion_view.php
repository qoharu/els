<?php include 'application/views/header.php' ?>

<?php 
if (empty($thread[0]->pic)) {
    	$pic = "default.png";
    }else{
    	$pic = $thread[0]->pic;
    }
?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<div class="container">
	<div class="row">
	<div class="col-md-12 isi">
		
	<div class="col-md-12 box box-danger well">
		<div class="box-header">
		<?php $i=0; foreach ($tree as $tangkal): ?>
			<?php if ($i): ?>
				<?php echo '> ' ?>
			<?php endif ?>
			
			<a href="<?php echo $tangkal['url'] ?>"><?php echo $tangkal['title'] ?></a>&nbsp;
		<?php $i++; endforeach ?>



		</div>
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-red">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="<?php echo site_url('uploads/profile/'.$pic) ?>" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?php echo site_url('account/user/'.$thread[0]->id_user)  ?>">
                  		<?php echo $thread[0]->fullname; ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5><?= $thread[0]->expert_name; ?></h5>
                </div>
              </div>
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-red">
							<small class="pull-right"><?= $thread[0]->created_at; ?></small>
							<h4><?= $thread[0]->title; ?></h4>
					</div>
					<div class="box-footer content-forum">
					<span class="badge bg-blue pull-right"><?php echo $thread[0]->scope_name ?></span>
						<?= $thread[0]->content; ?>

						<?php if ($thread[0]->status == 0 && !empty($thread[0]->summary)): ?>
							<h3>Summary</h3>
							<?php echo $thread[0]->summary; ?>
						<?php endif ?>
					</div>
					<?php if ($this->session->userdata('uid') == $thread[0]->id_user && $thread[0]->status == 2): ?>
						<a class="btn btn-default pull-right" href="<?php echo site_url('discussion/disc_close/'.$id_disc) ?>">
							Close Forum
						</a>
					<?php endif ?>

					<?php if ($thread[0]->status != 2): ?>
						<?php
							$status = switchstatus($thread[0]->status);
		                    $kelas = $status['class'];
		                    $judul = $status['title'];
						?>
						<a class="btn disabled <?php echo $kelas ?> pull-right" >
							<?php echo $judul ?>
						</a>
					<?php endif ?>
				</div>
			</div>
			
		</div>
	</div>

<?php foreach ($comment as $komentar ): ?>
<?php 
	$kelas = ($komentar->level_name == 'be') ? 'bg-red' : 'bg-blue' ;
	$box = ($komentar->level_name == 'be') ? 'box-danger' : 'box-primary' ;
    if ($komentar->level_name == 'karyawan') {
        $fullname = explode('@', $komentar->email)[0];
        $expert = 'Karyawan';
    }else{
    	$fullname = $komentar->fullname;
        $expert = $komentar->expert_name;
    }

    if (empty($komentar->pic)) {
    	$pic = "default.png";
    }else{
    	$pic = $komentar->pic;
    }
 ?>

<div class="col-md-12 box <?php echo $box ?> well">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <div class="widget-user-header <?php echo $kelas ?>">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="<?php echo site_url('uploads/profile/'.$pic) ?>" alt="user image">
                  </div>
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?php echo site_url('account/user/'.$komentar->id_user)  ?>">
                  		<?php echo $fullname ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5><?php echo $expert ?></h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="box-footer content-forum">
						<?php echo $komentar->content ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<?php endforeach ?>
<div class="btn-group pull-right">
	<?php echo $page ?>
</div>

<?php if ($thread[0]->status ==2 ): ?>
<div class="col-md-12 box box-primary well isi">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="<?php echo site_url('uploads/profile/'.$this->session->userdata('pic')) ?>" alt="user image">
                  </div>
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?php echo site_url('account/user/'.$this->session->userdata('uid'))  ?>">
                  		<?php echo $this->session->userdata('fullname') ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                	<?php echo $this->session->userdata('level') ?>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
			<form action="<?php echo site_url('discussion/respond_post/'.$thread[0]->id_discussion) ?>" method="post">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right"><?php echo date('D, d M Y h:m:s') ?></small>
							<div class="form-group">
		                      <input type="text" class="form-control" name="title" placeholder="Title (Optional)">
		                    </div>
					</div>
					<div class="box-footer content-forum">
						<textarea class="textarea textarea-forum" name="content" placeholder="Description" required ></textarea>
					</div>
						<button class="pull-right btn btn-primary" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
<?php endif ?>
	</div>

	<script type="text/javascript">
		$('.textarea').wysihtml5();
	</script>