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