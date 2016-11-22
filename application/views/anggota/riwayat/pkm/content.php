					<!--Riwayat PKM -->
					<div class="col-md-9">
					<?php if (count($riwayat_pkm) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Belum pernah mengikuti kegiatan pengabdian kepada masyarakat</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Kegiatan PKM yang pernah diikuti</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<?php foreach ($riwayat_pkm as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->nama_pkm;?></p>
											<p><small><?php echo $row->nama_penyelenggara_pkm;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_pkm?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_pkm/update'),'/',$row->no_urut_pkm;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_pkm/delete'),'/',$row->no_urut_pkm;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>