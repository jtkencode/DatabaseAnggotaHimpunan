		<!-- Statistik Anggota-->
		<!-- progress bar anggota melengkapi data -->
		<h4>Info Anggota</h4>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $count_complete ;?>" aria-valuemin="0" aria-valuemax="<?php echo $count_total_anggota ;?>" style="width: <?php echo $count_complete/$count_total_anggota ;?>%"> <?php echo $count_complete ;?> Anggota
			</div>
		</div>

		<div class="row">
			<!-- Anggota yang sudah terdaftar -->
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">anggota yang sudah terdatar</h4>
						<?php foreach ($count_anggota_angkatan as $row) : ?>
							<p class="list-group-item-text"><?php echo $row->jumlah_anggota." Anggota angkatan ".$row->angkatan_himpunan;?></p>
						<?php endforeach; ?>
					</a>
				</div>
			</div>	

			<!-- anggota yang belum melengkapi data-->
			<div class="col-md-4">
				<div class="list-group">
					<a href="<?php echo site_url('admin/dashboard/not_complete/');?>" class="list-group-item">
						<h4 class="list-group-item-heading">anggota belum melengkapi data</h4>
						<?php foreach ($count_anggota_not_complete as $row) : ?>
							<p class="list-group-item-text"><?php echo $row->jumlah_anggota." Anggota angkatan ".$row->angkatan_himpunan;?></p>
						<?php endforeach; ?>
					</a>
				</div>
			</div>	

			<!-- anggota yang sudah melengkapi data-->
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">anggota sudah melengkapi data</h4>
						<?php foreach ($count_anggota_complete as $row) : ?>
							<p class="list-group-item-text"><?php echo $row->jumlah_anggota." Anggota angkatan ".$row->angkatan_himpunan;?></p>
						<?php endforeach; ?>
					</a>
				</div>
			</div>	
		</div>

		<!-- Tentang Anggota -->
		<div class="row">
			<!-- Anggota yang berulang tahun -->
			<div class="col-md-4">
				<div class="list-group">
					<?php if ($count_birthday == 0):?>
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Tidak ada anggota yang ulang tahun pekan ini.</h4>
					<?php else :?>
						<a href="<?php echo site_url('admin/dashboard/birthday'); ?>" class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo $count_birthday; ?> Anggota berulang tahun pekan ini <span class="glyphicon glyphicon-gift"></span></h4>
						<p class="list-group-item-text">Lihat anggota yang berulang tahun</p>
					<?php endif;?>
					</a>
				</div>
			</div>
			<!-- anggota yang mengikuti pkm tahun ini-->
			<div class="col-md-4">
				<div class="list-group">
					<?php if ($count_pkm == 0):?>
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Tidak ada anggota yang mengikuti pkm tahun ini.</h4>
						<p class="list-group-item-text">Coming Soon ;)</p>
					<?php else :?>
						<a href="<?php echo site_url('admin/dashboard/pkm'); ?>" class="list-group-item">
						<h4 class="list-group-item-heading"><?php echo $count_pkm; ?> Anggota yang mengikuti pkm tahun ini</h4>
						<p class="list-group-item-text">Lihat anggota yang mengikuti pkm tahun ini</p>
					<?php endif;?>
					</a>
				</div>
			</div>	
		</div>

		<hr>


		<!-- Tentang Kegiatn -->
		<h4>Info Kegiatan</h4>
		<div class="row">	
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">6 Kegiatan wajib pekan ini</h4>
						<p class="list-group-item-text">Lihat kegiatan</p>
						<p class="list-group-item-text">coming soon;)</p>
					</a>
				</div>
			</div>

			
			<div class="col-md-4">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">2 Kegiatan departemen pekan ini</h4>
						<p class="list-group-item-text">Lihat kegiatan</p>
						<p class="list-group-item-text">coming soon;)</p>
					</a>
				</div>
			</div>
		</div>


		