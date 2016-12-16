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
						<?php echo form_label('Password Lama', 'inputPasswordLama', $attrLabel); ?>
						<div class="col-md-10">
							<?php echo form_input(array_merge($attrInput, array(
									'id' => 'inputPasswordLama',
									'name' => 'password_lama',
									'placeholder' => 'Password Lama',
									'autofocus' => '',
									'type' => 'password'
								))); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo form_label('Password Baru', 'inputPasswordBaru', $attrLabel); ?>
						<div class="col-md-10">
							<?php echo form_input(array_merge($attrInput, array(
									'id' => 'inputPasswordBaru',
									'name' => 'password_baru',
									'placeholder' => 'Password baru',
									'autofocus' => '',
									'type' => 'password',
									'pattern' =>".{6,}",
									'title' => "Minimal 6 Karakter"
								))); ?>
						</div>
					</div>			

					<div class="form-group">
						<?php echo form_label('Masukkan Kembali Password Baru', 'inputPasswordLama', $attrLabel); ?>
						<div class="col-md-10">
							<?php echo form_input(array_merge($attrInput, array(
									'id' => 'inputPasswordBaru2',
									'name' => 'password_baru2',
									'placeholder' => 'Password Baru',
									'autofocus' => '',
									'type' => 'password',
									'pattern' =>".{6,}",
									'title' => "Minimal 6 Karakter"
								))); ?>
						</div>
					</div>							

					<div class="form-group">
						<div class="col-md-8 col-md-offset-2">
							<?php echo form_submit('', 'Ganti Password', array('class' => 'btn btn-primary')); ?>
						</div>
					</div>

				<?php echo form_close(); ?>
			</div>
		</div> <!-- End Row -->
		
	</div>

	
</body>
</html>