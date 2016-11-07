					<!-- Riwayat Organisasi-->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h3><small>Riwayat Organisasi</small></h3>
							</div>
						</div>
						<div class="row">
							<?php foreach ($riwayat_org as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->NAMA_ORG;?><br><small><?php echo $row->JABATAN_ORG;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->TAHUN_MULAI_ORG.'-'.$row->TAHUN_SELESAI_ORG;?></small></p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton" hidden>
												<a href="<?php echo site_url('anggota/riwayat_organisasi/update'),'/',$row->NO_URUT_ORG;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/riwayat_organisasi/delete'),'/',$row->NO_URUT_ORG;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ;?>
							
						</div>
					</div>
				