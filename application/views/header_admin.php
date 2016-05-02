<?php 
	$name = @$this->session->userdata('fullname');
	$uid = @$this->session->userdata('uid');
	$islogin = @$this->session->userdata('islogin');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<meta charset="utf-8">
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/skins/skin-black-light.min.css') ?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/mini.ico') ?>">
		<script src="<?= base_url('assets/js/jquery-1.12.1.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/jquery.main.js') ?>" type="text/javascript"></script>
	</head>