<!-- Left Col -->
					<?php $glyphicon = ['E' => "glyphicon glyphicon-envelope",'H' => "glyphicon glyphicon-phone"]; ;?>
					<div class="col-md-3">
						<!-- Profile Picture -->
						<div class="">
							<img class="img-responsive img-rounded" src="assets/img/profile-picture.jpg">
						</div>

						<div>
							<h3><strong><?php echo $anggota->NAMA_LENGKAP;?></strong></h3>
							<h4><?php echo $anggota->NAMA_BAGUS ;?></h4>
							<p>Departemen Pendidikan dan Teknologi Informasi</p>
							<p>Sarjana Terapan Teknik Informatika 2014</p>
							<a href="<?php echo site_url('anggota/edit_profile');?>" class="btn btn-default btn-block">Edit Profile</a>
							<hr>
						</div>

						<div>
							<p><span class="glyphicon glyphicon-gift"></span> <?php echo $anggota->TEMPAT_LAHIR.", ".date_format(date_create($anggota->TANGGAL_LAHIR), 'd F Y') ;?></p>
							<p><span class="glyphicon glyphicon-home"></span> <?php echo $anggota->ALAMAT_SEKARANG ;?> </p>						
							<?php foreach ($kontak as $row) : ?>
								<p><span class="<?php echo $glyphicon[$row->JENIS_KONTAK];?>" ></span> <?php echo $row->DETIL_KONTAK;?></p>
							<?php endforeach ;?>		
							<hr>
						</div>
					</div>