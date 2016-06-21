<?php include 'application/views/header.php' ?>

<div class="container">
	<div class="row isi">
		<h2>
		Kelas tersedia
		</h2>
		<a class="btn btn-danger" href="<?php echo site_url('course/mycourse') ?>">My Course</a>

            <section class="col-md-8 col-md-offset-2">
            <?php foreach ($course as $data): ?>
              
              <div class="box box-solid bg-light-blue">
                <div class="box-header" >
                  <h3 class="box-title">
                  <a href="<?php echo site_url('course/view_course/'.$data->id_course) ?>" class="clearlink">
                    <?php echo $data->title ?>
                  </a>
                  </h3>
                  <?php if ($this->session->userdata('uid') != $data->id_user): ?>
                    <?php if ($data->enrolled): ?>
                      <a class="btn bg-green pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Enrolled</a>
                    <?php else: ?>
                      <?php if ($data->count >= $data->quota): ?>
                        <a class="btn bg-red pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Full</a>
                      <?php else: ?>
                        <?php if ((time()-(60*60*24)) < strtotime($data->datetime)): ?>
                        <a class="btn bg-red pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Outdated</a>
                        <?php else: ?>
                        <a class="btn bg-blue pull-right" href="<?php echo site_url('course/enroll/'.$data->id_course) ?>"><i class="fa fa-user-plus">&nbsp;</i> JOIN</a>
                        <?php endif ?>
                      <?php endif ?>
                    <?php endif ?>
                  <?php endif ?>
                </div>
                <div class="box-body">
                  <span class="label bg-blue "><?php echo $data->scope_name ?></span>
                </div>
                <div class="box-footer no-border text-black">
                  <p class="text-black"><?php echo $data->description ?></p>
                  
                  <div class="row">
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-map-marker"></i>&nbsp; <?php echo $data->location ?>
                    </div>
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-calendar"> </i>&nbsp; <?php echo $data->datetime ?>
                      <i class="fa fa-calendar"> </i>&nbsp; <?php echo $data->enddate ?>
                    </div>
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-users"></i>&nbsp; <strong><?php echo $data->count ?></strong>/<?php echo $data->quota ?>
                    </div>
                    <div class="col-xs-3 text-center">
                      <canvas class="canvas-course"></canvas>
                      <i class="text-black fa fa-male"></i>&nbsp; <a href="<?php echo site_url('profile/'.$data->id_user) ?>"><?php echo $data->fullname ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            </section>



  </div>
</div>