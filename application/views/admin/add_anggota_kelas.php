<!-- Belum selesai, issuenya adalah user interface... :) 
	-IF 17 Desember 2016

	biar pejuang selanjutnya yang melanjutkan perjuangan ini,
	selamat, dan semangat melanjutkan perjuangan kami,
	jangan sia-siakan wadah ini untuk hal yang tak ada gunanya
	jangan sia-siakan kesempatan ini untuk hal yang tak perlu
	berkaryalah, 
	sampai pada waktunya kalian merasakan, bahwa 3/4 tahun tidak cukup,
	sampai kalian tidak ingin menjadi bukan orang yang tidak lagi di anggap,
	sampai kalian tidak ingin kehilangan,
	kehilangan tempat berkarya dan berkreasi.
-->

<div>
	<div class="row">
		<!-- include boostrap select -->
		<link href="<?php echo base_url('assets/css/bootstrap-select.min.css'); ?>" rel="stylesheet"> 
		<script src="<?php echo base_url('assets/js/bootstrap-select.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/ejs.min.js'); ?>"></script>


		<div class="col-md-3">
			<label>Angkatan Himpunan</label>
			<select class="selectpicker" data-width="100%" id="select_angkatan" name="angkatan_anggota">
				<?php foreach($angkatan_himpunan as $row) :?>
					<option value="<?php echo $row->angkatan_himpunan;?>"><?php echo $row->angkatan_himpunan;?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="col-md-3">
			<label>Program Studi</label>
			<select class="selectpicker" data-width="100%" id="select_kelas" name="kelas_anggota">
				<?php foreach($program_studi as $row) :?>
					<option value="<?php echo $row->id_ps;?>"><?php echo $row->nama_ps;?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="col-md-3">
			<label>Kelas</label>
			<select class="selectpicker" data-width="100%" id="select_kelas" name="kelas_anggota">
				<option value="">--Pilih Kelas--</option>
				<option value = "A"> A </option>
				<option value = "B"> B </option>
				<option value = "C"> C </option>
			</select>
		</div>

		<div class="col-md-3">
			<label>Tanggal masuk kelas</label>
			<input type="date">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="text-center">
				<form method="post">
					<label>Pilih Anggota Kelas</label>
					<select class="selectpicker" multiple="true" data-size = "10" data-live-search="true" data-width="100%" id="pilih_anggota" name="nim_anggota">
						
					</select>
					
					<br><br>

					<button type="submit" class="btn btn-primary btn-block">Tambah Anggota</button>
					 
				</form>
				<button id="get_anggota" class="btn btn-primary btn-block">Get Anggota</button>
			</div>

			<br><hr>
			<div class="text-center">
				<label>Anggota yang sudah dipilih: </label>
				<div id="result_anggota">
					<p>Belum ada anggota yang dipilih</p>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function(){
		var template = document.getElementById('template').innerHTML;
        var names = ['loki', 'tobi', 'jane'];
        var html = ejs.render(template, { names: names });
        $("#result").html(html);

		//preview anggota
		$('#pilih_anggota').on('change', function(){
			$('#pilih_anggota').selectpicker('refresh');
			var selected = $(this).val();
			var result = "";

			if (selected != null){
				result = selected.join();
			} else {
				result = selected;
			}

	   		if (selected == null){
	   			result = "<p>Belum ada anggota yang dipilih</p>";
	   		}

	   		$("#result_anggota").html(result);
	   	});

	   	$('#get_anggota').click(function(){
	   		get_anggota_angkatan();
	   	});

	   	function get_anggota_angkatan(){
	   		var angkatan = $('#select_angkatan').val();
	   		var dataString = 'angkatan=' + angkatan;
	        $.ajax({
	            type: "POST",
	            url: "<?php echo site_url('admin/anggota/get_anggota_angkatan_ajax');?>",
	            data: dataString,
	            cache: false,
	            success: function(result) {
	                alert(result);
	            } 
	        });
	   	}

	});
</script>