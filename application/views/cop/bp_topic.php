<?php include '/application/views/header.php' ?>
<div class="container">
	<div class="row isi well">
		<div class="box box-widget widget-user-2">
        	<div class="widget-user-header bg-blue">
                <h4>Ecommerce</h4>
            </div>
            <div class="no-padding">
                <ul class="nav nav-stacked">
                	<?php foreach ($ec as $ece): ?>
                    	<li>
                    		<a href="<?php echo site_url('cop/bp_view/'.$ece->id_cop) ?>">
                    			<?php echo $ece->keterangan ?> <span class="pull-right badge bg-red"><?php echo $ece->fullname ?></span>
                    		</a>
                    	</li>
                	<?php endforeach ?>
                </ul>
            </div>
            <div class="widget-user-header2 bg-green">
                <h4>Enterprise Management</h4>
            </div>
            <div class="no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($em as $ece): ?>
                    	<li>
                    		<a href="<?php echo site_url('cop/bp_view/'.$ece->id_cop) ?>">
                    			<?php echo $ece->keterangan ?> <span class="pull-right badge bg-red"><?php echo $ece->fullname ?></span>
                    		</a>
                    	</li>
                	<?php endforeach ?>
                </ul>
            </div>
            <div class="widget-user-header2 bg-yellow">
                <h4>Strategic Planning & Business</h4>
            </div>
            <div class="no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($spb as $ece): ?>
                    	<li>
                    		<a href="<?php echo site_url('cop/bp_view/'.$ece->id_cop) ?>">
                    			<?php echo $ece->keterangan ?> <span class="pull-right badge bg-red"><?php echo $ece->fullname ?></span>
                    		</a>
                    	</li>
                	<?php endforeach ?>
                </ul>
            </div>
            <div class="widget-user-header2 bg-red">
                <h4>Information Communication Technology</h4>
            </div>
            <div class="no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($ict as $ece): ?>
                    	<li>
                    		<a href="<?php echo site_url('cop/bp_view/'.$ece->id_cop) ?>">
                    			<?php echo $ece->keterangan ?> <span class="pull-right badge bg-red"><?php echo $ece->fullname ?></span>
                    		</a>
                    	</li>
                	<?php endforeach ?>
                </ul>
            </div>
        </div>
	</div>
</div>