		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatOrganisasi" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaOrganisasi">Nama Organisasi</label>
						<div class="col-md-9">
							<input name="nama_org" class="form-control" id="inputNamaOrganisasi" required="" type="text" placeholder="Nama Organisasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJabatanOrganisasi">Jabatan Organisasi</label>
						<div class="col-md-9">
							<input name="jabatan_org" class="form-control" id="inputJabatanOrganisasi" required="" type="text" placeholder="Jabatan Organisasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunMulaiOrganisasi">Tahun Mulai</label>
						<div class="col-md-9">
							<input name="tahun_mulai_org" class="form-control" id="inputTahunMulaiOrganisasi" required="" type="text" placeholder="Tahun Mulai" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunSelesaiOrganisasi">Tahun Selesai</label>
						<div class="col-md-9">
							<input name="tahun_selesai_org" class="form-control" id="inputTahunSelesaiOrganisasi" required="" type="text" placeholder="Tahun Selesai" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputOrgKemahasiswaan">Organisasi Kemahasiswaan</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input name="org_kemahasiswaan" required="" type="radio" value=1>
									Ya
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input name="org_kemahasiswaan" required="" type="radio" value=0>
									Tidak
								</label>
							</div>
							<br>
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