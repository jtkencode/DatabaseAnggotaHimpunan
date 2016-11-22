					<!-- Riwayat Organisasi-->
					<div class="col-md-9">
					<?php if (count($riwayat_org) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Belum ada riwayat organisasi yang tercatat.</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Riwayat Organisasi</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<?php foreach ($riwayat_org as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->nama_org;?><br><small><?php echo $row->jabatan_org;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_mulai_org.'-'.$row->tahun_selesai_org;?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_organisasi/update'),'/',$row->no_urut_org;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_organisasi/delete'),'/',$row->no_urut_org;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>
							
						</div>
					</div>
				