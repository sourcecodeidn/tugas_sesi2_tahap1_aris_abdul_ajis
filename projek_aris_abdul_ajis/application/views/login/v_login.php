<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<link rel="icon" href="<?= base_url() ?>public/media/upload-pengaturan/logoatas.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>public/template/assets/css/style.css">
</head>
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<form action="<?= base_url() ?>login" method="post">
							<h3  class="text-center">LOGIN  <br> POLIKLINIK</h3>
							<hr>
							<!-- <h4 class="mb-3 f-w-400">Signin</h4> -->
							<?php
							echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
							if ($this->session->flashdata('danger')) {
								echo '<div class="alert alert-danger alert-slide-up">';
								echo $this->session->flashdata('danger');
								echo '</div>';
							}

							if ($this->session->flashdata('sukses')) {
								echo '<div class="alert alert-success alert-slide-up">';
								echo $this->session->flashdata('sukses');
								echo '</div>';
							}
							?>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-user"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="username" required>
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<button class="btn btn-block btn-primary mb-4">Signin</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>public/template/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/waves.min.js"></script>
<script type="text/javascript">
  $(".alert-slide-up").alert().delay(3000).slideUp('slow');
</script>
</body>

</html>