<?php include 'header.php'; ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<div class="container">
	<div class="row">
	<div class="col-md-12 isi">
		
	<div class="col-md-12 box box-primary well">
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
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $thread[0]->fullname; ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5><?= $thread[0]->expert_name; ?></h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-red">
							<small class="pull-right"><?= $thread[0]->created_at; ?></small>
							<h4><?= $thread[0]->title; ?></h4>
					</div>
					<div class="box-footer content-forum">
						<?= $thread[0]->content; ?>
					</div>
					<button class="btn btn-default pull-right">
						Close Forum
					</button>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-md-12  box box-primary well">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div>
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $this->session->userdata('fullname')?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5>Business expert di bidang ini dan itu</h5>
                </div>
              </div>
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right">Sun, 17 Apr 2016 19:36:28</small>
							<h4>Kenapa cacing tanah hidupnya di tanah</h4>
					</div>
					<div class="box-footer content-forum">
						
					</div>
				</div>
			</div>
			
		</div>
	</div>


<div class="btn-group pull-right">
                          <button type="button" class="btn btn-default btn">1</button>
                          <button type="button" class="btn btn-default">2</button>
                        </div>
	<div class="col-md-12  box box-primary well isi">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $this->session->userdata('fullname')?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5>Business expert di bidang ini dan itu</h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<form action="#" method="post">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right">Sun, 17 Apr 2016 19:36:28</small>
							<div class="form-group">
		                      <input type="text" class="form-control" name="emailto" placeholder="Title">
		                    </div>
					</div>
					<div class="box-footer content-forum">
						<textarea class="textarea" placeholder="Description" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
					<button class="pull-right btn btn-primary">Submit</button>
				</div>
			</div>
			
		</div>
	</div>



	</div>
	</div>
	</div>

	<script type="text/javascript">
		$('.textarea').wysihtml5();
	</script>