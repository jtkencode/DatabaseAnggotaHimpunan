					<!--Riwayat PKM -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h3><small>Pengabdian Kepada Masyarakat yang pernah diikuti</small></h3>
								<?php if (count($riwayat_pkm)==0) :?>
									<div class="panel panel-default">
										<div class="panel-body">
											<p>Belum Pernah Mengikuti PKM.......</p>
										</div>
									</div>
								<?php endif;?>
							</div>
						</div>

						<div class="row">
							<?php foreach ($riwayat_pkm as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->NAMA_PKM;?></p>
											<p><small><?php echo $row->NAMA_PENYELENGGARA_PKM;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->TAHUN_PKM?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_pkm/update'),'/',$row->NO_URUT_PKM;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_pkm/delete'),'/',$row->NO_URUT_PKM;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>