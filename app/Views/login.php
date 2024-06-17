<?php echo $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="container" id="login-container">
	<ul class="nav nav-tabs" id="loginTab" role="tablist">
	  	<li class="nav-item" role="presentation">
	    	<button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Log in</button>
	  	</li>
	  	<li class="nav-item" role="presentation">
	    	<button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
	  	</li>
	</ul>
	<div class="tab-content" id="loginTabContent">
	  	<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
	  		<div class="errorMsg">
	  		<?php
	  		if(isset($error)){
	  			echo $error;
	  		}
	  		?>
	  		</div>
	  		<form method="POST" action="login/validate_user">
				<input type="text" name="username" id="username" class="form-control" placeholder="Username">
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">

				<button id="logBtn" class="form-control btn btn-success" type="submit">Log in</button>
			</form>
	  	</div>
	  	<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
			<input type="text" id="username_reg" class="form-control" placeholder="Username">
			<input type="password" id="password_reg" class="form-control" placeholder="Password">

			<button id="regBtn" class="form-control btn btn-primary">Register</button>
	  		
	  	</div>
	</div>
</div>
<?php echo $this->endSection(); ?>

<?php $this->section('scripts'); ?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/login.js'); ?>"></script>
<?php echo $this->endSection(); ?>