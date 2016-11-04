<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>
<body>

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

	<div class="container">
		<div class="page-header">
			<h1>Edit Profile <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>

		<!--Start Row -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php echo form_open('', array('class' => 'form-horizontal')); ?>
					<div class="form-group">
					<?php echo form_label('Nama lengkap', 'inputNamaLengkap', $attrLabel); ?>
					<div class="col-md-10">
						<?php echo form_input(array_merge($attrInput, array(
								'id' => 'inputNamaLengkap',
								'value' => $anggota->NAMA_LENGKAP,
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
								'value' =>  $anggota->NAMA_PANGGILAN,
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
								'value' =>  $anggota->TEMPAT_LAHIR,
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
								'value' =>  $anggota->ALAMAT_SEKARANG,
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
								'value' =>  $anggota->ALAMAT_ASAL,
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