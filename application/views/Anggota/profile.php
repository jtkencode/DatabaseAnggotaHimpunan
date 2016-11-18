<!-- Left Col -->
					<?php $glyphicon = ['E' => "glyphicon glyphicon-envelope",'H' => "glyphicon glyphicon-phone"]; ;?>
					<div class="col-md-3">
						<!-- Profile Picture -->
						<div class="">
							<img class="img-responsive img-rounded" src="<?php echo base_url('assets/img/profile_picture/default.jpg'); ?>">
						</div>

						<div>
							<h3><strong><?php echo $anggota->nama_lengkap;?></strong></h3>
							<h4><?php echo $anggota->nama_bagus ;?></h4>
							<p>Nama Departemen</p>
							<a href="<?php echo site_url('anggota/profile/edit_profile');?>" class="btn btn-default btn-block">Edit Profile</a>
							<a href="<?php echo site_url('anggota/profile/change_password');?>" class="btn btn-default btn-block">Ubah Password</a>
							<hr>
						</div>

						<div>
							<p><span class="glyphicon glyphicon-gift"></span> <?php echo $anggota->tempat_lahir.", ".date_format(date_create($anggota->tanggal_lahir), 'd F Y') ;?></p>
							<p><span class="glyphicon glyphicon-home"></span> <?php echo $anggota->alamat_sekarang ;?> </p>						
							<?php foreach ($kontak as $row) : ?>
								<p><span class="<?php echo $glyphicon[$row->jenis_kontak];?>" ></span> <?php echo $row->detil_kontak;?></p>
							<?php endforeach ;?>
						</div>

						<div class="btn-group btn-group-justified">
							<a href="<?php echo site_url('anggota/profile/add_contact');?>" class="btn btn-default">Tambah</a>
							<a href="<?php echo site_url('anggota/kontak');?>" class="btn btn-default">Edit</a>
						</div>
					</div>