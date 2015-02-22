I am a web developer with BlueChief Social and have been for the last year and a half. I am based in Limerick and build cool responsive websites like this one.

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>GambleTron</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:title" content="Gambletron | Predicting the future" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo base_url(); ?>" />
		<meta property="og:image" content="<?php echo base_url('assets/img/portfolio/gt.png'); ?>" />

		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">	
		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-theme.min.css');?>">
		<link rel="stylesheet" href="<?=base_url('assets/js/vendor/jquery-ui-1.11.3/jquery-ui.css');?>">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?=base_url('assets/css/main.css');?>">
		<script src="<?=base_url('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');?>"></script>
	</head>
<body>
	
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
	
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url('gambletron');?>">GambleTron</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url('');?>">Mark</a></li>
<!--				<li><a href="<?php echo base_url('admin');?>">Admin</a></li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown active">
					<a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span id="selected-league" class="selected-league" data-id="PL">Premiership </span><b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a class="league-switched stay" id="PL" href="#">Premier League</a></li>
						<li><a class="league-switched stay" id="BL1" href="#">Bundesliga</a></li>
						<li><a class="league-switched stay" id="BL2" href="#">Bundesliga (D2)</a></li>
						<li><a class="league-switched stay" id="BL3" href="#">Bundesliga (D3)</a></li>
						<li><a class="league-switched stay" id="FL1" href="#">Ligue 1</a></li>
						<li><a class="league-switched stay" id="FL2" href="#">Ligue 2</a></li>
						<li><a class="league-switched stay" id="SA" href="#">Serie A</a></li>
						<li><a class="league-switched stay" id="PD" href="#">Primera Division</a></li>
						<li><a class="league-switched stay" id="SD" href="#">Segunda Division</a></li>
						<li><a class="league-switched stay" id="DED" href="#">Ehrendivision</a></li>
						<li><a class="league-switched stay" id="SB" href="#">Serie B</a></li>
						<li><a class="league-switched stay" id="CL" href="#">Champions League</a></li>
					</ul>
				</li>
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</nav>
