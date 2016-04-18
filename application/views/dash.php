<?php include "header.php" ?>


<div class="container">
	<div class="row">
	
	<div class="col-md-12 isi-dash">
		<div class="col-lg-6 col-lg-offset-3 panel">
			<div class="panel-heading">
				<h4>Selamat datang, <strong><?php echo $this->session->userdata('fullname'); ?></strong></h4>
			</div>
		</div>	
	    <div class="col-lg-3 col-lg-offset-3">
			<!-- small box -->
	        <a class="btn btn-flat small-box bg-primary" href="<?php echo site_url('discussion') ?>">
	        <div class="inner">
	        	<i class="fa fa-comments coba"></i>
	        </div>
	        <div class="small-box-footer">
	        Group Discussion 
	        </div>
	        </a>
	    </div>
	    <?php 
	    	if ($this->session->userdata('level_name') == 'karyawan') {
	    		$class = 'disabled';
	    		$keterangan = '(Hanya BE)';
	    	}
	    ?>
	    <div class="col-lg-3">
			<!-- small box -->
	        <a class="btn btn-flat small-box btn-success <?php echo @$class ?>" href="<?php echo site_url('cop') ?>">
	        <div class="inner">
	        	<i class="fa fa-commenting-o coba"></i>
	        </div>
	        <div class="small-box-footer">
	            COP <?php echo @$keterangan ?>
	        </div>
	        </a>
	    </div>
	    <div class="col-lg-3 col-lg-offset-3">
			<!-- small box -->
	        <a class="btn btn-flat small-box btn-info" href="<?php echo site_url('journal') ?>">
	        <div class="inner">
	        	<i class="fa fa-book coba"></i>
	        </div>
	        <div class="small-box-footer">
	            Journal
	        </div>
	        </a>
	    </div>

	    <div class="col-lg-3">
			<!-- small box -->
	        <a class="btn btn-flat small-box btn-danger" href="<?php echo site_url('course') ?>">
	        <div class="inner">
	        	<i class="fa  fa-pencil coba"></i>
	        </div>
	        <div class="small-box-footer">
	            Course
	        </div>
	        </a>
	    </div>

	</div>
	</div>
</div>
