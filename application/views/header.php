<?php 
	$name = @$this->session->userdata('fullname');
	$uid = @$this->session->userdata('uid');
	$islogin = @$this->session->userdata('islogin');
  $notif = getnotif();
  $count = count($notif);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/select2.min.css') ?>">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css') ?>">
		<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/skins/skin-black-light.css') ?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/mini.ico') ?>">
		<script src="<?= base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="full hold-transition skin-black-light fixed">
		
		<header class="main-header">
        <a href="<?php echo site_url('') ?>" class="logo">
        	<img class="logo-exp" src="<?php echo base_url('assets/img/Experta-Logo.png') ?>">
          <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
      
<?php if ($this->session->userdata('islogin')): ?>
	
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-danger"><?php echo $count ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="menu">
                      <li>
                      <?php foreach ($notif as $data): ?>
                        <a href="<?php echo $data->link ?>">
                          <i class="<?php echo kelasnotif($data->type) ?>"></i><?php echo $data->title ?>
                        </a>
                      <?php endforeach ?>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="<?php echo site_url('home/notification') ?>">View all</a></li>
                </ul>
              </li>

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('uploads/profile/'.$this->session->userdata('pic')) ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('fullname'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url('uploads/profile/'.$this->session->userdata('pic')) ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('fullname').' - '.strtoupper($this->session->userdata('level'))  ?>
                    </p>
                  </li>

                  <li class="user-footer">
                  <?php if (isbe()): ?>
                    
                    <div class="pull-left">
                      <a href="<?php echo site_url('account/user/'.$this->session->userdata('uid')); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                  <?php endif ?>
                    <div class="pull-right">
                      <a href="<?php echo site_url('account/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
<?php endif ?>
        </nav>
      </header>

            <div class="modal example-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p id="modal-content">One fine body…</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-flat pull-right modal-close" data-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div>