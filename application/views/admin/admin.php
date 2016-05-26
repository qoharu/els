<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">

<section class="content col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Summary</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
	              <div class="small-box bg-aqua">
	                <div class="inner">
	                  <h3><?php echo $summary->user ?></h3>
	                  <p>User Registered</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-users"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
	              </div>

	              <div class="col-md-4">
	              <div class="small-box bg-red">
	                <div class="inner">
	                  <h3><?php echo $summary->journal ?></h3>
	                  <p>Journal Published</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-book"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
                </div>

                <div class="col-md-4">
	              <div class="small-box bg-blue">
	                <div class="inner">
	                  <h3><?php echo $summary->course ?></h3>
	                  <p>Course</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-pencil"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
                </div>

                <div class="col-md-4">
	              <div class="small-box bg-teal">
	                <div class="inner">
	                  <h3><?php echo $summary->discussion ?></h3>
	                  <p>Group Discussion</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-comments"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
                </div>

                <div class="col-md-4">
	              <div class="small-box bg-green">
	                <div class="inner">
	                  <h3><?php echo $summary->innovation ?></h3>
	                  <p>Innovation</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-lightbulb-o"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
                </div>

                <div class="col-md-4">
	              <div class="small-box bg-orange">
	                <div class="inner">
	                  <h3><?php echo $summary->best_practice ?></h3>
	                  <p>Best Practice</p>
	                </div>
	                <div class="icon">
	                  <i class="fa fa-commenting-o"></i>
	                </div>
	                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	              </div>
                </div>

	            </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section>
	</div>