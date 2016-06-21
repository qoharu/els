<?php include 'application/views/header.php' ?>

<div class="container">
	<div class="row isi">
            <section class="col-md-8 col-md-offset-2">           
              <div class="box box-solid bg-light-blue">
                <div class="box-header" >
                  <h3 class="box-title">
                  <a href="<?php echo site_url('course/view_course/'.$course->id_course) ?>" class="clearlink">
                    <?php echo $course->title ?>
                  </a>
                  </h3>
                  <?php if ($course->status): ?>
                    <?php if ($this->session->userdata('uid') != $course->id_user): ?>
                      <?php if ($course->enrolled): ?>
                        <a class="btn bg-green pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Enrolled</a>
                      <?php else: ?>
                        <?php if ($course->count >= $course->quota): ?>
                          <a class="btn bg-red pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Full</a>
                        <?php else: ?>
                          <?php if ((time()) > strtotime($course->datetime)): ?>
                          <a class="btn bg-red pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Outdated</a>
                          <?php else: ?>
                          <a class="btn bg-blue pull-right" href="<?php echo site_url('course/enroll/'.$course->id_course) ?>"><i class="fa fa-user-plus">&nbsp;</i> JOIN</a>
                          <?php endif ?>
                        <?php endif ?>
                      <?php endif ?>
                    <?php endif ?>
                  <?php else: ?>
                    <a class="btn bg-red pull-right disabled" ><i class="fa fa-user-plus">&nbsp;</i>Closed</a>
                  <?php endif ?>
                </div>
                <div class="box-body">
                  <span class="label bg-blue "><?php echo $course->scope_name ?></span>
                </div>
                <div class="box-footer no-border text-black">
                  <?php if ($this->session->userdata('uid') == $course->id_user && $course->status): ?>
                      <a class="btn bg-red pull-right" href="<?php echo site_url('course/close_course/'.$course->id_course) ?>" >Create Summary</a>
                  <?php endif ?>
                  <p class="text-black"><?php echo $course->description ?></p>
                  <div class="row">
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-map-marker"></i>&nbsp; <?php echo $course->location ?>
                    </div>
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-calendar"> </i>&nbsp; <?php echo $course->datetime ?>
                      <i class="fa fa-calendar"> </i>&nbsp; <?php echo $course->enddate ?>
                    </div>
                    <div class="col-xs-3 text-center border-right text-black">
                      <canvas class="canvas-course"></canvas>
                      <i class="fa fa-users"></i>&nbsp; <strong><?php echo $course->count ?></strong>/<?php echo $course->quota ?>
                    </div>
                    <div class="col-xs-3 text-center">
                      <canvas class="canvas-course"></canvas>
                      <i class="text-black fa fa-male"></i>
                      &nbsp; <a href="<?php echo site_url('profile/'.$course->id_user) ?>"><?php echo $course->fullname ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>



  </div>
</div>