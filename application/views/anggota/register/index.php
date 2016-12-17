<div class="col-sm-offset-2 col-sm-8">
	<div class="alert alert-warning" role="alert">
		<h4 class="text-center">Selamat Datang <strong><?php echo $anggota->nama_lengkap;?></strong></h4>
		<p>Anda belum melengkapi data anda di sistem ini, silahkan lengkapi data anda terlebih dahulu dengan menekan tombol dibawah ini. </p>
		<p>Silahkan isi setiap form yang akan ditampilkan kepada anda, silahkan isi data dengan sebenar-benarnya dan sebaik mungkin, untuk himakom yang lebih baik lagi, untuk himakom yang peduli dan peka terhadap data ;)</p> 
		<br>
		<div class="text-center"> 
			<a href="<?php echo site_url('anggota/register/change_password');?>" class="btn btn-warning" align="center">Lengkapi Data</a>
		</div>
	</div>
</div>