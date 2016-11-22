<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard Login</title>
		<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" rel="stylesheet"> 
		<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	</head>
	<body class="cover">
		<div class="page-header no-line-header">
		</div>
		<div class="container">
			<div class="row">
				<!-- start col login -->
				<div class="col-sm-offset-4 col-sm-4">
					<div class="panel panel-default panel-no-background">
						<div class="panel-heading text-center">
							<img src="<?php echo base_url('assets/img/logo_himakom.png'); ?>" style="max-width: 60%;">
						</div>
						<div class="panel-body">
							<?php if (isset($error)) :?>
								<div class="alert alert-dismissible alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
								 	<?php echo $error; ?>
								</div>
							<?php endif; ?>
							<form class="form-horizontal" action="<?php echo site_url('site/login')?>" method="POST">
								<div class="form-group">
									
									<div class="col-sm-12">
										<input type="text" class="form-control input-lg login-input" name="username" id="inputUsername" 
											placeholder="Masukkan username" required autofocus>
									</div>
								</div>
								<div class="form-group">
									
									<div class="col-sm-12">
										<input type="password" class="form-control input-lg login-input" name="password" id="inputPassword" 
											placeholder="Masukkan password" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-primary btn-block">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- end col login -->
			</div><!-- end row -->
				
		</div>
	</body>
</html>
