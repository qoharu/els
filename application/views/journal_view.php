<?php include "header.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-md-9 isi ">
              <div class="panel">
                <div class="panel-heading bg-blue">
                	<span class="pull-right"><?php echo date('D, d M Y H:i:s',strtotime($journal[0]->created_at)) ?></span>
                	<h4><strong><?php echo $journal[0]->title ?></strong></h4>
					<span class="badge bg-green"><?php echo $journal[0]->directorate_name ?></span>
                </div>
                <div class="box-body">
                  <p><?php echo $journal[0]->description ?></p>


                  <div class="clearfix">
                    <iframe width="100%" height="600px" border="0" src="<?php echo base_url('pdfjs/web/viewer.html?file='.base_url('uploads/'.$journal[0]->file)) ?>"></iframe>
                  </div>
                  <a class="btn bg-blue col-md-2 col-md-offset-5" href="<?php echo base_url('uploads/'.$journal[0]->file) ?>"><i class="fa fa-download"></i>&nbsp; Download</a>

                  <span class="pull-right text-muted"><?php echo $journal[0]->views ?> views - 2 comments</span>
                </div>
                <div class="box-footer col-md-12 komentar-badan">
                  <form action="#" method="post">
                  	<div class="input-group send-comment">
                      <input type="text" class="form-control input-md" placeholder="Press enter to post comment">
                      <span class="input-group-btn">
                      	<button class="btn btn-flat bg-blue">Send</button>
                      </span>
                  	</div>
                  </form>
                    <div class="comment-text komentar box">
                      <span class="username">
                        <span class="text-muted pull-right">8:03 PM Today</span>
                        <strong>Maria Gonzales </strong><br>
                      </span>
                      It is a long established fact that a reader will be distracted
                      by the readable content of a page when looking at its layout. the coast of the Semantics, a large language ocean.
                    A small river named Duden flows by their place and supplies
                    it with the necessary regelialia. It is a paradisematic
                    country, in which roasted parts of sentences fly into
                    your mouth
                    </div><!-- /.comment-text -->
                  <div class="comment-text komentar box box-danger">
                      <span class="username">
                        <span class="text-muted pull-right">8:03 PM Today</span>
                        <small class="label bg-red">be</small>
                        <strong><a href=""> Maria Gonzales</a></strong><br>
                      </span><!-- /.username -->
                      It is a long established fact that a reader will be distracted
                      by the readable content of a page when looking at its layout. the coast of the Semantics, a large language ocean.
                    A small river named Duden flows by their place and supplies
                    it with the necessary regelialia. It is a paradisematic
                    country, in which roasted parts of sentences fly into
                    your mouth
                    </div>
                    <button class="btn btn-danger btn-block btn-flat" id="load-comment">Load more...</button>
                </div>
              </div>


			</div>
			<div class="col-md-3 isi">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-circle" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username">
                  	<a class="clearlink" href="<?php echo site_url('user/'.$journal[0]->id_user) ?>">
                  		<?php echo $journal[0]->fullname ?>
                  	</a>
                  </h3>
                  <h5 class="widget-user-desc"><?php echo $journal[0]->expert_name ?></h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Journal <span class="pull-right badge bg-blue">31</span></a></li>
                    <li><a href="#">Course <span class="pull-right badge bg-aqua">5</span></a></li>
                    <li><a href="#">Discussion <span class="pull-right badge bg-green">12</span></a></li>
                  </ul>
                </div>
              </div><!-- /.widget-user -->
            </div>
		</div>
	</div>