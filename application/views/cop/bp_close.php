<?php include 'application/views/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>

<div class="container">
	<div class="row isi">
		<div class="col-md-8 col-md-offset-2 isi">
					<div class="box box-primary">
					<div class="box-header with-border">
						<span class="pull-right badge bg-blue"><?php echo $scope ?></span>
						<h3>Close forum for <?php echo $title ?></h3>
					</div>
					<div class="box-body">
						<form class="" action="<?php echo site_url('cop/bp_close_post/'.$id_cop.'/'.$id_scope); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<textarea name="summary" class="form-control input-md textarea" rows="12" maxlength="500" required="" placeholder="Kesimpulan"></textarea>	
							</div>
							<h3>Penanggung Jawab Diskusi (optional)</h3>

							<?php if (!$step): ?>
								Kuota diskusi untuk <?php echo $scope ?> sudah habis
							<?php else: ?>
								<?php for ($i=0; $i < $step; $i++):?>
									<div class="form-group">
										<select class="form-control invite-be" name="be[]">
											<option selected="" value="">Business Expert</option>
											<?php foreach ($be as $yo): ?>
												<option value="<?php echo $yo->id_user ?>"><?php echo $yo->fullname.' - '.$yo->directorate_name ?></option>
											<?php endforeach ?>
										</select>
										<input type="text" class="form-control" name="topic[]" placeholder="Topic">
									</div>
								<?php endfor ?>
							<?php endif ?>
							<input class="btn col-md-4 btn-primary btn-flat pull-right" type="submit">
						</form>
					</div>
				</div>
			</div>
	</div>
</div>


	<script type="text/javascript">
		$('.textarea').wysihtml5();
		$(".invite-be").select2({
			placeholder: "Business Expert"
		});
	</script>