<?php include 'header.php'; ?>

<div class="container">
	<div class="row isi">
			<div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Tugas Diskusi</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                    <?php foreach ($todo as $data): ?>
		                        <li>
			                        <a href="<?php echo site_url('discussion/new_discussion/'.$data->id_step) ?>">
			                        <?php echo $data->keterangan ?>
			                        <span class="pull-right badge bg-blue"><?php echo $data->scope_name ?></span></a>
		                        </li>
		                    <?php endforeach ?>
		                </ul>
		            </div>
		        </div><!-- /.widget-user -->
		    </div>


	</div>
</div>