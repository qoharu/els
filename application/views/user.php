<?php include 'header.php'; ?>

<div class="container">
	<div class="row isi">
		<div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/'.$profile->pic) ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $profile->fullname ?></h3>
                  <p class="text-muted text-center"><?php echo $profile->expert_name ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Journal</b> <a class="pull-right"><?php echo $profile->countjournal ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Discussion</b> <a class="pull-right"><?php echo $profile->countdisc ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Course</b> <a href="asd" class="pull-right"><?php echo $profile->countcourse ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Point</b> <a href="asd" class="pull-right"><?php echo $profile->point ?></a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <div class="col-md-9">
            	
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title"><strong> About Me </strong></h2>
                  <?php if ($this->session->userdata('uid') == $profile->id_user): ?>
                    <div class="pull-right">
                      
                    <?php if ($pending): ?>
                      <a class="btn btn-warning disabled" href="">Pending</a>
                    <?php else: ?>
                      <!-- <a class="btn btn-primary" href="<?php echo site_url('account/edit') ?>">Edit</a> -->
                    <?php endif ?>
                      <a class="btn btn-success" href="<?php echo site_url('account/changepwd') ?>">Change Password</a>
                    </div>
                  <?php endif ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>Position</strong>
                  <p class="text-muted">
                    <?php echo $profile->scope_name." - ".$profile->directorate_name." - ".$profile->expert_name ?>
                  </p>

                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Birthdate</strong>
                  <p class="text-muted"><?php echo $profile->birthdate ?></p>

                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Gender</strong>
                  <p class="text-muted"><?php echo $profile->gender ?></p>

                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Contact</strong>
                  <p>Email : <?php echo $profile->email ?></p>

                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Registered at</strong>
                  <p><?php echo $profile->registered_at ?></p>

                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Experience</strong>
                  <?php if ($this->session->userdata('uid') == $profile->id_user): ?>
                    
                  <a class="btn btn-primary pull-right" href="<?php echo site_url('account/addexp') ?>">Add Experience</a>
                  <?php endif ?>
                  <p>
                  <?php foreach ($experience as $data): ?>
                    <li><?php echo $data->keterangan ?></li>
                  <?php endforeach ?>
                  </p>

                  <?php if (isadmin() || issuperadmin()): ?>
                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Points</strong>
                  <p>
                  <?php foreach ($point as $data): ?>
                    <li><?php echo $data->keterangan ?> (<?php echo $data->value ?>)</li>
                  <?php endforeach ?>
                  </p>
                  <?php endif ?>
                </div>
              </div>
            </div>
	</div>
</div>