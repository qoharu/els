<?php include 'header.php'; ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap3-wysihtml5.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<div class="container">
	<div class="row">
	<div class="col-md-12 isi">
		
	<div class="col-md-12 box box-primary well">
		<div class="box-header">
		<a href="">Discussion</a> > <a href=""><small>Kenapa cacing tanah hidupnya di tanah</small></a> > <a href="">Page 1</a>
		</div>
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-red">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $thread[0]->fullname; ?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5><?= $thread[0]->expert_name; ?></h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-red">
							<small class="pull-right"><?= $thread[0]->created_at; ?></small>
							<h4><?= $thread[0]->title; ?></h4>
					</div>
					<div class="box-footer content-forum">
						<?= $thread[0]->content; ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-md-12  box box-primary well">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $this->session->userdata('fullname')?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5>Business expert di bidang ini dan itu</h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right">Sun, 17 Apr 2016 19:36:28</small>
							<h4>Kenapa cacing tanah hidupnya di tanah</h4>
					</div>
					<div class="box-footer content-forum">
						<p>Cacing tanah adalah cacing berbentuk tabung dan tersegmentasi dalam filum Annelida. Mereka umumnya ditemukan hidup di tanah, memakan bahan organik hidup dan mati. Sistem pencernaan berjalan melalui panjang tubuhnya. Cacing tanah melakukan respirasi melalui kulitnya. Cacing tanah memiliki sistem transportasi ganda terdiri dari cairan selom yang bergerak dalam selom yang berisi cairan dan sistem peredaran darah tertutup sederhana. Memiliki sistem saraf pusat dan perifer. Sistem saraf pusat terdiri dari dua ganglia atas mulut, satu di kedua sisi, terhubung ke tali saraf berlari kembali sepanjang panjangnya ke neuron motor dan sel-sel sensorik di setiap segmen. Sejumlah besar kemoreseptor terkonsentrasi di dekat mulutnya. Otot melingkar dan longitudinal di pinggiran setiap segmen memungkinkan cacing untuk bergerak. Set yang sama otot garis usus, dan tindakan mereka memindahkan makanan mencerna menuju anus cacing.[2]</p>
						<p>Cacing tanah adalah hermafrodit - masing-masing individu membawa kedua organ seks pria dan wanita. Mereka tidak memiliki kerangka internal atau eksoskeleton, tapi mempertahankan struktur mereka dengan ruang coelom cairan yang berfungsi sebagai rangka hidrostatik.</p>
						<p>"Cacing tanah" adalah nama umum untuk anggota terbesar dari Oligochaeta (yang merupakan kelas atau upakelas tergantung pada penulis). Dalam sistem klasik, mereka ditempatkan dalam ordo Opisthopora, atas dasar pori-pori jantan membuka posterior ke pori-pori betina, meskipun segmen jantan internal anterior ke betina. Studi kladistik teoritis telah menempatkan mereka, sebaliknya, dalam subordo Lumbricina dari ordo Haplotaxida, tapi ini mungkin lagi segera berubah.</p>
						<p>Cacing tanah darat yang lebih besar juga disebut megadriles (atau cacing besar), yang bertentangan dengan microdriles (atau cacing kecil) di familia semiakuatik Tubificidae, Lumbriculidae, dan Enchytraeidae, antara lain. Megadriles ditandai dengan memiliki klitelum yang berbeda (yang lebih luas daripada microdriles) dan sistem vaskular dengan kapiler benar.</p>
						<p>Cacing tanah jauh lebih melimpah di lingkungan terganggu dan biasanya aktif hanya jika air hadir</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<div class="btn-group pull-right">
                          <button type="button" class="btn btn-default btn">1</button>
                          <button type="button" class="btn btn-default">2</button>
                        </div>
	<div class="col-md-12  box box-primary well isi">
		<div class="box-body well">
			<div class="col-md-3">
				<div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                  <div class="widget-user-image">
                    <img class="img-thumbnail" width="20" height="20" src="http://localhost/adminlte/dist/img/user7-128x128.jpg" alt="user image">
                  </div><!-- /.widget-user-image -->
                  <h4 class="widget-user-username">
                  	<a class="clearlink" href="<?= $this->session->userdata('uid')?>">
                  		<?= $this->session->userdata('fullname')?>
                  	</a>
                  </h4>
                </div>
                <div class="box-footer">
                  <h5>Business expert di bidang ini dan itu</h5>
                </div>
              </div><!-- /.widget-user -->
			</div>
			<div class="col-md-9">
				<form action="#" method="post">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-blue">
							<small class="pull-right">Sun, 17 Apr 2016 19:36:28</small>
							<div class="form-group">
		                      <input type="text" class="form-control" name="emailto" placeholder="Title">
		                    </div>
					</div>
					<div class="box-footer content-forum">
						<textarea class="textarea" placeholder="Description" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
					<button class="pull-right btn btn-primary">Submit</button>
				</div>
			</div>
			
		</div>
	</div>



	</div>
	</div>
	</div>

	<script type="text/javascript">
		$('.textarea').wysihtml5();
	</script>