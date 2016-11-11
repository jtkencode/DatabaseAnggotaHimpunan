<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Admin Dashboard</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Admin Dashboard <small>Data Anggota Himakom</small></h1>
		</div>

		<div class="btn-group">
			<a href="#" class="button btn btn-default">Lihat Data Anggota</a>
			<a href="#" class="button btn btn-default">Atur Kegiatan</a>
			<a href="#" class="button btn btn-default">Atur Periode</a>
			<a href="<?php echo site_url('site/logout'); ?>" class="button btn btn-default">Logout</a>
		</div>
		<hr>

		<div class="">
			<label>Jumlah anggota yang sudah melengkapi data</label>
			<div class="progress">
  				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $count_complete ;?>" aria-valuemin="0" aria-valuemax="<?php echo $count_total_anggota ;?>" style="width: <?php echo $count_complete/$count_total_anggota ;?>%"> <?php echo $count_complete ;?> Anggota
  				</div>
			</div>
		</div>


		<div>
			<h2><small>Anggota yang belum melengkapi data</small></h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#NIM</th>
						<th>Nama Lengkap</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_not_complete as $anggota) :?>
						<tr>
							<td><?php echo $anggota->NIM ;?></td>
							<td><?php echo $anggota->NAMA_LENGKAP ;?></td>
						</tr>
					<?php endforeach ; ?>
				</tbody>
			</table>

		</div>
		
	</div>

	
</body>
</html>