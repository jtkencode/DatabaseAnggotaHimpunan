		<?php

		$attrLabel = array(
				'class' => 'col-md-2 control-label'
			);
		$attrInputNotRequired = array(
				'class' => 'form-control',
				'autocomplete' => 'off'
			);
		$attrInput = array_merge($attrInputNotRequired, array('required' => ''));

		?>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php echo form_open('', array('class' => 'form-horizontal')); ?>
					<div class="form-group">
					<?php echo form_label('Nama lengkap', 'inputNamaLengkap', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNamaLengkap',
								'value' => $anggota->nama_lengkap,
								'name' => 'nama_lengkap',
								'placeholder' => 'Nama lengkap',
								'autofocus' => ''
							))); ?>
						</div>
					</div>

				<div class="form-group">
					<?php echo form_label('Nama panggilan', 'inputNamaPanggilan', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNamaPanggilan',
								'value' =>  $anggota->nama_panggilan,
								'name' => 'nama_panggilan',
								'placeholder' => 'Nama panggilan'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Tempat Lahir', 'inputTempatLahir', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputTempatLahir',
								'value' =>  $anggota->tempat_lahir,
								'name' => 'tempat_lahir',
								'placeholder' => 'Tempat Lahir'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat Sekarang', 'inputAlamatSekarang', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatSekarang',
								'value' =>  $anggota->alamat_sekarang,
								'name' => 'alamat_sekarang',
								'placeholder' => 'Alamat Sekarang',
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo form_label('Alamat Asal', 'inputAlamatAsal', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputAlamatAsal',
								'value' =>  $anggota->alamat_asal,
								'name' => 'alamat_asal',
								'placeholder' => 'Alamat Asal'
							))); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-2">
						<?php echo form_submit('', 'Submit', array('class' => 'btn btn-primary')); ?>
					</div>
				</div>

				
				<?php echo form_close(); ?>
			</div>
		</div> <!-- End Row -->
		
	</div>

	
</body>
</html>