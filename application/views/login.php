<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard Login</title>
		<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
		<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1>Login Dashboard</h1>
			</div>
			<div class="row">
				<!-- start col login -->
				<div class="col-sm-offset-4 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Restricted area</h3>
						</div>
						<div class="panel-body">
							<?php if (isset($error)) echo $error ;?>
							<form class="form-horizontal" action="<?php echo site_url('login/authentication')?>" method="POST">
								<div class="form-group">
									<label for="inputUsername" class="col-sm-4 control-label">Username</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="username" id="inputUsername" 
											placeholder="Masukkan username" required autofocus>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-4 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" name="password" id="inputPassword" 
											placeholder="Masukkan password" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary">Login</button>
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
