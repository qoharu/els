<?php include '/application/views/header.php' ?>

<div class="container">
	<div class="row isi">
	<?php if (isbe()): ?>
		
			<div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Course to Open</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                <?php $i=0; ?>
		                    <?php foreach ($todo as $data): ?>
		                    	<?php $i++; ?>
		                        <li>
			                        <a href="<?php echo site_url('course/create_course/'.$data->id_step) ?>">
			                        <?php echo $data->title ?>
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
		                <h4>My Course</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                <?php $i=0; ?>
		                    <?php foreach ($mycourse as $data): ?>
		                    	<?php
		                    		$i++;
		                    		$judul = ($data->status) ? 'Opened' : 'Closed' ;
		                    		$kelas = ($data->status) ? 'bg-green' : 'bg-red' ;
		                    	?>
		                        <li>
			                        <a href="<?php echo site_url('discussion/view_course/'.$data->id_course) ?>">
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
	<?php endif ?>

		    <div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Enrolled Course</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                <?php $i=0; ?>
		                    <?php foreach ($enrolled as $data): ?>
		                    	<?php
		                    		$i++;
		                    		$judul = ($data->status) ? 'Opened' : 'Closed' ;
		                    		$kelas = ($data->status) ? 'bg-green' : 'bg-red' ;
		                    	?>
		                        <li>
			                        <a href="<?php echo site_url('discussion/view_course/'.$data->id_course) ?>">
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