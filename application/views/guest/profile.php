					<!-- Left Col -->
					<?php $glyphicon = ['E' => "glyphicon glyphicon-envelope",'H' => "glyphicon glyphicon-phone"]; ;?>
					<div class="col-md-3">
						<!-- Profile Picture -->
						<div class="">
							<img class="img-responsive img-rounded" src="<?php echo base_url('assets/img/profile_picture/default.jpg'); ?>">
						</div>
						<div>
							<h3><strong><?php echo $anggota->NAMA_LENGKAP;?></strong></h3>
							<h4><?php echo $anggota->NAMA_BAGUS ;?></h4>
							<p>Nama Departemen</p>
							<p><?php echo $prodi[$anggota->ID_PS]," ",$anggota->NAMA_KELAS," ",$anggota->ANGKATAN_KELAS ;?></p>
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