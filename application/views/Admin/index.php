<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
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


		<!-- Statistik Anggota-->
		<div class="row">
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">anggota yang sudah terdatar</h4>
						<p class="list-group-item-text">90 Anggota angkatan 28</p>
						<p class="list-group-item-text">80 Anggota angkatan 29</p>
						<p class="list-group-item-text">60 Anggota angkatan 30</p>
					</a>
				</div>
			</div>	

			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">anggota belum melengkapi data</h4>
						<p class="list-group-item-text">90 Anggota angkatan 28</p>
						<p class="list-group-item-text">80 Anggota angkatan 29</p>
						<p class="list-group-item-text">60 Anggota angkatan 30</p>
					</a>
				</div>
			</div>	

			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">anggota sudah melengkapi data</h4>
						<p class="list-group-item-text">90 Anggota angkatan 28</p>
						<p class="list-group-item-text">80 Anggota angkatan 29</p>
						<p class="list-group-item-text">60 Anggota angkatan 30</p>
					</a>
				</div>
			</div>	
		</div>

		<!-- Tentang Anggota -->
		<div class="row">
			<!-- Anggota yang berulang tahun -->
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
					<?php if ($count_birthday== 0):?>
						<h4 class="list-group-item-heading">Tidak ada anggota yang ulang tahun pekan ini.</h4>
					<?php else :?>
						<h4 class="list-group-item-heading"><?php echo $count_birthday; ?> Anggota berulang tahun pekan ini</h4>
						<p class="list-group-item-text">Lihat anggota yang berulang tahun</p>
					<?php endif;?>
					</a>
				</div>
			</div>	
		</div>

		<div class="">
			<label>Jumlah anggota yang sudah melengkapi data</label>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $count_complete ;?>" aria-valuemin="0" aria-valuemax="<?php echo $count_total_anggota ;?>" style="width: <?php echo $count_complete/$count_total_anggota ;?>%"> <?php echo $count_complete ;?> Anggota
				</div>
			</div>
		</div>


		<div>
			<label>Anggota yang belum melengkapi data</label>
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
							<td><?php echo $anggota->nim ;?></td>
							<td><?php echo $anggota->nama_lengkap ;?></td>
						</tr>
					<?php endforeach ; ?>
				</tbody>
			</table>

			<!-- Pagination -->
			<nav aria-label="Page navigation" class="text-center">
				<ul class="pagination">
					<li>
						<a href="<?php echo site_url('admin/dashboard/view/'.($page_active-1));?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>

					<?php for ($page = $page_start ; $page < ($page_end) ; $page++) :?>
						<li class="<?php if($page == $page_active) echo "active" ;?>"><a href="<?php echo site_url('admin/dashboard/view/'.$page);?>"> <?php echo $page ; ?> </a></li>
					<?php endfor; ?>
					<li>
						<a href="<?php echo site_url('admin/dashboard/view/'.($page_active+1));?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- end pagination-->

		</div>
		
	</div>

	
</body>
</html>