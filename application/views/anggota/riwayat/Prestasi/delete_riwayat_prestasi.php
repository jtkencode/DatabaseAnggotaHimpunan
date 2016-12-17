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
								<th>Tingkat Prestasi</th>
								<th>Nama Prestasi</th>
								<th>Pencapaian Prestasi</th>
								<th>Lembaga Prestasi</th>
								<th>Tahun Prestasi</th>
								<th>Jenis Prestasi</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $riwayat_prestasi->id_tingkat_prestasi; ?></td>
									<td><?php echo $riwayat_prestasi->nama_prestasi; ?></td>
									<td><?php echo $riwayat_prestasi->pencapaian_prestasi; ?></td>
									<td><?php echo $riwayat_prestasi->lembaga_prestasi; ?></td>
									<td><?php echo $riwayat_prestasi->tahun_prestasi; ?></td>
									<td><?php echo $riwayat_prestasi->jenis_prestasi; ?></td>
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
				</div>
			</div>
		</div> <!-- End Row -->
		
	</div>

</body>
</html>