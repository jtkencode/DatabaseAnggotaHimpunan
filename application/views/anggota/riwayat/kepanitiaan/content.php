					<!-- Riwayat Kepanitiaan -->
					<div class="col-md-9">
					<?php if (count($riwayat_kepanitiaan) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Belum pernah berkontribusi pada kegiatan apapun</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Kegiatan kepanitiaan yang pernah diikuti</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<?php foreach ($riwayat_kepanitiaan as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><strong><?php echo $row->jabatan_kepanitiaan;?></strong> <small><?php echo $row->nama_kegiatan_kepanitiaan;?> </small></p>
											<p><?php echo $row->nama_org_kepanitiaan;?></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_kepanitiaan;?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_kepanitiaan/update'),'/',$row->no_urut_kepanitiaan;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_kepanitiaan/delete'),'/',$row->no_urut_kepanitiaan;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>
				