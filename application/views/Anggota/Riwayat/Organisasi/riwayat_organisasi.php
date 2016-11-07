<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
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
							  <li ><a href="<?php echo site_url('anggota/index') ;?>">Overview</a></li>
							  <li><a href="<?php echo site_url('anggota/riwayat_pendidikan') ;?>">Pendidikan</a></li>
							  <li class="active"><a href="<?php echo site_url('anggota/riwayat_organisasi') ;?>">Organisasi</a></li>
							  <li ><a href="<?php echo site_url('anggota/riwayat_prestasi') ;?>">Prestasi</a></li>
							  <li ><a href="<?php echo site_url('anggota/riwayat_kepanitiaan') ;?>">Kepanitiaan</a></li>
							  <li ><a href="<?php echo site_url('anggota/riwayat_pelatihan') ;?>">Pelatihan</a></li>
							  <li ><a href="<?php echo site_url('anggota/riwayat_pkm') ;?>">PKM</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Riwayat Organisasi</small></h3>
							</div>
						</div>
						<div class="row">
							<?php foreach ($riwayat_org as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->NAMA_ORG;?><br><small><?php echo $row->JABATAN_ORG;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->TAHUN_MULAI_ORG.'-'.$row->TAHUN_SELESAI_ORG;?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>
							
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