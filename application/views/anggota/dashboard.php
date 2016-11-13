					
					<!--Dashboard content -->
					<div class="col-md-8">
						<div class="alert alert-dismissible alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>Selamat <?php echo $waktu;?> <strong><?php echo $anggota->NAMA_LENGKAP;?></strong></h4>
							<p>Silahkan lengkapi data pribadi dan data riwayat anda <a href="#">disini</a>, Apabila mengalami kesulitan silahkan hubungi <a>Departemen Administrasi dan Kesekretariatan</a>.</p>
						</div>

						<div>
							<h4>Kegiatan Mendatang Bulan ini: </h4>
							<p>Sekolah Kemahasiswaan 2016</p>
							<p>Pemilihan Ketua Himpunan Mahasiswa Komputer 2016-2017</p>
							<p>Serah Terima Jabatan</p>
							<p>Liga JTK 2016</p>
						</div>
						<hr>
						<div>
							<h4>Anggota yang berulang tahun pekan ini: </h4>
							<?php if (count($birthday) == 0) : ?>
								<p>Tidak ada yang sedang berulang tahun pekan ini</p>
							<?php else : ?>
								<?php date_default_timezone_set("Asia/Jakarta");$now = localtime(time(), true);?>
								<?php foreach($birthday as $row): ?>
									<?php $date = strtotime($row->TANGGAL); $count_down = (date('d',$date) - $now['tm_mday']); $date = $count_down == 0 ? "Hari ini" : $count_down." hari lagi"; ?>
									<p><a href="<?php echo site_url('profile/view/'.$row->NIM);?>"><?php echo $row->NAMA_LENGKAP;?> </a><small><?php echo $date;?></small></p>
								<?php endforeach ; ?>
							<?php endif; ?>
						</div>						
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Berkontribusi pada kegiatan
									</div> 
									<div class="panel-body">
										<p>Sekolah Kemahasiswaan</p>
										<p>Kompetisi Pemrograman 2016</p>
										<p>Latihan Kepemimpinan Mahasiswa Tingkat Akhir 2016 </p>
									</div>
								</div>
							</div>
						</div>
					</div>