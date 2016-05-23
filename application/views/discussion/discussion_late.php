<?php include '/application/views/header.php' ?>
<div class="pull-right col-md-2 isi">
        <a class="btn btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
    </div>
    
<div class="col-md-12 isi-dash">
	<div class="col-md-4 col-md-offset-4 well">
		<h3>Selamat berbahagia, <?= $this->session->userdata('fullname')  ?> </h3>
	</div>
</div>