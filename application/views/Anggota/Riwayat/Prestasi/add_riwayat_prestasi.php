		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatPrestasi" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTingkatPrestasi">Tingkat Prestasi</label>
						<div class="col-md-9">
							<select name="tingkat_prestasi" class="form-control" id="inputTingkatPrestasi" required="">
								<option value="">--Pilih Tingkat Prestasi--</option>
								<?php foreach ($tingkat_prestasi as $row) : ?>
									<option value=<?php echo $row->ID_TINGKAT_PRESTASI; ?>> <?php echo $row->NAMA_TINGKAT_PRESTASI; ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaPrestasi">Nama Prestasi</label>
						<div class="col-md-9">
							<input name="nama_prestasi" class="form-control" id="inputNamaPrestasi" required="" type="text" placeholder="Nama Prestasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputPencapaianPrestasi">Pencapaian Prestasi</label>
						<div class="col-md-9">
							<input name="pencapaian_prestasi" class="form-control" id="inputPencapaianPrestasi" required="" type="text" placeholder="Pencapaian Prestasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputLembagaPrestasi">Lembaga Prestasi</label>
						<div class="col-md-9">
							<input name="lembaga_prestasi" class="form-control" id="inputLembagaPrestasi" required="" type="text" placeholder="Lembaga Prestasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunPrestasi">Tahun Prestasi</label>
						<div class="col-md-9">
							<input name="tahun_prestasi" class="form-control" id="inputTahunPrestasi" required="" type="text" placeholder="Tahun Prestasi" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJenisPrestasi">Jenis Prestasi</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input name="jenis_prestasi" required="" type="radio" value="I">Individu
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input name="jenis_prestasi" required="" type="radio" value="K">Kelompok
								</label>
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