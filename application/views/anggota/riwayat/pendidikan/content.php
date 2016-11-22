<?php

$icon = ['D' => "bg-secondary", 'P' => "bg-info", 'A' => "bg-primary", 'T' => "bg-deafult"];
$left = false;
?>					
					<!-- Riwayat Pendidikan -->
					<div class="col-md-9">
					<?php if (count($riwayat_pendidikan) == 0):?>
						<div class="row">
							<div class="col-md-12">
								<h3 class="text-center"><small>Riwayat pendidikan belum tercatat.</small></h3>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-md-12">
								<h3><small>Riwayat Pendidikan</small></h3>
							</div>
						</div>
					<?php endif; ?>
						<div class="row">
							<div class="col-md-12">
								<!--Timeline-->
								<div class="timeline-centered">
									<?php foreach ($riwayat_pendidikan as $row) : ?>
										<?php if ($left) :?> <article class="timeline-entry left-aligned">
										<?php else :?> <article class="timeline-entry">
										<?php endif ; $left = !$left ; ?>
											<div class="timeline-entry-inner">
												<time class="timeline-time" datetime="2014-01-10T03:45"><strong><?php echo $row->tahun_masuk_pendidikan;?></strong></time>
												<div class="timeline-icon <?php echo $icon[$row->jenjang_pendidikan];?>">
													<i class="entypo-feather"></i>
												</div>
												<div class="timeline-label">
													<h2><?php echo $row->nama_institusi_pendidikan ;?></h2>
													<p><?php echo $row->bidang_pendidikan ;?></p>
													<!-- Button for edit riwayat-->
													<div class="hiddenButton" hidden>
														<a href="<?php echo site_url('anggota/riwayat_pendidikan/update'),'/',$row->no_urut_pendidikan;?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
														<a href="<?php echo site_url('anggota/riwayat_pendidikan/delete'),'/',$row->no_urut_pendidikan;?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
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
					