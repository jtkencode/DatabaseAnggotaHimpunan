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
									<td><?php echo $riwayat_prestasi->ID_TINGKAT_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->NAMA_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->PENCAPAIAN_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->LEMBAGA_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->TAHUN_PRESTASI; ?></td>
									<td><?php echo $riwayat_prestasi->JENIS_PRESTASI; ?></td>
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