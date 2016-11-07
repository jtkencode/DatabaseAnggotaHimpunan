					<!--Riwayat Prestasi -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h3><small>Prestasi yang pernah diraih</small></h3>
							</div>
						</div>
						<div class="row">
							<?php foreach ($riwayat_prestasi as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->NAMA_PRESTASI;?> <small><?php echo $row->PENCAPAIAN_PRESTASI;?></small></p>
											<p><small><?php echo $row->LEMBAGA_PRESTASI;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->TAHUN_PRESTASI;?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_prestasi/update'),'/',$row->NO_URUT_PRESTASI;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_prestasi/delete'),'/',$row->NO_URUT_PRESTASI;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>