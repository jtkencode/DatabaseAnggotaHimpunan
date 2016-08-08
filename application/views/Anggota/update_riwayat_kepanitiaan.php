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
	<div class="container">
		<div class="page-header">
			<h1>Edit Riwayat Kepanitiaan <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>
		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatKepanitiaan" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaKegiatan">Nama Kegiatan</label>
						<div class="col-md-9">
							<input name="nama_kegiatan_kepanitiaan" class="form-control" id="inputNamaKegiatan" required="" type="text" placeholder="Nama Kegiatan" value="<?php echo $riwayat_kepanitiaan->NAMA_KEGIATAN_KEPANITIAAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaOrganisasi">Nama Organisasi</label>
						<div class="col-md-9">
							<input name="nama_org_kepanitiaan" class="form-control" id="inputNamaOrganisasi" required="" type="text" placeholder="Nama Organisasi" value="<?php echo $riwayat_kepanitiaan->NAMA_ORG_KEPANITIAAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJabatan">Jabatan</label>
						<div class="col-md-9">
							<input name="jabatan_kepanitiaan" class="form-control" id="inputJabatan" required="" type="text" placeholder="Jabatan Kepanitiaan" value="<?php echo $riwayat_kepanitiaan->JABATAN_KEPANITIAAN; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunKepanitiaan">Tahun Kepanitiaan</label>
						<div class="col-md-9">
							<input name="tahun_kepanitiaan" class="form-control" id="inputTahunKepanitiaan" required="" type="text" placeholder="Tahun Kepanitiaan" value="<?php echo $riwayat_kepanitiaan->TAHUN_KEPANITIAAN; ?>" autocomplete="off">
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

	<script>
		var idRadio = "radioRiwayatKepanitiaan" + "<?php echo $riwayat_kepanitiaan->KEPANITIAAN_KEMAHASISWAAN; ?>";
		$("#" + idRadio).prop("checked", true);
	</script>

</body>
</html>