<?php

$icon = ['D' => "bg-secondary", 'P' => "bg-info", 'A' => "bg-primary", 'T' => "bg-deafult"];
$left = false;
?>					
					<!-- Riwayat Pendidikan -->
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<!--Timeline-->
								<h3><small>Riwayat Pendidikan</small></h3>
								<div class="timeline-centered">
									<?php foreach ($riwayat_pendidikan as $row) : ?>
										<?php if ($left) :?> <article class="timeline-entry left-aligned">
										<?php else :?> <article class="timeline-entry">
										<?php endif ; $left = !$left ; ?>
											<div class="timeline-entry-inner">
												<time class="timeline-time" datetime="2014-01-10T03:45"><strong><?php echo $row->TAHUN_MASUK_PENDIDIKAN;?></strong></time>
												<div class="timeline-icon <?php echo $icon[$row->JENJANG_PENDIDIKAN];?>">
													<i class="entypo-feather"></i>
												</div>
												<div class="timeline-label">
													<h2><?php echo $row->NAMA_INSTITUSI_PENDIDIKAN ;?></h2>
													<p><?php echo $row->BIDANG_PENDIDIKAN ;?></p>
													<!-- Button for edit riwayat-->
													<div class="hiddenButton" hidden>
														<a href="<?php echo site_url('anggota/riwayat_pendidikan/update'),'/',$row->NO_URUT_PENDIDIKAN;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
														<a href="<?php echo site_url('anggota/riwayat_pendidikan/delete'),'/',$row->NO_URUT_PENDIDIKAN;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
													</div>
												</div>
											</div>
										</article>
									<?php endforeach ;?>

									<article class="timeline-entry begin">		
										<div class="timeline-entry-inner">
											<div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
												<i class="entypo-flight"></i>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
					