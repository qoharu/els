<?php include 'application/views/header.php' ?>
<div class="pull-right col-md-3 isi">
        <a href="http://localhost/els/discussion/discussion_archive" title="Archive" class="btn btn-flat btn-lg bg-navy"><span class="fa fa-file-archive-o"></span> &nbsp;Archive</a>

        <a class="btn btn-flat btn-lg btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
    </div>
    
<div class="col-md-12 isi-dash">
	<div class="col-md-4 col-md-offset-4 well">
		<h3>Selamat berbahagia, <?= $this->session->userdata('fullname')  ?> </h3>
	</div>
</div>