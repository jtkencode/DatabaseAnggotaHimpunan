					<!-- Riwayat Kepanitiaan -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h3><small>Pernah Berkontribusi pada Kepanitiaan</small></h3>
							</div>
						</div>
						<div class="row">
							<?php foreach ($riwayat_kepanitiaan as $row) :?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<p><?php echo $row->nama_kegiatan_kepanitiaan;?> <small><?php echo $row->jabatan_kepanitiaan;?></small></p>
											<p><small><?php echo $row->nama_org_kepanitiaan;?></small></p>
											<p class="text-right"><span class="glyphicon glyphicon-time"></span><small> <?php echo $row->tahun_kepanitiaan;?></small></p>
										</div>
									</div>
								</div>
							<?php endforeach ;?>		
						</div>
					</div>
				