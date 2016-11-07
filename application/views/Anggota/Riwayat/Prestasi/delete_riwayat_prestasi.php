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
			<h1>Delete Riwayat Prestasi <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><strong>Apakah anda yakin akan menghapus data berikut ?</strong></h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<th>Tingkat Prestasi</th>
								<th>Nama Prestasi</th>
								<th>Pencapaian Prestasi</th>
								<th>Lembaga Prestasi</th>
								<th>Tahun Prestasi</th>
								<th>Jenis Prestasi</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $riwayat_prestasi->ID_TINGKAT_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->NAMA_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->PENCAPAIAN_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->LEMBAGA_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->TAHUN_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->JENIS_PRESTASI; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				
					<div class="panel-footer text-right">
						<form method="post">
							<a href="<?php echo site_url('anggota');?>" class="btn btn-success">Batal</a>
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- End Row -->
		
	</div>

</body>
</html>