		<!--Start Row -->
		<div class="row">
		<?php if (isset($success)) : ?>
			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $success; ?></strong>
			</div>
		<?php endif; ?>
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatOrganisasi" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDetilKontak">Detil Kontak</label>
						<div class="col-md-9">
							<input name="detil_kontak" class="form-control" id="inputDetilKontak" required="" type="text" placeholder="Detil Kontak" value="" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJenisKontak">Jenis Kontak</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input name="jenis_kontak" required="" type="radio" value='H'>
									No. Telepon
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input name="jenis_kontak" required="" type="radio" value='E'>
									Email
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