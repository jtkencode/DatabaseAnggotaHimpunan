					<!-- Riwayat Pelatihan -->
					<div class="col-md-9">
					<?php if (count($riwayat_pelatihan) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Belum pernah mengikuti kegiatan pelatihan apapun.</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Kegiatan pelatihan yang pernah diikuti</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<?php foreach ($riwayat_pelatihan as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><strong><?php echo $row->nama_pelatihan;?></strong></p>
											<p><?php echo $row->nama_penyelenggara_pelatihan;?></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_pelatihan?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_pelatihan/update'),'/',$row->no_urut_pelatihan;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_pelatihan/delete'),'/',$row->no_urut_pelatihan;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>
				