<?php include 'application/views/header.php' ?>

<div class="container">
	<div class="row isi">
            <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/'.$profile->pic) ?>" alt="User profile picture">
                  <h2 class="box-title"><strong> Current </strong></h2>
                </div>
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>NIK</strong>
                  <p class="text-muted">
                    <?php echo $profile->NIK ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-book margin-r-5"></i>Expertise</strong>
                  <p class="text-muted">
                    <?php echo $profile->expert_name ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Birthdate</strong>
                  <p class="text-muted"><?php echo $profile->birthdate ?></p>

                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Gender</strong>
                  <p class="text-muted"><?php echo $profile->gender ?></p>

                </div>
              </div>
            </div>
            <div class="content-pending col-md-2 text-center">
        	<h2 class="fa fa-arrow-right"></h2>
        	<hr>
          	<a class="btn btn-success" href="<?php echo site_url('admin/approve_pending/'.$pending->id_pending) ?>">Accept</a>
          	<a class="btn btn-danger" href="<?php echo site_url('admin/decline_pending/'.$pending->id_pending) ?>">Decline</a>
        	</div>
            <div class="col-md-5">
            	
            </div>

            <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/profile/'.$pending->pic) ?>" alt="User profile picture">
                  <h2 class="box-title"><strong> New </strong></h2>
                </div>
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>NIK</strong>
                  <p class="text-muted">
                    <?php echo $pending->NIK ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-book margin-r-5"></i>Expertise</strong>
                  <p class="text-muted">
                    <?php echo $pending->expert_name ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Birthdate</strong>
                  <p class="text-muted"><?php echo $pending->birthdate ?></p>

                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Gender</strong>
                  <p class="text-muted"><?php echo $pending->gender ?></p>

                </div>
              </div>
            </div>
	</div>
</div>