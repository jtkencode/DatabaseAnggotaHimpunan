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
											<p><?php echo $row->nama_pkm;?></p>
											<p><small><?php echo $row->nama_penyelenggara_pkm;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_pkm?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>