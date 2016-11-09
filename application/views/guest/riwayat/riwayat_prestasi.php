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
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>