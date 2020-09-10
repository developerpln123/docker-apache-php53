<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="<?=base_url()?>public/images/house-icon-1.png" />
		<title><?=$title?></title>
		<style type="text/css" title="currentStyle">
			@import "<?=base_url()?>public/media/css/pages.css";		
		</style>
		<script type="text/javascript"  src="<?=base_url()?>public/media/js/jquery.js"></script>
		<script type="text/javascript"  src="<?=base_url()?>public/media/js/jquery.dataTables.js"></script>
		
	</head>
	<body id="dt_example">
		<div id="container">
			<div id="header"></div>	
			<div id="menu" >
				<?
						$this->load->view('menu_admin');
				?>
			</div>
			<div id="demo">
			<h1><?=$title?></h1>
			<? $this->load->view($isi); ?>
			
				<div id="footer" class="clear" style="text-align:left;">
				
					Copyright @ 2012 - PT. PLN (Persero) Distribusi Jakarta &amp; Tangerang. All Rights Reserved.<br>
					Contact Person: taurisa.wijaya@pln.co.id
			</div>
			</div>
		</div>
	</body>
</html>