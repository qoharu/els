<?php include "header.php" ?>


<div class="container">
	<div class="row">
	
	<div class="col-md-9 isi-dash">
		<div class="col-lg-8 col-lg-offset-2 panel">
			<div class="panel-heading">
				<h4>Selamat <?php echo greet() ?>, <strong><?php echo $this->session->userdata('fullname'); ?></strong></h4>
			</div>
		</div>
		<?php 
			if (iskaryawan()) {
				$kelas = 'col-lg-8';
			}else{
				$kelas = 'col-lg-4';
			}
		?>
	    <div class="<?php echo $kelas ?> col-lg-offset-2">
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
	    
	    <?php if (!iskaryawan()): ?>
	    <div class="col-lg-4">
			<!-- small box -->
	        <a class="btn btn-flat small-box btn-success" href="<?php echo site_url('cop') ?>">
	        <div class="inner">
	        	<i class="fa fa-commenting-o coba"></i>
	        </div>
	        <div class="small-box-footer">
	            COP <?= @$keterangan ?>
	        </div>
	        </a>
	    </div>
	    <?php endif ?>
	    <div class="col-lg-4 col-lg-offset-2">
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

	    <div class="col-lg-4">
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

	<div class="col-md-3 panel isi-dash">
		<div class="panel-heading">
			<h3 class="text-center">List BE</h3>
		</div>
		<div class="panel-body">
			<?php foreach ($be as $data): ?>
				<a href="<?php echo site_url('account/user/'.$data->id_user) ?>"><?php echo $data->fullname ?></a> <br>
			<?php endforeach ?>
		</div>
	</div>
	</div>
</div>
