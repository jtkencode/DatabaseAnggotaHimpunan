					<!--Tabs Riwayat -->
					<div class="col-md-9">
						<div class="row">
							<ul class="nav nav-tabs">
								<li <?php if ($page == 'overview') echo "class='active'";?> > <a href="<?php echo site_url('anggota/profile') ;?>">Overview</a></li>
							  	<li <?php if ($page == 'pendidikan') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_pendidikan') ;?>">Pendidikan</a></li>
							  	<li <?php if ($page == 'organisasi') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_organisasi') ;?>">Organisasi</a></li>
							  	<li <?php if ($page == 'prestasi') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_prestasi') ;?>">Prestasi</a></li>
							 	<li <?php if ($page == 'kepanitiaan') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_kepanitiaan') ;?>">Kepanitiaan</a></li>
							  	<li <?php if ($page == 'pelatihan') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_pelatihan') ;?>">Pelatihan</a></li>
							  	<li <?php if ($page == 'pkm') echo "class='active'";?> > <a href="<?php echo site_url('anggota/riwayat_pkm') ;?>">PKM</a></li>
							</ul>
						</div>
						<?php if ($page != 'overview') : ?>
						<div class="row">
							<div class="col-md-12">
								<br>
								<a href="<?php echo site_url('anggota/riwayat_'),$page,'/add';?>" class="btn btn-default">Tambah Riwayat</a>
								<button class="btn btn-default" id="editRiwayat">Edit Riwayat</button>
							</div>
						</div>
						<?php endif;?>
					</div>