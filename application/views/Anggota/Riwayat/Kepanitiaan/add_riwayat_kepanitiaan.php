		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatKepanitiaan" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaKegiatan">Nama Kegiatan</label>
						<div class="col-md-9">
							<input name="nama_kegiatan_kepanitiaan" class="form-control" id="inputNamaKegiatan" required="" type="text" placeholder="Nama Kegiatan" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaOrganisasi">Nama Organisasi</label>
						<div class="col-md-9">
							<input name="nama_org_kepanitiaan" class="form-control" id="inputNamaOrganisasi" required="" type="text" placeholder="Nama Organisasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJabatan">Jabatan</label>
						<div class="col-md-9">
							<input name="jabatan_kepanitiaan" class="form-control" id="inputJabatan" required="" type="text" placeholder="Jabatan Kepanitiaan" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunKepanitiaan">Tahun Kepanitiaan</label>
						<div class="col-md-9">
							<input name="tahun_kepanitiaan" class="form-control" id="inputTahunKepanitiaan" required="" type="text" placeholder="Tahun Kepanitiaan" value="" autocomplete="off" pattern="[0-9]{4,4}" title="Format Tahun : YYYY, contoh : 2016">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputKepanitiaanKemahasiswaan">Kepanitiaan Kemahasiswaan</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input id="radioRiwayatKepanitiaan1"name="kepanitiaan_kemahasiswaan" required="" type="radio" value=1>
									Ya
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input id="radioRiwayatKepanitiaan0"name="kepanitiaan_kemahasiswaan" required="" type="radio" value=0>
									Tidak
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<?php echo form_submit('', 'Submit', array('class' => 'btn btn-primary')); ?>
						</div>
					</div>

				</form>
			</div>
		</div> <!-- End Row -->	
	</div>

</body>
</html>