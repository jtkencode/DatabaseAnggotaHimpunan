	<!-- Navbar-->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url('anggota/dashboard');?>"><img src="<?php echo base_url('assets/img/logo_himakom.png'); ?>" style="width:30px;"></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('anggota/profile');?>">Profile <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Kegiatan</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $nama_anggota;?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo site_url('site/logout');?>">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">