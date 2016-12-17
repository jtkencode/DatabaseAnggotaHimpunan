<!-- include bootstrap select-->
<link href="<?php echo base_url('assets/css/bootstrap-select.min.css'); ?>" rel="stylesheet"> 
<script src="<?php echo base_url('assets/js/bootstrap-select.min.js'); ?>"></script>

<?php if (isset($error)) : ?>
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong><?php echo $error; ?></strong>
	</div>
<?php elseif ((isset($success))) : ?>
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong><?php echo "$success"; ?></strong>
	</div>
<?php endif;?>


<div>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Peringatan: </strong><small>Sebelum melakukan reset password, pastikan reset password sudah disepakati oleh anggota. Jangan lupa menghubungi kembali anggota apabila password sudah direset.</small>
			</div>
		</div>
	</div>
	
	<div class="row">
		<form method="post">
			<div class="col-md-3">
				<select class="selectpicker" data-width="100%" id="angkatan" name="angkatan_anggota">
					<option value="">--Pilih Angkatan Himpunan--</option>
					<?php foreach($angkatan_himpunan as $row) :?>
						<option value="<?php echo $row->angkatan_himpunan;?>"><?php echo $row->angkatan_himpunan;?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="col-md-6">
				<select class="selectpicker" data-width="100%" id="anggota" name="anggota" data-live-search="true" data-size = "10">
					<option value="">--Pilih Anggota--</option>
				</select>
			</div>

			<div class="col-md-3">
				<button id="reset_password" type="submit" class="btn btn-primary">Reset Password Anggota</button>
			</div>
		</form>
	</div>
</div>

<script>

	$(document).ready(function() {
		//get anggota 
		$("#angkatan").change(function() {
	        var angkatan = $(this).val();
	        var dataString = 'angkatan='+angkatan;
	        $.ajax({
	            type: "POST",
	            url: "<?php echo site_url('admin/anggota/get_anggota_angkatan_ajax');?>",
	            data: dataString,
	            cache: false,
	            success: function(result) {
	            	result = JSON.parse(result);
	            	var option = "<option>--Pilih Anggota--</option>";
	            	for (var i = 0 ; i < result.length ; i++){
	            		var anggota = result[i];
	            		option += '<option value=' + anggota.id_anggota + '>' + anggota.nama_lengkap + '</option>';
	            	}
	                $("#anggota").html(option);
	                $('#anggota').selectpicker('refresh');
	            } 
	        });
	    });
	});
</script