		<!-- Riwayat Organisasi-->
				<?php $glyphicon = ['E' => "glyphicon glyphicon-envelope",'H' => "glyphicon glyphicon-phone"]; ;?>
					<div class="col-md-12">
						<!-- Panel kontak -->
						<div class="row">
							<div class="col-md-12">
								<h2><small>Kontak Anggota</small></h2>
								<a href="<?php echo site_url('anggota/kontak/add_contact'); ?>" class="btn btn-default">Tambah Kontak</a>
								<button class="btn btn-default" id="editKontak">Edit Kontak</button>
							</div>
						</div>
						<hr>
						<div class="row">
							<!-- start kontak panel-->
							<?php foreach($kontak as $row) : ?>
								<div class="col-md-4">
									<div class="panel panel-default">
										<div class="panel-body">
											<p class="text-center">
												<small><span class="<?php echo $glyphicon[$row->jenis_kontak];?>"></span></small>
												<strong><?php echo $row->detil_kontak;?></strong>
											</p>
											<!-- Button for edit riwayat-->
											<div class="hiddenButton text-center" hidden>
												<a href="<?php echo site_url('anggota/kontak/update_contact/'.base64_encode($row->detil_kontak)); ?>" class="btn btn-success btn-sm" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="<?php echo site_url('anggota/kontak/delete_contact/'.base64_encode($row->detil_kontak));?>" class="btn btn-danger btn-sm" title="hapus data"><span class="glyphicon glyphicon-trash"></span></a>
											</div>
										</div>
									</div>
								</div>
							<!-- end of panel kontak -->	
							<?php endforeach; ?>
						</div>
						
					</div>
					<!-- Show Hidden button -->
					<script type="text/javascript">
						$('#editKontak').click(function(){
							$('.hiddenButton').toggle();
						});
					</script>