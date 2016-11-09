					<!--Tabs Riwayat -->
					<div class="col-md-9">
						<div class="row">
							<ul class="nav nav-tabs">
								<li <?php if ($page == 'overview') echo "class='active'";?> > <a href="<?php echo site_url('profile/view/'.$nim) ;?>">Overview</a></li>
							  	<li <?php if ($page == 'pendidikan') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_pendidikan/view/'.$nim) ;?>">Pendidikan</a></li>
							  	<li <?php if ($page == 'organisasi') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_organisasi/view/'.$nim) ;?>">Organisasi</a></li>
							  	<li <?php if ($page == 'prestasi') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_prestasi/view/'.$nim) ;?>">Prestasi</a></li>
							 	<li <?php if ($page == 'kepanitiaan') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_kepanitiaan/view/'.$nim) ;?>">Kepanitiaan</a></li>
							  	<li <?php if ($page == 'pelatihan') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_pelatihan/view/'.$nim) ;?>">Pelatihan</a></li>
							  	<li <?php if ($page == 'pkm') echo "class='active'";?> > <a href="<?php echo site_url('riwayat_pkm/view/'.$nim) ;?>">PKM</a></li>
							</ul>
						</div>
					</div>