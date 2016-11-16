		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatPelatihan" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaPelatihan">Nama Pelatihan</label>
						<div class="col-md-9">
							<input name="nama_pelatihan" class="form-control" id="inputNamaPelatihan" required="" type="text" placeholder="Nama Pelatihan" value="<?php echo $riwayat_pelatihan->nama_pelatihan; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaPenyelenggara">Nama Penyelenggara</label>
						<div class="col-md-9">
							<input name="nama_penyelenggara_pelatihan" class="form-control" id="inputNamaPeyelenggara" required="" type="text" placeholder="Nama Penyelenggara" value="<?php echo $riwayat_pelatihan->nama_penyelenggara_pelatihan; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunPelatihan">Tahun Pelatihan</label>
						<div class="col-md-9">
							<input name="tahun_pelatihan" class="form-control" id="inputTahunPelatihan" required="" type="text" placeholder="Tahun Pelatihan" value="<?php echo $riwayat_pelatihan->tahun_pelatihan; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inpuPelatihanKemahasiswaan">Pelatihan Kemahasiswaan</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input id="radioPelatihanKemahasiswaan1" name="pelatihan_kemahasiswaan" required="" type="radio" value=1>
									Ya
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input id="radioPelatihanKemahasiswaan0" name="pelatihan_kemahasiswaan" required="" type="radio" value=0>
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


	<script>
		var idRadio = "radioPelatihanKemahasiswaan" + "<?php echo $riwayat_pelatihan->pelatihan_kemahasiswaan; ?>";
		$("#" + idRadio).prop("checked", true);
	</script>

</body>
</html>