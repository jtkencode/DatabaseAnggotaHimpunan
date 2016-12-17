		<!--Start Row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><strong>Apakah anda yakin akan menghapus data berikut ?</strong></h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<th>Jenjang Pendidikan</th>
								<th>Nama Institusi</th>
								<th>Tahun Masuk - Tahun Lulus</th>
								<th>Bidang Pendidikan</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $riwayat_pendidikan->jenjang_pendidikan; ?></td>
									<td><?php echo $riwayat_pendidikan->nama_institusi_pendidikan; ?></td>
									<td><?php echo $riwayat_pendidikan->tahun_masuk_pendidikan." - ".$riwayat_pendidikan->tahun_lulus_pendidikan; ?></td>
									<td><?php echo $riwayat_pendidikan->bidang_pendidikan; ?></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="panel-footer text-right">
						<form method="post">
							<a href="<?php echo site_url('anggota');?>" class="btn btn-success">Batal</a>
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form>
					</div>
				</div> <!--End Panel -->	
			</div>
		</div> <!-- End Row -->
		
	</div>

</body>
</html>