<?php include 'application/views/header.php' ?>
<?php 
	$pic = (empty($thread->pic)) ? "default.png" : $thread->pic;
	$thread->fullname = (empty($thread->fullname)) ? explode("@", $thread->email)[0] : $thread->fullname;
	$thread->expert_name = (empty($thread->expert_name)) ? "Karyawan" : $thread->expert_name;
?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<div class="container">
	<div class="row">
	<div class="col-md-12 isi">
		
	<div class="col-md-12 box box-danger well">
		<div class="box-header">
		<a href="<?php echo site_url('discussion/open') ?>">Back to discussion list</a>

		</div>
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-red">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="<?php echo site_url('uploads/profile/'.$pic) ?>" alt="user image">
                  </div>
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?php echo site_url('account/user/'.$thread->id_user)  ?>">
                  		<?php echo $thread->fullname; ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5><?= $thread->expert_name; ?></h5>
                </div>
              </div>
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-red">
							<small class="pull-right"><?= $thread->created_at; ?></small>
							<h4><?= $thread->title; ?></h4>
					</div>
					<div class="box-footer content-forum">
					<span class="badge bg-blue pull-right"><?php echo $thread->scope_name ?></span>
						<?= $thread->content; ?>
					</div>
					<?php if ($this->session->userdata('uid') == $thread->id_user && $thread->status == 1): ?>
						<a class="btn btn-default pull-right" href="<?php echo site_url('discussion/open_close/'.$thread->id_discussion) ?>">
							Close Forum
						</a>
					<?php endif ?>

					<?php if ($thread->status == 0): ?>
						<a class="btn disabled btn-danger pull-right" >
							Closed
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
				<div class="widget-user-header <?php echo $kelas ?>">
						<small class="pull-right"><?php echo $komentar->created_at ?></small>
					</div>
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

<?php if ($thread->status == 1 ): ?>
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
			<form action="<?php echo site_url('discussion/open_respond_post/'.$thread->id_discussion) ?>" method="post">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right"><?php echo date('D, d M Y h:m:s') ?></small>
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