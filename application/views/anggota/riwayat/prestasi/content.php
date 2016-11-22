					<!--Riwayat Prestasi -->
					<div class="col-md-9">
					<?php if (count($riwayat_prestasi) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Belum ada prestasi yang pernah diraih</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Prestasi yang pernah diraih</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<?php foreach ($riwayat_prestasi as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->nama_prestasi;?> <small><?php echo $row->pencapaian_prestasi;?></small></p>
											<p><small><?php echo $row->lembaga_prestasi;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_prestasi;?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_prestasi/update'),'/',$row->no_urut_prestasi;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_prestasi/delete'),'/',$row->no_urut_prestasi;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>