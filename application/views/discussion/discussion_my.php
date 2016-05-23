<?php include '/application/views/header.php' ?>

<div class="container">
	<div class="row isi">
			<div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Tugas Diskusi</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                <?php $i=0; ?>
		                    <?php foreach ($todo as $data): ?>
		                    	<?php $i++; ?>
		                        <li>
			                        <a href="<?php echo site_url('discussion/create_discussion/'.$data->id_step) ?>">
			                        <?php echo $data->keterangan ?>
			                        <span class="pull-right badge bg-blue"><?php echo $data->scope_name ?></span></a>
		                        </li>
		                    <?php endforeach ?>
		                    <?php if (!$i): ?>
		                    	<li>
		                    		<a href="#">Tidak ada</a>
		                    	</li>
		                    <?php endif ?>
		                </ul>
		            </div>
		        </div>
		    </div>

		    <div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Diskusi Saya</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                <?php $i=0; ?>
		                    <?php foreach ($list as $data): ?>
		                    	<?php
		                    		$i++;
		                    		$status = switchstatus($data->status);
		                    		$kelas = $status['class'];
		                    		$judul = $status['title'];
		                    	?>
		                        <li>
			                        <a href="<?php echo site_url('discussion/view_discussion/'.$data->id_discussion) ?>">
			                        <?php echo $data->title ?>
			                        <span class="pull-right badge <?php echo $kelas ?>"><?php echo $judul ?></span></a>
		                        </li>
		                    <?php endforeach ?>
		                    <?php if (!$i): ?>
		                    	<li>
		                    		<a href="#">Tidak ada</a>
		                    	</li>
		                    <?php endif ?>
		                </ul>
		            </div>
		        </div>
		    </div>


	</div>
</div>