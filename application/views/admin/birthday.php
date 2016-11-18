<div>
	<?php date_default_timezone_set("Asia/Jakarta");$now = localtime(time(), true);?>
	<h4>Anggota yang berulang tahun pekan ini: </h4>
	<?php foreach($birthday as $row): ?>
		<?php $date = strtotime($row->tanggal); $count_down = (date('d',$date) - $now['tm_mday']); $date = $count_down == 0 ? "Hari ini <span class='glyphicon glyphicon-gift'></span>" : $count_down." hari lagi"; ?>
		<p><a href="<?php echo site_url('profile/view/'.$row->nim);?>"><?php echo $row->nama_lengkap;?> </a><small><?php echo $date;?></small></p>
	<?php endforeach ; ?>
</div>