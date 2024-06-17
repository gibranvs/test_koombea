<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Koombea TEST</title>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
		
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/koombea.css'); ?>" />
	</head>
	<body>
		<header>
			<img src="<?php echo base_url('public/assets/img/logo_koombea.png'); ?>">
		</header>
		<main>
			<?php echo $this->renderSection('content'); ?>
		</main>
		<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.7.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public/assets/js/home.js'); ?>"></script>

		
	</body>
</html>