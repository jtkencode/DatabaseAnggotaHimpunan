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
						<a href="<?php echo site_url('admin/dashboard/not_complete/1'.($page_active-1));?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>

					<?php for ($page = $page_start ; $page < ($page_end) ; $page++) :?>
						<li class="<?php if($page == $page_active) echo "active" ;?>"><a href="<?php echo site_url('admin/dashboard/not_complete/'.$page);?>"> <?php echo $page ; ?> </a></li>
					<?php endfor; ?>
					<li>
						<a href="<?php echo site_url('admin/dashboard/not_complete/'.($page_active+1));?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- end pagination-->

		</div>