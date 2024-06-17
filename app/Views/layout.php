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

		<footer class="text-end">
			BY <a href="https://www.linkedin.com/in/gibr%C3%A1n-v%C3%A1zquez-49b476ba/" target="_blank">Gibrán Vázquez</a>
		</footer>

		<!-- Alert Modal -->
		<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="alertModalTitle">Modal title</h5>
		        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="alertModalContent">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
		      </div>
		    </div>
		  </div>
		</div>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>

<script type="text/javascript">
</script>
	<?php echo $this->renderSection('scripts'); ?>
</html>