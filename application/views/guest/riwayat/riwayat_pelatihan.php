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
											<p><?php echo $row->nama_pelatihan;?></p>
											<p><small><?php echo $row->nama_penyelenggara_pelatihan;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_pelatihan?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>
				