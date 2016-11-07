					<!-- Riwayat Pelatihan -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h3><small>Pelatihan yang Pernah diikuti</small></h3>
							</div>
						</div>
						<div class="row">
							<?php foreach ($riwayat_pelatihan as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->NAMA_PELATIHAN;?></p>
											<p><small><?php echo $row->NAMA_PENYELENGGARA_PELATIHAN;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->TAHUN_PELATIHAN?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>
				