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
											<p><?php echo $row->nama_org;?><br><small><?php echo $row->jabatan_org;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_mulai_org.'-'.$row->tahun_selesai_org;?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>
						</div>
					</div>
				