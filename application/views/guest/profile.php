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
							<p><?php echo $prodi[$anggota->id_ps]," ",$anggota->nama_kelas," ",$anggota->angkatan_kelas ;?></p>
							<hr>
						</div>

						<div>
							<p><span class="glyphicon glyphicon-gift"></span> <?php echo $anggota->tempat_lahir.", ".date_format(date_create($anggota->TANGGAL_LAHIR), 'd F Y') ;?></p>
							<p><span class="glyphicon glyphicon-home"></span> <?php echo $anggota->alamat_sekarang ;?> </p>						
							<?php foreach ($kontak as $row) : ?>
								<p><span class="<?php echo $glyphicon[$row->JENIS_KONTAK];?>" ></span> <?php echo $row->detil_kontak;?></p>
							<?php endforeach ;?>		
							<hr>
						</div>
					</div>