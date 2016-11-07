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
			<h1>Update Riwayat Organisasi <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>

		<!--Start Row -->
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<form class="form-horizontal" id="formRiwayatOrganisasi" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputNamaOrganisasi">Nama Organisasi</label>
						<div class="col-md-9">
							<input name="nama_org" class="form-control" id="inputNamaOrganisasi" required="" type="text" placeholder="Nama Organisasi" value="<?php echo $riwayat_org->NAMA_ORG; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputJabatanOrganisasi">Jabatan Organisasi</label>
						<div class="col-md-9">
							<input name="jabatan_org" class="form-control" id="inputJabatanOrganisasi" required="" type="text" placeholder="Jabatan Organisasi" value="<?php echo $riwayat_org->JABATAN_ORG; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunMulaiOrganisasi">Tahun Mulai</label>
						<div class="col-md-9">
							<input name="tahun_mulai_org" class="form-control" id="inputTahunMulaiOrganisasi" required="" type="text" placeholder="Tahun Mulai" value="<?php echo $riwayat_org->TAHUN_MULAI_ORG; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTahunSelesaiOrganisasi">Tahun Selesai</label>
						<div class="col-md-9">
							<input name="tahun_selesai_org" class="form-control" id="inputTahunSelesaiOrganisasi" required="" type="text" placeholder="Tahun Selesai" value="<?php echo $riwayat_org->TAHUN_SELESAI_ORG; ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputOrgKemahasiswaan">Organisasi Kemahasiswaan</label>
						<div class="col-md-9">
							<div class="radio">
								<label>
									<input id="radioOrgKemahasiswaan1"name="org_kemahasiswaan" required="" type="radio" value=1>
									Ya
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input id="radioOrgKemahasiswaan0"name="org_kemahasiswaan" required="" type="radio" value=0>
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
		var idRadio = "radioOrgKemahasiswaan" + "<?php echo $riwayat_org->ORG_KEMAHASISWAAN; ?>";
		$("#" + idRadio).prop("checked", true);
	</script>

</body>
</html>