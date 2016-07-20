<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/crud.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Dashboard <small>Data Anggota Himakom</small></h1>
		</div>

		<div class="btn-group">
			<a href="<?php echo site_url('anggota/edit_profile');?>" class="button btn btn-default">Ubah Data Pribadi</a>
			<a href="<?php echo site_url('anggota/change_password');?>" class="button btn btn-default">Ganti Password</a>
			<a href="<?php echo site_url('anggota/add_contact');?>" class="button btn btn-default">Tambah Kontak</a>
			<a href="#" class="button btn btn-default">Tambah Riwayat Pendidikan</a>
			<a href="#" class="button btn btn-default">Lihat Kegiatan</a>
			<a href="<?php echo site_url('anggota/logout') ;?>" class="button btn btn-default">Logout</a>
		</div>

		<hr>

		<!--Start Row -->
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Data Pribadi</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<th>Nama Lengkap</th>
								<td><?php echo $anggota->NAMA_LENGKAP ;?></td>
							</tr>
							<tr>
								<th>Nama Panggilan</th>
								<td><?php echo $anggota->NAMA_PANGGILAN ;?></td>
							</tr>
							<tr>
								<th>Nama Bagus</th>
								<td><?php echo $anggota->NAMA_BAGUS ;?></td>
							</tr>
							<tr>
								<th>NIM</th>
								<td><?php echo $anggota->NIM ;?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td><?php echo $anggota->NAMA_KELAS." ".$anggota->ID_PS ;?></td>
							</tr>
							<tr>
								<th>Tempat Lahir</th>
								<td><?php echo $anggota->TEMPAT_LAHIR ;?></td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td><?php echo $anggota->TANGGAL_LAHIR ;?></td>
							</tr>
							<tr>
								<th>Alamat Asal</th>
								<td><?php echo $anggota->ALAMAT_ASAL ;?></td>
							</tr>
							<tr>
								<th>Alamat Sekarang</th>
								<td><?php echo $anggota->ALAMAT_SEKARANG ;?></td>
							</tr>

						</table>
					</div>
				</div> <!--End Panel data pribadi -->
			</div> <!-- End Col Data Pribadi -->
			
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Kontak</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Jenis Kontak</th>
									<th>Kontak</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									
								</tr>
							</tbody>
						</table>
					</div>
				</div> <!--End Panel Kontak -->
			</div> <!-- End Col Kontak -->
		</div> <!-- End Row -->
		
	</div>

	
</body>
</html>