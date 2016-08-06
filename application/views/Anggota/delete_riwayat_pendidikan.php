<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Delete Riwayat Pendidikan <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<strong>Apakah anda yakin akan menghapus data berikut ?</strong>
				<table class="table table-bordered">
					<thead>
						<th>Jenjang Pendidikan</th>
						<th>Nama Institusi</th>
						<th>Tahun Masuk - Tahun Lulus</th>
						<th>Bidang</th>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $riwayat_pendidikan->JENJANG_PENDIDIKAN; ?></td>
							<td><?php echo $riwayat_pendidikan->NAMA_INSTITUSI_PENDIDIKAN; ?></td>
							<td><?php echo $riwayat_pendidikan->TAHUN_MASUK_PENDIDIKAN." - ".$riwayat_pendidikan->TAHUN_LULUS_PENDIDIKAN; ?></td>
							<td><?php echo $riwayat_pendidikan->BIDANG_PENDIDIKAN; ?></td>
						</tr>
					</tbody>
				</table>
				
				<form method="post">
					<a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Batal</a>
					<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
				</form>
			</div>
		</div> <!-- End Row -->
		
	</div>

</body>
</html>