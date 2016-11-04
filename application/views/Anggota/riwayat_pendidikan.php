<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$icon = ['D' => "bg-secondary", 'P' => "bg-info", 'A' => "bg-primary", 'T' => "bg-deafult"];
$left = false;
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/timeline.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
		</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<?php $this->view('anggota/profile'); ?> <!-- Profile Page on Left Col-->
					<div class="col-md-9">
						<div class="row">
							<ul class="nav nav-tabs">
								<li><a href="<?php echo site_url('anggota/index') ;?>">Overview</a></li>
							  	<li class="active"><a href="<?php echo site_url('anggota/riwayat_pendidikan') ;?>">Pendidikan</a></li>
							  	<li ><a href="<?php echo site_url('anggota/riwayat_organisasi') ;?>">Organisasi</a></li>
							  	<li ><a href="<?php echo site_url('anggota/riwayat_prestasi') ;?>">Prestasi</a></li>
							  	<li ><a href="<?php echo site_url('anggota/riwayat_kepanitiaan') ;?>">Kepanitiaan</a></li>
							  	<li ><a href="<?php echo site_url('anggota/riwayat_pelatihan') ;?>">Pelatihan</a></li>
							  	<li ><a href="<?php echo site_url('anggota/riwayat_pkm') ;?>">PKM</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-md-12">
								<!--Timeline-->
								<h3><small>Riwayat Pendidikan</small></h3>
								<div class="timeline-centered">
									<?php foreach ($riwayat_pendidikan as $row) : ?>
										<?php if ($left) :?> <article class="timeline-entry left-aligned">
										<?php else :?> <article class="timeline-entry">
										<?php endif ; $left = !$left ; ?>
											<div class="timeline-entry-inner">
												<time class="timeline-time" datetime="2014-01-10T03:45"><strong><?php echo $row->TAHUN_MASUK_PENDIDIKAN;?></strong></time>
												<div class="timeline-icon <?php echo $icon[$row->JENJANG_PENDIDIKAN];?>">
													<i class="entypo-feather"></i>
												</div>
												<div class="timeline-label">
													<h2><?php echo $row->NAMA_INSTITUSI_PENDIDIKAN ;?></h2>
													<p><?php echo $row->BIDANG_PENDIDIKAN ;?></p>
												</div>
											</div>
										</article>
									<?php endforeach ;?>

									<article class="timeline-entry begin">		
										<div class="timeline-entry-inner">
											<div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
												<i class="entypo-flight"></i>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer>
					<hr> <p class="text-center">&copy; 2016 Himpunan Mahasiswa Komputer Politeknik Negeri Bandung</p>
				</footer>
			</div>	
		</div>		
	</div>
</body>
</html>