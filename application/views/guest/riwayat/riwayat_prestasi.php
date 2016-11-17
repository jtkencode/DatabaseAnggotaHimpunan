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
											<p><?php echo $row->nama_prestasi;?> <small><?php echo $row->pencapaian_prestasi;?></small></p>
											<p><small><?php echo $row->lembaga_prestasi;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_prestasi;?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>