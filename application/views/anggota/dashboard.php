					
					<!--Dashboard content -->
					<div class="col-md-8">
						<div class="alert alert-dismissible alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>Selamat <?php echo $waktu;?> <strong><?php echo $anggota->nama_lengkap;?></strong></h4>
							<p>Silahkan lengkapi data pribadi dan data riwayat anda <a href="#">disini</a>, Apabila mengalami kesulitan silahkan hubungi <a>Departemen Administrasi dan Kesekretariatan</a>.</p>
						</div>

						<div>
							<h4>Kegiatan pada bulan ini: </h4>
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
									<?php $date = strtotime($row->tanggal); $count_down = (date('d',$date) - $now['tm_mday']); $date = $count_down == 0 ? "Hari ini <span class='glyphicon glyphicon-gift'></span>" : $count_down." hari lagi"; ?>
									<p><a href="<?php echo site_url('profile/view/'.$row->nim);?>"><?php echo $row->nama_lengkap;?> </a><small><?php echo $date;?></small></p>
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
										<p>Coming Soon</p>
										<p>Coming Soon</p>
										<p>Coming Soon</p>
									</div>
								</div>
							</div>
						</div>
					</div>