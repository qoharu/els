<?php include 'header.php'; ?>
    <div class="pull-right col-md-2 isi">
        <a class="btn btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
    </div>
    
    <center>
        <h2 class="panel col-md-2 col-md-offset-5 isi-dash">Vote Topic</h2>
    </center>
<div class="col-md-12 isi">
	<div class="col-md-3">
    	<div class="box box-widget widget-user-2">
        	<div class="widget-user-header bg-blue">
                <h4>Ecommerce</h4>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($ec as $data): ?>
                        <li><a href="#"><?php echo $data->title ?> <span class="pull-right badge bg-blue">$data->vote</span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div><!-- /.widget-user -->
    </div>
	
	<div class="col-md-3">
    	<div class="box box-widget widget-user-2">
        	<div class="widget-user-header bg-blue">
                <h4>Enterprise Management</h4>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($em as $data): ?>
                        <li><a href="#"><?php echo $data->title ?> <span class="pull-right badge bg-blue">$data->vote</span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div><!-- /.widget-user -->
    </div>

    <div class="col-md-3">
    	<div class="box box-widget widget-user-2">
        	<div class="widget-user-header bg-blue">
                <h4>Strategic Planning and Business</h4>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($spb as $data): ?>
                        <li><a href="#"><?php echo $data->title ?> <span class="pull-right badge bg-blue">$data->vote</span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div><!-- /.widget-user -->
    </div>

    <div class="col-md-3">
    	<div class="box box-widget widget-user-2">
        	<div class="widget-user-header bg-blue">
                <h4>ICT</h4>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($ict as $data): ?>
                        <li><a href="#"><?php echo $data->title ?> <span class="pull-right badge bg-blue">$data->vote</span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div><!-- /.widget-user -->
    </div>

</div>