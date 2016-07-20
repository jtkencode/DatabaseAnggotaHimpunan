<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Dashboard <small>Data Anggota Himakom</small></h1>
		</div>

		<div class="btn-group">
			<a href="<?php echo site_url('anggota/edit_profile');?>" class="button btn btn-default">Ubah Data Pribadi</a>
			<a href="<?php echo site_url('anggota/change_password');?>" class="button btn btn-default">Ganti Password</a>
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
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="30%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>NIM</td>
									<td><strong><?php echo $anggota->NIM ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td><strong><?php echo $anggota->NAMA_LENGKAP ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Panggilan</td>
									<td><strong><?php echo $anggota->NAMA_PANGGILAN ;?></strong></td>
								</tr>
								<tr>
									<td>Nama Bagus</td>
									<td><strong><?php echo $anggota->NAMA_BAGUS ;?></strong></td>
								</tr>
								
								<tr>
									<td>Kelas</td>
									<td><strong><?php echo $anggota->NAMA_KELAS." ".$anggota->ID_PS ;?></strong></td>
								</tr>
								<tr>
									<td>Tempat, Tanggal Lahir</td>
									<td><strong><?php echo $anggota->TEMPAT_LAHIR.", ".date_format(date_create($anggota->TANGGAL_LAHIR), 'd F Y') ;?></strong></td>

								</tr>
								
								<tr>
									<td>Alamat Asal</td>
									<td><strong><?php echo $anggota->ALAMAT_ASAL ;?></strong></td>
								</tr>
								<tr>
									<td>Alamat Sekarang</td>
									<td><strong><?php echo $anggota->ALAMAT_SEKARANG ;?></strong></td>
								</tr>	
							</tbody>
						</table>
						<button class="btn btn-default">Ubah Data Pribadi</button>
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
									<th class="text-center">Detil Kontak</th>
								</tr>
							</thead>
							<tbody id="tableBodyKontak">
							<?php foreach ($kontak as $row) : ?>
								<tr>
									<td><?=$row->DETIL_KONTAK?></td>
								</tr>
							<?php endforeach ;?>								
							</tbody>
						</table>
						<button type="button" class="btn btn-default" id="btnAddContact">Tambah Kontak</button>
					</div>
				</div> <!--End Panel Kontak -->
			</div> <!-- End Col Kontak -->
			
		</div> <!-- End Row -->
		
	</div>

	<?php $this->load->view('Anggota/modals.html'); ?>
	
</body>
</html>