<?php include 'application/views/header.php' ?>

<div class="container">
	<div class="row isi">
			<div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Innovation</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                	<?php $i = 0 ?>
		                    <?php foreach ($innov as $data): ?>
		                    	<?php
		                    		$i++;
		                    		$link = site_url('cop/innovation_view/'.$data->id_cop);
		                    	?>
		                        <li>
			                        <a href="<?php echo $link ?>">
				                        <?php echo $data->title ?>
				                        <small> (<?php echo $data->created_at ?>)</small>
			                        <?php if ($data->status == 1): ?>
				                        <span class="badge bg-blue pull-right">Open</span>
			                        <?php else: ?>
				                        <span class="badge bg-red pull-right">Closed</span>
				                    <?php endif ?>
			                        </a>
		                        </li>
		                    <?php endforeach ?>
		                    <?php if (!$i): ?>
		                    	<li>
		                    		<a href="">Tidak ada</a>
		                    	</li>
		                    <?php endif ?>
		                </ul>
		            </div>
		        </div>
		    </div>

		    <div class="col-md-12">
		    	<div class="box box-widget widget-user-2">
		        	<div class="widget-user-header bg-blue">
		                <h4>Best Practice</h4>
		            </div>
		            <div class="box-footer no-padding">
		                <ul class="nav nav-stacked">
		                	<?php $i = 0 ?>
		                    <?php foreach ($bp as $data): ?>
		                    	<?php
		                    		$i++;
		                    		$link = site_url('cop/bp_view/'.$data->id_cop);
		                    	?>
		                        <li>
			                        <a href="<?php echo $link ?>">
				                        <?php echo $data->title ?>
				                        <small> (<?php echo $data->created_at ?>)</small>
			                        <?php if ($data->status == 1): ?>
				                        <span class="badge bg-blue pull-right">Open</span>
			                        <?php else: ?>
				                        <span class="badge bg-red pull-right">Closed</span>
				                    <?php endif ?>
			                        </a>
		                        </li>
		                    <?php endforeach ?>
		                    <?php if (!$i): ?>
		                    	<li>
		                    		<a href="">Tidak ada</a>
		                    	</li>
		                    <?php endif ?>
		                </ul>
		            </div>
		        </div>
		    </div>
	</div>
</div>